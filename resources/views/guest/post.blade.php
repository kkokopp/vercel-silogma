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
                            <div class="text-3xl font-semibold pt-5">
                                <h4>{{ $title }}</h4>
                            </div>
                            <div class="pt-10 w-full">
                                @if ($alutsistas->count() == 0)
                                    <div class="w-full justify-center flex ">
                                        <div class="p-3 overflow-hidden text-xl flex items-center justify-center h-full">
                                            <p>Tidak ada Alutsista</p>
                                        </div>
                                    </div>
                                @else
                                    <div class="flex flex-col gap-5 justify-start items-start w-full">
                                        @foreach ($alutsistas as $alutsista)
                                            <div class="shadow-md rounded-md w-full border-slate-400 border-2">
                                                <div>
                                                    @if ($alutsista->foto == null)
                                                        @if ($alutsista->jenis_senjata->id >= 1 && $alutsista->jenis_senjata->id <= 6)
                                                            <img src="{{ asset('images/' . $jenis_gambar[$alutsista->jenis_senjata->id - 1]) }}"
                                                                alt="beranda"
                                                                class="object-cover object-top w-full rounded-t-md h-48">
                                                        @endif
                                                    @else
                                                        <img src="{{ asset('storage/' . $alutsista->foto) }}" alt="beranda"
                                                            class="object-cover object-top w-full rounded-t-md h-48">
                                                    @endif
                                                </div>
                                                <div class="p-3 overflow-hidden">
                                                    <div class="line-clamp-2 max-h-30 h-full">
                                                        <p class="font-bold">{{ $alutsista->nama_senjata }}</p>
                                                        <p class="font-normal">{!! $alutsista->keterangan !!}</p>
                                                    </div>
                                                    <div class=" text-xs font-normal">
                                                        <a href="post?kategori={{ $alutsista->jenis_senjata->slug }}"
                                                            class="hover:text-blue-700 underline">{{ $alutsista->jenis_senjata->nama_jenis_senjata }}</a>
                                                    </div>
                                                    <div class=" font-bold w-full items-end flex justify-between hover">
                                                        <p>{{ date('d/m/Y', strtotime($alutsista->created_at)) }}</p>
                                                        <a href="{{ route('alutsista.show', ['alutsista' => $alutsista->kode_senjata]) }}"
                                                            class="bg-slate-900 py-2 px-3 rounded-md text-white">Selengkapnya</a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                            <div class="py-5 max-w-6xl w-full">
                                {{ $alutsistas->links() }}
                            </div>
                        </div>
                        <div>
                            <div class="text-3xl font-semibold pt-5">
                                <h4>Terbaru</h4>
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
                                        @foreach ($alutsistas_last as $alutsistas)
                                            <div class="rounded-md w-80 border-slate-400 h-42 flex">
                                                <div class="w-1/2">
                                                    @if ($alutsistas->foto == null)
                                                        @if ($alutsistas->jenis_senjata->id >= 1 && $alutsistas->jenis_senjata->id <= 6)
                                                            <img src="{{ asset('images/' . $jenis_gambar[$alutsistas->jenis_senjata->id - 1]) }}"
                                                                alt="beranda"
                                                                class="object-cover object-top w-36 rounded-t-md h-28">
                                                        @endif
                                                    @else
                                                        <img src="{{ asset('storage/' . $alutsistas->foto) }}"
                                                            alt="beranda"
                                                            class="object-cover object-top rounded-l-md w-36 h-28">
                                                    @endif
                                                </div>
                                                <div class="font-bold overflow-hidden flex flex-col w-1/2">
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
            </div>
        </div>
    </div>
@endsection
