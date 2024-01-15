@extends('admin.layouts.app')
@section('header')
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Dashboard') }}
    </h2>
@endsection
@section('content')
    <div class="py-4">
        <div class="px-4 w-full flex flex-col gap-4">
            <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-5 xl:grid-cols-6 gap-4 w-full">
                <div
                    class="bg-white dark:bg-gray-800 overflow-hidden shadow-md sm:rounded-lg gap-4 flex flex-col justify-between p-5 border-l-8 border-slate-800">
                    <div class="text-slate-900 font-bold text-4xl">
                        <p>{{ $user }}</p>
                    </div>
                    <div class=" text-xl font-semibold">
                        Jumlah Pengguna
                    </div>
                </div>
                <div
                    class="bg-white dark:bg-gray-800 overflow-hidden shadow-md sm:rounded-lg gap-4 flex flex-col justify-between p-5 border-l-8 border-slate-800">
                    <div class="text-slate-900 font-bold text-4xl">
                        <p>{{ $senjata->count() }}</p>
                    </div>
                    <div class=" text-xl font-semibold">
                        Jumlah Alutsista
                    </div>
                </div>
                <div
                    class="bg-white dark:bg-gray-800 overflow-hidden shadow-md sm:rounded-lg gap-4 flex flex-col justify-between p-5 border-l-8 border-slate-800">
                    <div class="text-slate-900 font-bold text-4xl">
                        <p>{{ $jenis }}</p>
                    </div>
                    <div class=" text-xl font-semibold">
                        Jenis Senjata
                    </div>
                </div>
                @foreach ($statuss as $status)
                    <div
                        class="bg-white dark:bg-gray-800 overflow-hidden shadow-md sm:rounded-lg gap-4 flex flex-col justify-between p-5 border-l-8 border-slate-800">
                        <div class="text-slate-900 font-bold text-4xl">
                            <p>{{ $status['jumlah_senjata'] }}</p>
                        </div>
                        <div class=" text-xl font-semibold">
                            <h2>{{ $status['status'] }}</h2>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="flex flex-col gap-4 pb-4">
                <div class="flex flex-row gap-4 w-full">
                    <div class="w-1/2">
                        <div class="bg-white shadow-md rounded-md p-5 w-full h-full">
                            <canvas id="myChart" style="width:100%;max-width:800px;height:100%;max-height:600px"></canvas>
                        </div>
                    </div>
                    <div class="w-1/2">
                        <div class="bg-white shadow-md rounded-md p-5 w-full h-96">
                            <canvas id="myChart3" style="width:100%;max-width:800px;height:100%;max-height:600px"></canvas>
                        </div>
                    </div>
                </div>
                <div class="flex flex-row gap-4 w-full">
                    <div class="w-1/2 pr-2">
                        <div class="bg-white shadow-md rounded-md p-5">
                            <canvas id="myChart2" style="width:100%;max-width:600px;height:100%;max-height:500px"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('myChart');
        var dari = <?php echo json_encode($statuss); ?>;
        var nama = dari.map(function(e) {
            return e.status;
        });

        var jumlah = dari.map(function(e) {
            return e.jumlah_senjata
        });

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: nama,
                datasets: [{
                    label: "Jumlah Alutsista Sesuai Status",
                    data: jumlah,
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
        const ctx2 = document.getElementById('myChart2');
        var dari2 = <?php echo json_encode($jumlah); ?>;
        var nama2 = dari2.map(function(e) {
            return e.jenis;
        });

        var jumlah2 = dari2.map(function(e) {
            return e.jumlah_senjata
        });

        new Chart(ctx2, {
            type: 'pie',
            data: {
                labels: nama2,
                datasets: [{
                    label: "Jumlah Alutsista Sesuai",
                    data: jumlah2,
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
        const ctx3 = document.getElementById('myChart3');
        var dari3 = <?php echo json_encode($jumlah_senjata); ?>;
        var nama3 = dari3.map(function(e) {
            return e.bulan;
        });

        var jumlah3 = dari3.map(function(e) {
            return e.jumlah_senjata
        });

        new Chart(ctx3, {
            type: 'line',
            data: {
                labels: nama3,
                datasets: [{
                    label: "Jumlah Alutsista",
                    data: jumlah3,
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
    </div>
@endsection
