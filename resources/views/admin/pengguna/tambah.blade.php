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
        <div class="px-4">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('admin.pengguna.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="flex gap-4">
                            <div class="flex flex-col w-1/2">
                                <div class=" pb-5 flex flex-col gap-4">
                                    <h3 class=" text-2xl font-bold">
                                        Informasi Pengguna
                                    </h3>
                                    <div>
                                        <x-input-label for="nama" :value="__('Nama')" />
                                        <x-text-input id="nama" class="block mt-1 w-full" type="text" name="nama"
                                            :value="old('nama')" required autofocus autocomplete="nama" />
                                        <x-input-error :messages="$errors->get('nama')" class="mt-2" />
                                    </div>
                                    <div>
                                        <x-input-label for="email" :value="__('Email')" />
                                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                                            :value="old('email')" required autofocus autocomplete="email" />
                                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                    </div>
                                    <div>
                                        <label for="roles"
                                            class="block font-medium text-sm text-gray-700 dark:text-gray-300">Role</label>
                                        <select id="roles" name="roles"
                                            class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-gray-500 dark:focus:border-gray-600 focus:ring-gray-500 dark:focus:ring-dark-600 rounded-md shadow-sm block mt-1 w-full">
                                            @foreach ($roles as $role)
                                                <option value="{{ $role->name }}">{{ $role->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div>
                                        <x-input-label for="nomor_induk" :value="__('Nomor Induk')" />
                                        <x-text-input id="nomor_induk" class="block mt-1 w-full" type="number"
                                            name="nomor_induk" :value="old('nomor_induk')" required autofocus
                                            autocomplete="nomor_induk" />
                                        <x-input-error :messages="$errors->get('nomor_induk')" class="mt-2" />
                                    </div>
                                    <div>
                                        <x-input-label for="nomor_tlp" :value="__('Nomor HP')" />
                                        <x-text-input id="nomor_tlp" class="block mt-1 w-full" type="number"
                                            name="nomor_tlp" :value="old('nomor_tlp')" required autofocus
                                            autocomplete="nomor_tlp" />
                                        <x-input-error :messages="$errors->get('nomor_tlp')" class="mt-2" />
                                    </div>
                                </div>
                                <div class="w-full flex justify-end">
                                    <x-primary-button>
                                        {{ _('Simpan') }}
                                    </x-primary-button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
