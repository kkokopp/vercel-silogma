<?php

namespace App\Http\Controllers;

use App\Mail\SendEmail;
use App\Models\Senjata;
use App\Models\JenisSenjata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class LandController extends Controller
{
    //
    public function index(){
        return view('guest.welcome',[
            'jeniss' => JenisSenjata::all(),
            'alutsistas' => Senjata::paginate(6),
        ])
        ->with('layout', 'guest.layouts.app');
    }

    public function show (Senjata $alutsista){
        $alutsista_last = Senjata::latest()->take(6)->get();
        $jenis = $alutsista->jenis_senjata->nama_jenis_senjata;
        $alutsista_sejenis = Senjata::whereHas('jenis_senjata', function ($subquery) use ($jenis) {
            $subquery->where('nama_jenis_senjata', $jenis);
        })->where('id', '!=', $alutsista->id)->get();
        return view('guest.show',[
            'alutsista' => $alutsista,
            'alutsistas_last' => $alutsista_last,
            'alutsistas_sejenis' => $alutsista_sejenis,
        ])
        ->with('layout', 'guest.layouts.app');
    }

    public function semua (Request $request){
        if(request('kategori')){
            $kategoriNama = JenisSenjata::where('slug', request('kategori'))->firstOrFail()->nama_jenis_senjata;
            $title = 'in '. $kategoriNama;
        }else{
            $title = 'Terbaru';
        }
        $kategori = $request->query('kategori');
        $alutsistas = Senjata::when($kategori, function ($query) use ($kategori) {
            return $query->whereHas('jenis_senjata', function ($subquery) use ($kategori) {
                $subquery->where('slug', $kategori);
            });
        })->with('jenis_senjata')->paginate(5);
        // dd($alutsistas);
        return view('guest.post',[
            'title' => 'Alutsista ' . $title,
            'alutsistas' => $alutsistas,
            'alutsistas_last' => Senjata::latest()->take(6)->get(),
        ])
        ->with('layout', 'guest.layouts.app');
    }

    
    public function jenis (JenisSenjata $jenis){
        // dd($alutsistas_last);
        return view('guest.post',[
            'alutsistas' => $jenis->senjata()->paginate(9),
            // 'jenis' => $jenis,
        ])
        ->with('layout', 'guest.layouts.app');
    }

    public function sendEmail(Request $request){
        $nama = $request->nama;
        $email_pengguna = $request->email_pengguna;
        $pesan = $request->pesan;

        $email = new SendEmail($nama, $email_pengguna, $pesan);
        // $email->subject('Pesan dari ' . $nama);

        Mail::to('silogmamiliter@gmail.com')->send($email);
        
        return redirect()->back()->with('success', 'Email Berhasil Dikirim');
    }

}
