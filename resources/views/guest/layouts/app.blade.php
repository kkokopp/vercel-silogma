<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    {{-- <link rel="stylesheet" href=""> --}}
    <!-- Scripts -->
    {{-- @vite('resources/js/app.js') --}}
    <style>{{ Vite::content('resources/css/app.css')}}</style>
    <script>{{ Vite::content('resources/js/app.js') }}</script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.min.js"></script>
    @trixassets
    {{-- <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js"></script> --}}

    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script> --}}
</head>

<body class="font-sans antialiased">
    <div class="flex flex-col min-h-screen bg-gray-100">

        {{-- Sidebar --}}
        <div class="w-full bg-white">
            @include('guest.layouts.navigation')
        </div>
        <main class="flex-1 pt-16 justify-start overflow-hidden overflow-y-auto">
            @yield('content')
        </main>
        <div>
            @include('guest.layouts.footer')
        </div>
    </div>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script> --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> --}}
    <script src="{{ asset('js/dropdown.js') }}"></script>
    {{-- @vite('resources/js/uploadImage.js')
    @vite('resources/js/riwayatForm.js') --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script> --}}
</body>

</html>
