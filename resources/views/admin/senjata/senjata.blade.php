@extends('admin.layouts.app')
@if (session('success'))
    <x-success-message />
@endif
@section('header')
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Dashboard') }}
    </h2>
@endsection
@section('content')
    <div class="py-4">
        <div class="relative px-4">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg flex min-h-full flex-col">
                <div class="flex p-5">
                    <a href="{{ route('admin.senjata.tambah') }}"
                        class="flex gap-2 justify-center items-center hover:bg-green-600 rounded-lg bg-green-500 py-2 px-4 text-white font-semibold">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                        Tambah
                    </a>
                </div>
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="overflow-x-auto shadow-md sm:rounded-lg z-0">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-white uppercase bg-gradient-to-br from-slate-900 to-slate-600">
                                <tr>
                                    {{-- <th scope="col" class="px-6 py-3">
                                Kode Alusista
                            </th> --}}
                                    <th scope="col" class="px-6 py-3">
                                        Foto
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Nama
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Jenis
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Jumlah
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Nomor Seri
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Status
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($alutsistas as $index => $alutsista)
                                    <tr
                                        class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                        {{-- <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $alutsista->kode_senjata }}
                                </th> --}}
                                        <td class="px-6 py-4">
                                            <img src="{{ asset('storage/' . $alutsista->foto) }}" alt="alutsista"
                                                class="w-40 ">
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $alutsista->nama_senjata }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $alutsista->jenis_senjata->nama_jenis_senjata }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $alutsista->jumlah }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $alutsista->seri_senjata }}
                                        </td>
                                        @if ($alutsista->status_senjata->nama_status_senjata == 'Aktif')
                                            <td class="px-6 py-4">
                                                <div
                                                    class="bg-green-300 border-2 border-green-400 rounded-lg flex w-fit justify-center items-center font-bold text-green-600 py-2 px-5">
                                                    <p>
                                                        {{ $alutsista->status_senjata->nama_status_senjata }}
                                                    </p>
                                                </div>
                                            </td>
                                        @else
                                            <td class="px-6 py-4">
                                                <div
                                                    class="bg-red-300 border-2 border-red-400 rounded-lg flex w-fit justify-center items-center font-bold text-red-600 py-2 px-5">
                                                    <p>
                                                        {{ $alutsista->status_senjata->nama_status_senjata }}
                                                    </p>
                                                </div>
                                            </td>
                                        @endif
                                        <td class="px-6 py-4">
                                            <!-- Dropdown Button -->
                                            <button type="button"
                                                class="text-gray-700 hover:text-gray-900 focus:outline-none dropdown-button"
                                                id="button-menu">
                                                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M12 6.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 12.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 18.75a.75.75 0 110-1.5.75.75 0 010 1.5z" />
                                                </svg>
                                            </button>

                                            <!-- Dropdown Menu -->
                                            <div
                                                class="origin-top-right right-0 absolute mt-2 w-44 -translate-x-40 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 hidden z-50 dropdown-menu">
                                                <div class="py-1" role="menu" aria-orientation="vertical"
                                                    aria-labelledby="options-menu">
                                                    <a href="{{ route('alutsista.show', ['alutsista' => $alutsista->kode_senjata]) }}"
                                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900"
                                                        role="menuitem">Lihat</a>
                                                    <a href="{{ route('admin.senjata.edit', ['alutsista' => $alutsista->kode_senjata]) }}"
                                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900"
                                                        role="menuitem">Edit</a>
                                                    <button
                                                        class="modalbtn cursor-pointer w-full block items-start justify-start px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900"
                                                        role="menuitem" type="button" data-id="{{ $index }}">
                                                        <div class="flex items-start">
                                                            <span>Delete</span>
                                                        </div>
                                                    </button>
                                                </div>
                                            </div>
                                            <x-modal-confirmation :kode="$alutsista->kode_senjata" title=Alutsista
                                                route=admin.senjata.destroy model=alutsista :iteration="$index" />
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="py-5">
                        {{ $alutsistas->links() }}
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
