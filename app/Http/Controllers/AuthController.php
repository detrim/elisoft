<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }
    public function proseslogin(Request $request)
    {
        $credentials= $request->validate([
            'email' => 'required',
            'password' => 'required'
            ]);

        $user = User::where('email', $request->email)->first();
        if (Auth::attempt($credentials) && $user->level == "user") {
            activity()->causedBy(Auth::user())->log('user '.auth()->user()->name.' melakukan login');
            $request->session()->regenerate();

            $doubleData =  DB::table('log_activity_users')->select('email')->where('email', auth()->user()->email)->limit(1)->orderByDesc('id')->first();

            if (empty($doubleData)) {
                DB::table('log_activity_users')->insert([
                    'name' => auth()->user()->name,
                    'level' => auth()->user()->level,
                    'email' => auth()->user()->email,
                    'login' => Carbon::now()->toDateTimeString(),
                    'logout' =>  null,
                    'status' =>  'Login',
                    'created_at' => Carbon::now()->toDateTimeString(),
                    'updated_at' => Carbon::now()->toDateTimeString(),
                    ]);
                return redirect()->intended('user/dashboard');
            } else {
                DB::table('log_activity_users')->where('email', auth()->user()->email)->update([
                    'name' => auth()->user()->name,
                    'level' => auth()->user()->level,
                    'login' => Carbon::now()->toDateTimeString(),
                    'logout' =>  null,
                    'status' =>  'Login',
                    'created_at' => Carbon::now()->toDateTimeString(),
                    'updated_at' => Carbon::now()->toDateTimeString(),
                    ]);

                return redirect()->intended('user/dashboard');
            }
        } elseif (Auth::attempt($credentials) && $user->level == "admin") {
            activity()->causedBy(Auth::user())->log('admin melakukan login');
            $request->session()->regenerate();
            return redirect()->intended('admin/dashboard');
        }
        return back()->with('error', 'Login Failed!');
    }
    public function prosesregister(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
            'password' => 'required',
            ]);
        DB::table('users')->insert([
            'name' => $request->name,
            'level' => 'user',
            'password' => Hash::make($request->password),
            'email' => $request->email,
            'remember_token' => Str::random(40),
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString(),
            ]);
        DB::table('log_activity_users')->insert([
            'name' => $request->name,
            'level' => 'user',
            'email' => $request->email,
            'login' => null,
            'logout' =>  null,
            'status' =>  null,
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString(),
            ]);
        return redirect('/log')->with('status', 'Akun berhasil di buat');
    }
    public function logout(Request $request)
    {
        DB::table('log_activity_users')->where('email', $request->email)->update([
            'status' =>  'Logout',
            'logout' =>  Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString(),
            ]);
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
        return redirect('login')->with('error', 'Anda telah logout');
    }
}