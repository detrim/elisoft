<?php

namespace App\Http\Controllers;

use App\Models\Bilangan;
use App\Models\Dashboard;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index_user()
    {
        return view('user.dashboard');
    }
    public function index_admin()
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

        return view('admin.dashboard');
    }
    public function konversi(Request $request)
    {
        $bilangan = Bilangan::select('*')->orderByDesc('id')->get();
        return view('admin.konversi', compact('bilangan'));
    }
    public function stringkonversi(Request $request)
    {
        $bilangan = $request->angka;
        $angka = array('0','0','0','0','0','0','0','0','0','0',
                 '0','0','0','0','0','0');
        $kata = array('','Satu ','Dua ','Tiga ','Empat ','Lima ',
                      'Enam ','Tujuh ','Delapan ','Sembilan ');
        $tingkat = array('','Ribu ','Juta ','Milyar ','Triliun ');

        $panjang_bilangan = strlen($bilangan);
        /* pengujian panjang bilangan */
        if ($panjang_bilangan > 15) {
            $kalimat = "Diluar Batas";
            return $kalimat;
        }

        /* mengambil angka-angka yang ada dalam bilangan,
           dimasukkan ke dalam array */
        for ($i = 1; $i <= $panjang_bilangan; $i++) {
            $angka[$i] = substr($bilangan, -($i), 1);
        }

        $i = 1;
        $j = 0;
        $kalimat = null;


        /* mulai proses iterasi terhadap array angka */
        while ($i <= $panjang_bilangan) {
            $subkalimat = null;
            $kata1 = null;
            $kata2 = null;
            $kata3 = null;

            /* untuk ratusan */
            if ($angka[$i+2] != "0") {
                if ($angka[$i+2] == "1") {
                    $kata1 = "Seratus ";
                } else {
                    $kata1 = $kata[$angka[$i+2]] ."Ratus ";
                }
            }

            /* untuk puluhan atau belasan */
            if ($angka[$i+1] != "0") {
                if ($angka[$i+1] == "1") {
                    if ($angka[$i] == "0") {
                        $kata2 = "Sepuluh ";
                    } elseif ($angka[$i] == "1") {
                        $kata2 = "Sebelas ";
                    } else {
                        $kata2 = $kata[$angka[$i]] . "Belas ";
                    }
                } else {
                    $kata2 = $kata[$angka[$i+1]] . "Puluh ";
                }
            }

            /* untuk satuan */
            if ($angka[$i] != "0") {
                if ($angka[$i+1] != "1") {
                    $kata3 = $kata[$angka[$i]];
                }
            }

            /* pengujian angka apakah tidak nol semua,
               lalu ditambahkan tingkat */
            if (($angka[$i] != "0") or ($angka[$i+1] != "0") or
                ($angka[$i+2] != "0")) {
                $subkalimat = $kata1 .$kata2 .$kata3. $tingkat[$j];
            }

            /* gabungkan variabe sub kalimat (untuk satu blok 3 angka)
               ke variabel kalimat */
            $kalimat = $subkalimat.$kalimat;
            $i = $i + 3;
            $j = $j + 1;
        }

        /* mengganti satu ribu jadi seribu jika diperlukan */
        if (($angka[5] == "0") and ($angka[6] == "0")) {
            $kalimat = str_replace("Satu Ribu ", "Seribu ", $kalimat);
        }
        $kal = (trim($kalimat));

        DB::table('bilangans')->insert([
            'angka' => $request->angka,
            'text' => $kal,
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString(),
            ]);

        return redirect('/admin/konversi')->with('status', 'Bilangan Angka berhasil di buat');
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
     * @param  \App\Models\Dashboard  $dashboard
     * @return \Illuminate\Http\Response
     */
    public function show(Dashboard $dashboard)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dashboard  $dashboard
     * @return \Illuminate\Http\Response
     */
    public function edit(Dashboard $dashboard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dashboard  $dashboard
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dashboard $dashboard)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dashboard  $dashboard
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dashboard $dashboard, $id, $dd)
    {
        $bilangan = Bilangan::select('angka')->where('id', $id)->get();
        foreach ($bilangan as $key) {
            $bil = number_format($key->angka, 0, ',', '.');
        }
        Bilangan::where('id', $id)->delete();
        return redirect('admin/konversi')->with('status', 'Bilangan Angka ' . $bil. ' berhasil di hapus');
    }
}