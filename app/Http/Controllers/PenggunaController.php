<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class PenggunaController extends Controller
{
    //
    public function index()
    {
        return view('admin.pengguna.pengguna',[
            'users' => User::with('roles')->paginate(10)
        ]);
    }

    public function create()
    {
        return view('admin.pengguna.tambah', [
            'roles' => \Spatie\Permission\Models\Role::all()
        ]);
    }

    public function store(Request $request)
    {
        //
        try{
            $data = request()->validate([
                'nama' => 'required',
                'email' => 'required|email|unique:users|email:rfc,dns',
                'roles' => 'required',
                'nomor_induk' => 'required|unique:users|numeric|digits_between:10,10',
                'nomor_tlp' => 'required|numeric|unique:users|digits_between:10,13',
            ]);

            $password = Str::random(8);
            $kode_user = Str::uuid();
            // dd($kode_user);

            $pengguna = User::create([
                'name' => $data['nama'],
                'kode_user' => $kode_user,
                'email' => $data['email'],
                'nomor_tlp' => $data['nomor_tlp'],
                'nomor_induk' => $data['nomor_induk'],
                'password' => bcrypt($password),
            ]);

            $pengguna->assignRole($data['roles']);
            $pengguna->notify(new \App\Notifications\SendPasswordNotification($password));
    
            return redirect()->route('admin.pengguna')->with('success', 'Pengguna berhasil ditambahkan');

        }catch(ValidationException $e){
            // dd($e->getMessage());
            return redirect()->route('admin.pengguna.tambah')->withErrors($e->validator)->withInput();
        }catch(\Exception $e){
            dd($e->getMessage());
            return redirect()->route('admin.pengguna')->with('error', 'Pengguna gagal ditambahkan');
        }
    }

    public function edit(User $user)
    {
        // dd($user);
        return view('admin.pengguna.edit', [
            'user' => $user,
            'roles' => \Spatie\Permission\Models\Role::all()
        ]);
    }

    public function update(Request $request, User $user){
        // dd($request->all());
        try{
            $data = request()->validate([
                'nama' => 'required',
                'email' => 'required|email:rfc,dns',
                'roles' => 'required',
                'nomor_induk' => 'required',
                'nomor_tlp' => 'required|numeric|digits_between:10,13',
            ]);
            // dd($data);
    
            $user->update([
                'name' => $data['nama'],
                'email' => $data['email'],
                'nomor_tlp' => $data['nomor_tlp'],
                'nomor_induk' => $data['nomor_induk'],
            ]);

            $user->syncRoles($data['roles']);

            session()->flash('success', 'Berhasil menyimpan perubahan!');
            return redirect()->route('admin.pengguna.edit', ['user'=> $user->kode_user]);
        }catch(ValidationException $e){
            // dd($e->getMessage());
            return redirect()->route('admin.pengguna.edit')->withErrors($e->validator)->withInput();
        }catch(\Exception $e){
            // dd($e->getMessage());
            return redirect()->route('admin.pengguna.edit')->with('error', $e->getMessage());
        }


    }

    public function destroy(User $user)
    {
        try{
            // dd($user);
            $user->delete();
            return redirect()->route('admin.pengguna')->with('success', 'Pengguna berhasil dihapus');
        }catch(\Exception $e){
            dd($e->getMessage());
            return redirect()->route('admin.pengguna')->with('error', 'Pengguna gagal dihapus');
        }
    }
}
