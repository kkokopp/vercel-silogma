@extends('guest.layouts.app')
<?php
$jenis_gambar = ['sniper.jpg', 'angkut.jpg', 'kapal_perang.jpg', 'pesawat_tempur.jpg', 'submachine_gun.jpg', 'tankk.jpg'];
?>
@section('content')
    <div class="h-full">
        <div class="bg-gray-200 dark:bg-gray-800 overflow-hidden ">
            <div class="w-full flex flex-col justify-center items-center">
                <div class="flex w-full justify-center">
                    <div
                        class="max-w-7xl bg-white w-full px-20 py-20 gap-20 rounded-md flex flex-row items-start justify-start">
                        <div class="w-2/3">
                            <div class="flex flex-col gap-5">
                                <h4 class=" font-bold text-3xl">
                                    {{ $alutsista->nama_senjata }}
                                </h4>
                                <div class="flex gap-5">
                                    <div class="border-r-2 border-black pr-6">
                                        <p>{{ date('d/m/Y', strtotime($alutsista->created_at)) }}</p>
                                    </div>
                                    <div class="border-r-2 border-black pr-6">
                                        <a href="/alutsista/post?kategori={{ $alutsista->jenis_senjata->slug }}"
                                            class="hover:text-blue-700 underline">{{ $alutsista->jenis_senjata->nama_jenis_senjata }}</a>
                                    </div>
                                    <div class="border-r-2 border-black pr-6">
                                        <p>{{ $alutsista->status_senjata->nama_status_senjata }}</p>
                                    </div>
                                </div>
                                <div class="flex justify-center items-center">
                                    @if ($alutsista->foto == null)
                                        @if ($alutsista->jenis_senjata->id >= 1 && $alutsista->jenis_senjata->id <= 6)
                                            <img src="{{ asset('images/' . $jenis_gambar[$alutsista->jenis_senjata->id - 1]) }}"
                                                alt="beranda" class="object-cover object-top w-full rounded-t-md">
                                        @endif
                                    @else
                                        <img src="{{ asset('storage/' . $alutsista->foto) }}" alt="beranda"
                                            class="object-cover object-top rounded-l-md">
                                    @endif
                                </div>
                                <div>
                                    <p class="font-normal">{!! $alutsista->keterangan !!}</p>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="text-3xl font-semibold pt-5">
                                <h4>Alutsista Sejenis</h4>
                            </div>
                            <div class="pt-10">
                                @if ($alutsistas_last->count() == 0)
                                    <div class="w-full justify-center flex ">
                                        <div
                                            class="p-3 overflow-hidden text-xl flex flex-col items-center justify-center h-full">
                                            <p>Tidak ada Alutsista</p>
                                        </div>
                                    </div>
                                @else
                                    <div class="flex flex-col gap-5">
                                        @foreach ($alutsistas_sejenis as $alutsistas)
                                            <div class="rounded-md w-80 border-slate-400 h-42 flex">
                                                <div>
                                                    @if ($alutsistas->foto == null)
                                                        @if ($alutsistas->jenis_senjata->id >= 1 && $alutsistas->jenis_senjata->id <= 6)
                                                            <img src="{{ asset('images/' . $jenis_gambar[$alutsistas->jenis_senjata->id - 1]) }}"
                                                                alt="beranda"
                                                                class="object-cover object-top w-36 rounded-t-md h-28">
                                                        @endif
                                                    @else
                                                        <img src="{{ asset('storage/' . $alutsistas->foto) }}" alt="beranda"
                                                            class="object-cover object-top rounded-l-md w-36 h-28">
                                                    @endif
                                                </div>
                                                <div class="p-2 font-bold overflow-hidden flex flex-col">
                                                    <div class="line-clamp-2 text-xs">
                                                        <p>{{ $alutsistas->nama_senjata }}</p>
                                                    </div>
                                                    <div class=" text-xs line-clamp-2 w-40 font-normal">
                                                        <p>{!! $alutsistas->keterangan !!}</p>
                                                    </div>
                                                    <div class="py-2 w-full items-end flex justify-end hover">
                                                        <a href="{{ route('alutsista.show', ['alutsista' => $alutsistas->kode_senjata]) }}"
                                                            class="bg-slate-900 py-1 px-2 rounded-md text-white text-xs">Selengkapnya</a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex w-full justify-center">
                    <div class="max-w-7xl bg-white w-full px-20 py-20 gap-20 rounded-md flex">
                        <div>
                            <div class="text-3xl font-semibold pt-5">
                                <h4>Alutsista Terbaru</h4>
                            </div>
                            <div class="pt-10">
                                @if ($alutsistas_last->count() == 0)
                                    <div class="w-full justify-center flex ">
                                        <div
                                            class="p-3 overflow-hidden text-xl flex flex-col items-center justify-center h-full">
                                            <p>Tidak ada Alutsista</p>
                                        </div>
                                    </div>
                                @else
                                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5 gap-5">
                                        @foreach ($alutsistas_last as $alutsistas)
                                            <div
                                                class="rounded-md border-slate-400 h-42 border-2 group hover:-translate-x-1 hover:-translate-y-1 transition-transform duration-300 hover:scale-105 hover:shadow-md flex flex-col">
                                                <div class="overflow-hidden">
                                                    @if ($alutsistas->foto == null)
                                                        @if ($alutsistas->jenis_senjata->id >= 1 && $alutsistas->jenis_senjata->id <= 6)
                                                            <img src="{{ asset('images/' . $jenis_gambar[$alutsistas->jenis_senjata->id - 1]) }}"
                                                                alt="beranda"
                                                                class="object-cover object-top w-full rounded-t-md h-28">
                                                        @endif
                                                    @else
                                                        <img src="{{ asset('storage/' . $alutsistas->foto) }}"
                                                            alt="beranda"
                                                            class="object-cover object-top rounded-t-md w-full h-28">
                                                    @endif
                                                </div>
                                                <div
                                                    class="py-2 px-1 font-bold overflow-hidden flex flex-col justify-between h-32">
                                                    <div class="line-clamp-2 text-xs w-full">
                                                        <p>{{ $alutsistas->nama_senjata }}</p>
                                                    </div>
                                                    <div class=" text-xs line-clamp-2 w-full font-normal">
                                                        <p>{!! $alutsistas->keterangan !!}</p>
                                                    </div>
                                                    <div class="py-2 w-full items-end flex justify-end hover">
                                                        <a href="{{ route('alutsista.show', ['alutsista' => $alutsistas->kode_senjata]) }}"
                                                            class="bg-slate-900 py-1 px-2 rounded-md text-white text-xs">Selengkapnya</a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
