@extends('admin.layouts.app')
@if (session('success'))
    <x-success-message />
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        // Tunggu hingga dokumen selesai dimuat
        $(document).ready(function() {
            // Sembunyikan pesan sukses setelah 5 detik
            setTimeout(function() {
                $('.alert-success').fadeOut('slow');
            }, 5000);
        });
    </script>
@endif
@section('header')
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Dashboard') }}
    </h2>
@endsection
@section('content')
    <div class="py-4">
        <div class="px-4">
            <div class="bg-gray-50 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('admin.senjata.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="flex gap-4">
                            <div class="flex flex-col w-1/2">
                                <div class=" pb-5 flex flex-col gap-4">
                                    <h3 class=" text-2xl font-bold">
                                        Informasi Alutsista
                                    </h3>
                                    <div>
                                        <x-input-label for="nama_senjata" :value="__('Nama Alutsista')" />
                                        <x-text-input id="nama_senjata" class="block mt-1 w-full" type="text"
                                            name="nama_senjata" :value="old('nama_senjata')" required autofocus
                                            autocomplete="nama_senjata" />
                                        <x-input-error :messages="$errors->get('nama_senjata')" class="mt-2" />
                                    </div>
                                    <div>
                                        <x-input-label for="nomor_seri" :value="__('Nomor Seri')" />
                                        <x-text-input id="nomor_seri" class="block mt-1 w-full" type="text"
                                            name="nomor_seri" :value="old('nomor_seri')" required autofocus
                                            autocomplete="nomor_seri" />
                                        <x-input-error :messages="$errors->get('nomor_seri')" class="mt-2" />
                                    </div>
                                    <div>
                                        <label for="jenis_senjata"
                                            class="block font-medium text-sm text-gray-700 dark:text-gray-300">Jenis</label>
                                        <select id="jenis_senjata" name="jenis_senjata"
                                            class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-gray-500 dark:focus:border-gray-600 focus:ring-gray-500 dark:focus:ring-dark-600 rounded-md shadow-sm block mt-1 w-full">
                                            @foreach ($jenis_senjatas as $jenis_senjata)
                                                <option value="{{ $jenis_senjata->id }}">
                                                    {{ $jenis_senjata->nama_jenis_senjata }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div>
                                        <x-input-label for="jumlah" :value="__('Jumlah')" />
                                        <x-text-input id="jumlah" class="block mt-1 w-full" type="number" name="jumlah"
                                            :value="old('jumlah')" required autofocus autocomplete="jumlah" />
                                        <x-input-error :messages="$errors->get('jumlah')" class="mt-2" />
                                    </div>
                                    <div>
                                        <label for="status_senjata"
                                            class="block font-medium text-sm text-gray-700 dark:text-gray-300">Status</label>
                                        <select id="status_senjata" name="status_senjata"
                                            class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-gray-500 dark:focus:border-gray-600 focus:ring-gray-500 dark:focus:ring-dark-600 rounded-md shadow-sm block mt-1 w-full">
                                            @foreach ($status_senjatas as $status_senjata)
                                                <option value="{{ $status_senjata->id }}">
                                                    {{ $status_senjata->nama_status_senjata }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div>
                                        <x-input-label for="lokasi" :value="__('Lokasi Sekarang')" />
                                        <x-text-input id="lokasi" class="block mt-1 w-full" type="text" name="lokasi"
                                            :value="old('lokasi')" required autofocus autocomplete="lokasi" />
                                        <x-input-error :messages="$errors->get('lokasi')" class="mt-2" />
                                    </div>
                                    <div>
                                        <x-input-label for="keterangan" :value="__('Keterangan')" />
                                        <x-text-input id="keterangan" class="block mt-1 w-full" type="hidden"
                                            name="keterangan" :value="old('keterangan')" required autofocus
                                            autocomplete="keterangan" />
                                        {{-- <input id="body" type="hidden" name="body" value="{{ old('body', $post->body) }}"> --}}
                                        <x-input-error :messages="$errors->get('keterangan')" class="mt-2" />
                                        <trix-editor input="keterangan"></trix-editor>
                                    </div>
                                </div>
                                <div id="riwSec" class="border-t-2 border-dashed pt-5 border-gray-400 pb-5">
                                    <h3 class=" text-2xl font-bold">
                                        Riwayat Penggunaan
                                    </h3>
                                    <div id="riwayatContainer" class="relative py-3 border-b-gray-400 border-b-2">
                                        <h4 id="judulRiwayat" class=" font-medium">
                                            Riwayat
                                        </h4>
                                        <div id="riwayatForm"
                                            class="riwayat-form dropdown-form flex flex-col gap-4 open pt-5">
                                            <div>
                                                <x-input-label for="nama_operasi" :value="__('Nama Operasi')" />
                                                <x-text-input id="nama_operasi" class="block mt-1 w-full" type="text"
                                                    name="riwayat[0][nama_operasi]" :value="old('nama_operasi')" required autofocus
                                                    autocomplete="nama_operasi" />
                                                <x-input-error :messages="$errors->get('nama_operasi')" class="mt-2" />
                                            </div>
                                            <div>
                                                <x-input-label for="lokasi_operasi" :value="__('Lokasi Operasi')" />
                                                <x-text-input id="lokasi_operasi" class="block mt-1 w-full" type="text"
                                                    name="riwayat[0][lokasi_operasi]" :value="old('lokasi_operasi')" required autofocus
                                                    autocomplete="lokasi_operasi" />
                                                <x-input-error :messages="$errors->get('lokasi_operasi')" class="mt-2" />
                                            </div>

                                            <div class="flex w-full gap-4">
                                                <div
                                                    class="flex flex-col w-full font-medium text-sm text-gray-700 dark:text-gray-300">
                                                    <h4 class="mb-1">
                                                        Tanggal Mulai
                                                    </h4>
                                                    <x-datepicker id="tanggal_mulai" name="tanggal_mulai" />
                                                </div>
                                                <div
                                                    class="flex flex-col w-full font-medium text-sm text-gray-700 dark:text-gray-300">
                                                    <h4 class=" mb-1">
                                                        Tanggal Selesai
                                                    </h4>
                                                    <x-datepicker id="tanggal_selesai" name="tanggal_selesai" />
                                                </div>
                                            </div>
                                            <div>
                                                <x-input-label for="catatan" :value="__('Catatan')" />
                                                <textarea id="catatan" name="riwayat[0][catatan]" rows="4"
                                                    class="border-gray-300 mt-1 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-gray-500 dark:focus:border-gray-600 focus:ring-gray-500 dark:focus:ring-dark-600 rounded-md shadow-sm w-full"></textarea>
                                                <x-input-error :messages="$errors->get('catatan')" class="mt-2" />
                                            </div>
                                        </div>
                                        <button id="toggleForm"
                                            class="absolute top-2 right-2 z-50 bg-gray-200 border-2 border-gray-400 px-1 py-1 rounded-full"
                                            type="button">
                                            <svg id="arrow-bottom" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                            </svg>

                                            <svg id="arrow-left" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                class="w-6 h-6 hidden">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                                            </svg>
                                        </button>
                                        {{-- <button id="toggleTrashForm" class="absolute top-2 right-14 z-50 bg-gray-200 border-2 border-gray-400 px-1 py-1 rounded-full" type="button">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                        </svg>                                                                               
                                    </button> --}}
                                    </div>
                                </div>
                                <button id="tambahRiwayat" type="button"
                                    class="bg-blue-300 border-2 border-blue-600 w-40 text-blue-600 font-medium px-4 py-2 rounded-md hover:bg-blue-600 hover:text-white">
                                    Tambah Riwayat
                                </button>
                            </div>
                            <div class="w-1/2">
                                <div class="mx-auto bg-white rounded-lg shadow-md overflow-hidden items-center">
                                    <div class="px-4 py-5">
                                        <input type="file" id="image" name="image" class="hidden">
                                        <div id="image-preview"
                                            class="p-6 mb-4 bg-gray-100 border-dashed border-2 border-gray-400 rounded-lg items-center mx-auto text-center cursor-pointer">
                                            {{-- <input id="image" type="file" name="image" accept="image/*"/> --}}
                                            <label for="image" class="cursor-pointer">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    class="w-8 h-8 text-gray-700 mx-auto mb-4">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5" />
                                                </svg>
                                                <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-700">Upload Foto
                                                    Alutsista</h5>
                                                <p class="font-normal text-sm text-gray-400 md:px-6">Pilih gambar alutsista
                                                </p>
                                                <p class="font-normal text-sm text-gray-400 md:px-6">pastikan memiliki
                                                    format <b class="text-gray-600">JPG, PNG, or GIF</b></p>
                                                <span id="filename" class="text-gray-500 bg-gray-200 z-50"></span>
                                            </label>
                                            <x-input-error :messages="$errors->get('image')" class="mt-2" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="w-full flex justify-end">
                            <x-primary-button>
                                {{ _('Simpan') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
