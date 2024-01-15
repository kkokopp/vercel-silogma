<?php

namespace App\Http\Controllers;

use DateTime;
use App\Helpers\Helper;
use App\Models\Riwayat;
use App\Models\Senjata;
use Illuminate\Support\Str;
use App\Models\JenisSenjata;
use Illuminate\Http\Request;
use App\Models\StatusSenjata;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class AlutsistaController extends Controller
{
    //
    public function index()
    {
        // $senjata = Senjata::all();
        // dd($senjata);
        return view('admin.senjata.senjata',[
            'alutsistas' => Senjata::latest()->paginate(10),
            // 'jumlah' => $resultArray,
        ]);
    }

    public function create()
    {
        return view('admin.senjata.tambah', [
            'jenis_senjatas' => JenisSenjata::all(),
            'status_senjatas' => StatusSenjata::all(),
        ]);
    }

    public function store(Request $request)
    {
    // Validasi data
        try{
            $data = request()->validate([
                'nama_senjata' => 'required|string|max:255',
                'nomor_seri' => 'required|string|max:255',
                'jenis_senjata' => 'required|numeric',
                'jumlah' => 'required|numeric',
                'status_senjata' => 'required|numeric',
                'lokasi' => 'required|string|max:255',
                'keterangan' => 'required',
                'riwayat' => 'required|array',
                'riwayat.*.nama_operasi' => 'required|string|max:255',
                'riwayat.*.lokasi_operasi' => 'required|string|max:255',
                'riwayat.*.tanggal_mulai' => 'required|date_format:m/d/Y',
                'riwayat.*.tanggal_selesai' => 'required|date_format:m/d/Y',
                'riwayat.*.catatan' => 'required|string|max:255',
                'image' => 'required|image|mimes:png,jpg,jpeg|max:2048', // Sesuaikan dengan kebutuhan Anda
            ]);

            // dd($data);


            $kode_senjata = Str::uuid();

            if($data['image']){
                $path = $request->file('image')->store('alutsista');
                $data['image'] = $path;
            }

            $senjata = Senjata::create([
                'nama_senjata' => $data['nama_senjata'],
                'seri_senjata' => $data['nomor_seri'],
                'jenis_senjata_id' => $data['jenis_senjata'],
                'status_senjata_id' => $data['status_senjata'],
                'jumlah' => $data['jumlah'],
                'keterangan' => $data['keterangan'],
                'kode_senjata' => $kode_senjata,
                'lokasi' => $data['lokasi'],
                'foto' => $data['image'],
            ]);

            foreach ($data['riwayat'] as $riwayat) {

                $tanggal_mulai = DateTime::createFromFormat('m/d/Y', $riwayat['tanggal_mulai']);
                $tanggal_selesai = DateTime::createFromFormat('m/d/Y', $riwayat['tanggal_selesai']);

                $kode_riwayat = Str::uuid();

                Riwayat::create([
                    'nama' => $riwayat['nama_operasi'],
                    'lokasi' => $riwayat['lokasi_operasi'],
                    'tanggal_mulai' => $tanggal_mulai,
                    'tanggal_selesai' => $tanggal_selesai,
                    'catatan' => $riwayat['catatan'],
                    'kode_operasi' => $kode_riwayat,
                    'senjata_id' => $senjata->id,
                ]);
            }

            session()->flash('success', 'Data berhasil disimpan');
            return redirect()->route('admin.senjata.tambah');

        }catch(\Exception $e){
            dd($e);
            session()->flash('error', 'Terjadi kesalahan saat menyimpan data');
            return redirect()->route('admin.senjata.tambah');
        }
        // return response()->json(['message' => 'Data berhasil disimpan'], 200);
    }

    public function edit(Senjata $alutsista)
    {
        // $alutsista = Senjata::where('kode_senjata', $kode_senjata)->first();
        $riwayat = $alutsista->riwayat;

        return view('admin.senjata.edit', [
            'alutsista' => $alutsista,
            'jenis_senjatas' => JenisSenjata::all(),
            'status_senjatas' => StatusSenjata::all(),
            'riwayats' => $riwayat,
        ]);
    }

    public function update(Request $request,Senjata $alutsista){
        try{
            // dd($request->all());
            $data = request()->validate([
                'nama_senjata' => 'required|string|max:255',
                'nomor_seri' => 'required|string|max:255',
                'jenis_senjata' => 'required|numeric',
                'jumlah' => 'required|numeric',
                'status_senjata' => 'required|numeric',
                'keterangan' => 'required',
                'lokasi' => 'required|string|max:255',
                'riwayat' => 'required|array',
                'riwayat.*.kode_riwayat' => 'required|string|max:255',
                'riwayat.*.nama_operasi' => 'required|string|max:255',
                'riwayat.*.lokasi_operasi' => 'required|string|max:255',
                'riwayat.*.tanggal_mulai' => 'required|date_format:m/d/Y',
                'riwayat.*.tanggal_selesai' => 'required|date_format:m/d/Y',
                'riwayat.*.catatan' => 'required|string|max:255',
                'image' => 'nullable|image|mimes:png,jpg,jpeg|max:2048', // Sesuaikan dengan kebutuhan Anda
            ]);
            // dd($data);
            // dd($data);

            if(isset($data['image']) && $data['image'] !== null){
                if($alutsista->foto){
                    Storage::delete($alutsista->foto);
                }
                $path = $request->file('image')->store('alutsista');
                $data['image'] = $path;
                $alutsista->update([
                    'nama_senjata' => $data['nama_senjata'],
                    'seri_senjata' => $data['nomor_seri'],
                    'jenis_senjata_id' => $data['jenis_senjata'],
                    'status_senjata_id' => $data['status_senjata'],
                    'jumlah' => $data['jumlah'],
                    'keterangan' => $data['keterangan'],
                    'lokasi' => $data['lokasi'],
                    'foto' => $data['image'],
                ]);
            }else{
                $alutsista->update([
                    'nama_senjata' => $data['nama_senjata'],
                    'seri_senjata' => $data['nomor_seri'],
                    'jenis_senjata_id' => $data['jenis_senjata'],
                    'status_senjata_id' => $data['status_senjata'],
                    'jumlah' => $data['jumlah'],
                    'keterangan' => $data['keterangan'],
                    'lokasi' => $data['lokasi'],
                ]);
            }


            foreach ($data['riwayat'] as $riwayat) {

                $tanggal_mulai = DateTime::createFromFormat('m/d/Y', $riwayat['tanggal_mulai']);
                $tanggal_selesai = DateTime::createFromFormat('m/d/Y', $riwayat['tanggal_selesai']);

                Riwayat::updateOrCreate(
                    [
                        'kode_operasi' => $riwayat['kode_riwayat'],
                        'senjata_id' => $alutsista->id,
                    ],
                    [    
                        'nama' => $riwayat['nama_operasi'],
                        'lokasi' => $riwayat['lokasi_operasi'],
                        'tanggal_mulai' => $tanggal_mulai,
                        'tanggal_selesai' => $tanggal_selesai,
                        'catatan' => $riwayat['catatan'],
                    ],
                );
            }

            foreach ($data['riwayat'] as $riwayat) {

                $tanggal_mulai = DateTime::createFromFormat('m/d/Y', $riwayat['tanggal_mulai']);
                $tanggal_selesai = DateTime::createFromFormat('m/d/Y', $riwayat['tanggal_selesai']);
            }
            session()->flash('success', 'Berhasil menyimpan perubahan!');
            return redirect()->route('admin.senjata.edit', ['alutsista' => $alutsista->kode_senjata]);
        }catch(ValidationException $e){
            // dd($e->getMessage());
            session()->flash('error', 'Terjadi kesalahan saat menyimpan data');
            return redirect()->route('admin.senjata.edit', ['alutsista' => $alutsista->kode_senjata])->withErrors($e->validator)->withInput();
        }
        catch(\Exception $e){
            dd($e);
            session()->flash('error', 'Terjadi kesalahan saat menyimpan data');
            return redirect()->route('admin.senjata.edit', ['alutsista' => $alutsista->kode_senjata]);
        }
    }
    
    public function destroy(Senjata $alutsista)
    {
        try{
            $alutsista->delete();
            session()->flash('success', 'Data berhasil dihapus');
            return redirect()->route('admin.senjata');
        }catch(\Exception $e){
            // dd($e);
            session()->flash('error', 'Terjadi kesalahan saat menghapus data');
            return redirect()->route('admin.senjata');
        }
    }
}
