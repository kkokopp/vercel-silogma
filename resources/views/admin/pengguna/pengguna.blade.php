@extends('admin.layouts.app')
@section('header')
<h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
    {{ __('Dashboard') }}
</h2>
@endsection
@section('content')
<div class="py-4">
    <div class="px-4">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="flex p-5">
                <a href="{{ route('admin.pengguna.tambah') }}" class="flex gap-2 justify-center items-center hover:bg-green-600 rounded-lg bg-green-500 py-2 px-4 text-white font-semibold">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>                      
                    Tambah
                </a>
            </div>
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-white uppercase bg-gradient-to-br from-slate-900 to-slate-600">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Email
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Nama
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Nomor Induk
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Peran
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Nomor Telepon
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $index => $user)                                
                                <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $user->email }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $user->name }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $user->nomor_induk }}
                                    </td>
                                    @foreach ($user->roles as $role)    
                                        <td class="px-6 py-4">
                                            @if($role->name == 'admin')
                                                <a class="py-2 px-3 text-white rounded-md bg-slate-600">
                                                    {{ $role->name }}
                                                </a>
                                            @else
                                                <a class="py-2 px-3 rounded-md bg-slate-200">
                                                    {{ $role->name }}
                                                </a>
                                            @endif
                                        </td>
                                    @endforeach
                                    <td class="px-6 py-4">
                                        {{ $user->nomor_tlp }}
                                    </td>
                                    <td class="px-6 flex gap-2 py-4">
                                        {{-- <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a> --}}
                                        <a href="{{ route('admin.pengguna.edit', ['user' => $user->kode_user]) }}" class="inline-flex justify-center rounded-md bg-blue-500 px-3 py-2 text-sm font-semibold text-white shadow-sm border-2 border-blue-700 hover:bg-blue-400">Edit</a>
                                        {{-- <form action="{{ route('admin.pengguna.destroy', ['user' => $user->kode_user]) }}" method="POST"> --}}
                                            {{-- {{ dd($user->kode_user) }} --}}
                                            {{-- @csrf     
                                            @method('DELETE')                                        --}}
                                        <button type="button" data-id="{{ $index }}" class="modalbtn inline-flex justify-center rounded-md bg-red-500 px-3 py-2 text-sm font-semibold text-white shadow-sm border-2 border-red-700 hover:bg-red-400 ">Delete</button>
                                        {{-- </form> --}}
                                        <x-modal-confirmation :kode="$user->kode_user" title=Pengguna route=admin.pengguna.destroy model=user :iteration="$index"/>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="py-5">
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var modalBtns = document.querySelectorAll('.modalbtn');

        modalBtns.forEach(function(modalBtn) {
            modalBtn.addEventListener("click", function() {
                // Dapatkan data-id dari tombol untuk menemukan modal yang sesuai
                var modalId = modalBtn.getAttribute('data-id');
                
                // Bangun selector modal berdasarkan data-id
                var modalSelector = "#modal-confirmation-" + modalId;
                
                // Temukan modal menggunakan selector yang baru dibangun
                var modal = document.querySelector(modalSelector);
                
                // Periksa apakah modal ditemukan sebelum menampilkan atau menyembunyikan
                if (modal) {
                    modal.toggleAttribute("hidden");
                }
            });
        });
    });
</script>
@endsection
