@extends('admin.layouts.app')
@if (session('success'))
    <x-success-message />
@endif
@if (session('error'))
    <x-success-message />
@endif
@section('header')
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Edit') }}
    </h2>
@endsection
@section('content')
    <div class="py-4">
        <div class="px-4">
            <div class="bg-gray-50 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('admin.senjata.update', ['alutsista' => $alutsista->kode_senjata]) }}"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="flex gap-4">
                            <div class="flex flex-col w-1/2">
                                <div class=" pb-5 flex flex-col gap-4">
                                    <h3 class=" text-2xl font-bold">
                                        Informasi Alutsista
                                    </h3>
                                    <div>
                                        <x-input-label for="nama_senjata" :value="__('Nama Alutsista')" />
                                        <x-text-input id="nama_senjata" class="block mt-1 w-full" type="text"
                                            name="nama_senjata" :value="$alutsista->nama_senjata" required autofocus
                                            autocomplete="nama_senjata" />
                                        <x-input-error :messages="$errors->get('nama_senjata')" class="mt-2" />
                                    </div>
                                    <div>
                                        <x-input-label for="nomor_seri" :value="__('Nomor Seri')" />
                                        <x-text-input id="nomor_seri" class="block mt-1 w-full" type="text"
                                            name="nomor_seri" :value="$alutsista->seri_senjata" required autofocus
                                            autocomplete="nomor_seri" />
                                        <x-input-error :messages="$errors->get('nomor_seri')" class="mt-2" />
                                    </div>
                                    <div>
                                        <label for="jenis_senjata"
                                            class="block font-medium text-sm text-gray-700 dark:text-gray-300">Jenis</label>
                                        <select id="jenis_senjata" name="jenis_senjata"
                                            class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-gray-500 dark:focus:border-gray-600 focus:ring-gray-500 dark:focus:ring-dark-600 rounded-md shadow-sm block mt-1 w-full">
                                            @foreach ($jenis_senjatas as $jenis_senjata)
                                                <option value="{{ $jenis_senjata->id }}"
                                                    {{ $jenis_senjata->id == $alutsista->jenis_senjata->id ? 'selected' : '' }}>
                                                    {{ $jenis_senjata->nama_jenis_senjata }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div>
                                        <x-input-label for="jumlah" :value="__('Jumlah')" />
                                        <x-text-input id="jumlah" class="block mt-1 w-full" type="number" name="jumlah"
                                            :value="$alutsista->jumlah" required autofocus autocomplete="jumlah" />
                                        <x-input-error :messages="$errors->get('jumlah')" class="mt-2" />
                                    </div>
                                    <div>
                                        <label for="status_senjata"
                                            class="block font-medium text-sm text-gray-700 dark:text-gray-300">Status</label>
                                        <select id="status_senjata" name="status_senjata"
                                            class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-gray-500 dark:focus:border-gray-600 focus:ring-gray-500 dark:focus:ring-dark-600 rounded-md shadow-sm block mt-1 w-full">
                                            @foreach ($status_senjatas as $status_senjata)
                                                <option value="{{ $status_senjata->id }}"
                                                    {{ $status_senjata->id == $alutsista->status_senjata->id ? 'selected' : '' }}>
                                                    {{ $status_senjata->nama_status_senjata }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div>
                                        <x-input-label for="lokasi" :value="__('Lokasi Sekarang')" />
                                        <x-text-input id="lokasi" class="block mt-1 w-full" type="text" name="lokasi"
                                            :value="$alutsista->lokasi" required autofocus autocomplete="lokasi" />
                                        <x-input-error :messages="$errors->get('lokasi')" class="mt-2" />
                                    </div>
                                    <div>
                                        <x-input-label for="keterangan" :value="__('Keterangan')" />
                                        <x-text-input id="keterangan" class="block mt-1 w-full" type="hidden"
                                            name="keterangan" :value="$alutsista->keterangan" required autofocus
                                            autocomplete="keterangan" />
                                        <x-input-error :messages="$errors->get('keterangan')" class="mt-2" />
                                        <trix-editor input="keterangan"></trix-editor>
                                    </div>
                                </div>
                                <div id="riwSec" class="border-t-2 border-dashed pt-5 border-gray-400 pb-5">
                                    <h3 class=" text-2xl font-bold">
                                        Riwayat Penggunaan
                                    </h3>
                                    <div id="riwayatContainer" class="relative py-3 border-b-gray-200 border-b-2">
                                        <h4 id="judulRiwayat" class=" font-medium">
                                            Riwayat
                                        </h4>
                                        {{-- {{ dd($riwayat) }} --}}
                                        <div id="riwayatForm" class="riwayat-form dropdown-form flex flex-col gap-4 pt-5">
                                            <input type="text" id="kode_riwayat" name="riwayat[0][kode_riwayat]"
                                                class="hidden">
                                            <div>
                                                <x-input-label for="nama_operasi" :value="__('Nama Operasi')" />
                                                <x-text-input id="nama_operasi" class="block mt-1 w-full" type="text"
                                                    name="riwayat[0][nama_operasi]" required autofocus
                                                    autocomplete="nama_operasi" />
                                                <x-input-error :messages="$errors->get('nama_operasi')" class="mt-2" />
                                            </div>
                                            <div>
                                                <x-input-label for="lokasi_operasi" :value="__('Lokasi Operasi')" />
                                                <x-text-input id="lokasi_operasi" class="block mt-1 w-full" type="text"
                                                    name="riwayat[0][lokasi_operasi]" required autofocus
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
                                                class="w-6 h-6 hidden">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                            </svg>

                                            <svg id="arrow-left" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                                <button id="tambahRiwayat" type="button"
                                    class="bg-blue-300 border-2 border-blue-600 w-40 text-blue-600 font-medium px-4 py-2 rounded-md hover:bg-blue-600 hover:text-white">
                                    Tambah Riwayat
                                </button>
                            </div>
                            <div class="w-1/2">
                                <div class="gap-4 flex flex-col w-full">
                                    <div class="mx-auto bg-white rounded-lg shadow-md overflow-hidden items-center w-full">
                                        <div class="px-4 py-5">
                                            <div id="image-preview"
                                                class="p-6 mb-4 bg-gray-100 rounded-lg items-center mx-auto text-center cursor-pointer">
                                                <img src="{{ asset('storage/' . $alutsista->foto) }}"
                                                    class="max-h-48 rounded-lg mx-auto" alt="Image preview"
                                                    class="cursor-pointer">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="mx-auto bg-white rounded-lg shadow-md overflow-hidden items-center w-full">
                                        <div class="px-4 py-5">
                                            {{-- <input type="file" id="image" name="image" class="hidden"> --}}
                                            <x-upload-image />
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
        <script>
            const riwayatData = @json($alutsista->riwayat ?? []);
        </script>
    </div>
@endsection
