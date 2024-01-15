<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\JenisSenjata;
use App\Models\Senjata;
use App\Models\StatusSenjata;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $jenisSenjata = JenisSenjata::with('senjata')->get();
        $statusSenjata = StatusSenjata::with('senjata')->get();
        $senjata = Senjata::all();
        // $senjata = $senjata->jenis_senjata;
        // $aktif = $senjata->where('status', 'aktif')->count();
        // $senjata = $senjata->count();
        $jmlh_jeniSenjata = $jenisSenjata->count();
        // dd($jenisSenjata);

        $resultArray = [];
        $resultArray2 = [];

        $senjataGrouped = $senjata->groupBy(function ($item){
            return $item->created_at->format('d');
        });

        // Menghitung jumlah senjata dalam setiap bulan
        $resultArray3 = $senjataGrouped->map(function ($group) {
            return [
                'bulan' => $group->first()->created_at->format('F'), // Nama bulan
                'jumlah_senjata' => $group->count(), // Jumlah senjata dalam bulan
            ];
        })->values()->toArray();

        // dd($resultArray3);

        foreach ($statusSenjata as $status) {
            $statusSenjataArray = [
                'status' => $status->nama_status_senjata,
                'jumlah_senjata' => $status->senjata->count()
            ];

            $resultArray2[] = $statusSenjataArray;
        }
        // dd($resultArray2);

        foreach ($jenisSenjata as $jenis) {
            $jenisSenjataArray = [
                'jenis' => $jenis->nama_jenis_senjata,
                'jumlah_senjata' => $jenis->senjata->count()
            ];

            $resultArray[] = $jenisSenjataArray;
        }
        // dd($resultArray);
        return view('admin.dashboard',[
            'jumlah' => $resultArray,
            'senjata' => $senjata,
            'statuss' => $resultArray2,
            'jenis' => $jmlh_jeniSenjata,
            'jumlah_senjata' => $resultArray3,
            'user' => User::all()->count(),
        ])->with('layout', 'admin.layouts.app');
    }

    // public function pengguna()
    // {   
    //     // $users = User::with('roles')->get();
    //     // $users = $users->hasRole();
    //     // dd($users);
    //     return view('admin.pengguna.pengguna', [
    //         'users' => User::with('roles')->get()
    //     ]);
    // }
}
