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

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="{{ mix('resources/js/togglePassword.js') }}"></script>
</head>

<body class="font-sans text-gray-900 antialiased">
    <div class="min-h-screen flex flex-col sm:justify-center bg-white dark:bg-gray-900">
        @include('layouts.header')
        <div class="flex flex-col flex-grow justify-center items-center p-5 sm:p-0">
            <div
                class="w-full sm:max-w-md mt-6 px-6 py-4 overflow-hidden sm:rounded-lg dark:bg-slate-800 sm:dark:bg-gray-900">
                <h1 class="text-gray-900 dark:text-white text-xl md:text-3xl font-black pb-8">Masuk</h1>
                {{ $slot }}
            </div>
        </div>
    </div>
</body>

</html>
