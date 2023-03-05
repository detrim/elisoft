<?php

namespace App\Http\Controllers;

use App\Models\LogActivityUsers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;

class LogActivityUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $log = DB::table('log_activity_users')->select('*')->get();
        // foreach ($log as $key) {
        //     if ($key->logout == null && $key->login != null) {
        //         $email = $key->email;
        //         $awal = $key->login;
        //         $akhir = date('Y-m-d H:i:s');
        //         $waktu_awal = strtotime($awal);
        //         $waktu_akhir = strtotime($akhir);
        //         $diff = $waktu_akhir - $waktu_awal;


        //         if ($diff > '3600' && $diff < '86400') {
        //             $jam = $diff / 60 / 60;
        //             $waktu = (int) $jam;

        //             if ($waktu >= 12) {

        //                 DB::table('log_activity_users')->where('email', $email)->update([
        //                     'status' =>  'Logout',
        //                     'logout' =>  Carbon::now()->toDateTimeString(),
        //                     'updated_at' => Carbon::now()->toDateTimeString(),
        //                     ]);
        //             }
        //         }
        //     }
        // }


        $activity = LogActivityUsers::select('*')->orderBy('id', 'desc')->get();
        return view('admin.LogActivityUsers', compact('activity'));
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
        return redirect('/admin/user')->with('status', 'Akun berhasil di buat');
    }
    public function register_update(Request $request, $email, $dd)
    {
        $request->validate([
            'name' => 'required',
            'password' => 'required',
            ]);

        DB::table('log_activity_users')->where('email', $email)->update([
            'name' => $request->name,
            'updated_at' => Carbon::now()->toDateTimeString(),
            ]);
        DB::table('users')->where('email', $email)->update([
            'name' => $request->name,
            'password' => Hash::make($request->password),
            'updated_at' => Carbon::now()->toDateTimeString(),
            ]);
        return redirect('/admin/akun/'.$email.$dd.'/show')->with('status', 'Akun berhasil di update');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LogActivityUsers  $logActivityUsers
     * @return \Illuminate\Http\Response
     */
    public function show(LogActivityUsers $logActivityUsers, $email, $dd)
    {
        $activity = LogActivityUsers::join('users', 'log_activity_users.email', '=', 'users.email')->select('log_activity_users.*', 'users.name', 'users.email', 'users.password', 'users.level')->where('log_activity_users.email', $email)->get();
        return view('admin.show', compact('activity'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LogActivityUsers  $logActivityUsers
     * @return \Illuminate\Http\Response
     */
    public function edit(LogActivityUsers $logActivityUsers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LogActivityUsers  $logActivityUsers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LogActivityUsers $logActivityUsers)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LogActivityUsers  $logActivityUsers
     * @return \Illuminate\Http\Response
     */
    public function destroy(LogActivityUsers $logActivityUsers, $email)
    {
        User::where('email', $email)->delete();
        LogActivityUsers::where('email', $email)->delete();
        return redirect('admin/user')->with('status', 'Akun dengan email ' . $email. ' berhasil di hapus');
    }
}
