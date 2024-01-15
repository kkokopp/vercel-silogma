<aside class="fixed flex flex-col h-full rounded-xl text-gray-700 p-5 items-center w-64">
    <div class="flex pt-5 ">
        <h1 class="uppercase text-2xl font-extrabold">
            <img src="{{ asset('images/logo_black.svg') }}" alt="logo" class="w-28">
        </h1>
    </div>
    <div class="flex flex-col w-full pt-5">
        <ul class="list-none">
            <li class="py-1">
                <a class="{{ request()->is('admin/dashboard') ? 'sidebar-active' : '' }} flex p-2 w-full text-lg font-medium hover:bg-gradient-to-br transition duration-300 from-slate-900 to-slate-600 rounded-lg hover:text-white items-center select-none"
                    href="{{ route('admin.dashboard') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                        stroke="currentColor" class="w-7 h-7">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 6a7.5 7.5 0 107.5 7.5h-7.5V6z" />
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M13.5 10.5H21A7.5 7.5 0 0013.5 3v7.5z" />
                    </svg>
                    <span class="ml-3 whitespace-nowrap opacity-transition">Dashboard</span>
                </a>
            </li>
            <li class="py-1">
                <a class="{{ Str::contains(request()->url(), 'admin/senjata') ? 'sidebar-active' : '' }} flex p-2 w-full text-lg font-medium hover:bg-gradient-to-br transition duration-300  from-slate-900 to-slate-600 rounded-lg hover:text-white items-center select-none"
                    href="{{ route('admin.senjata') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M21 7.5l-9-5.25L3 7.5m18 0l-9 5.25m9-5.25v9l-9 5.25M3 7.5l9 5.25M3 7.5v9l9 5.25m0-9v9" />
                    </svg>
                    <span class="ml-3 whitespace-nowrap opacity-transition">Inventori</span>
                </a>
            </li>
            <li class="py-1">
                <a class="{{ Str::contains(request()->url(), 'admin/pengguna') ? 'sidebar-active' : '' }} flex p-2 w-full text-lg font-medium hover:bg-gradient-to-br transition duration-300 from-slate-900 to-slate-600 rounded-lg hover:text-white items-center select-none"
                    href="{{ route('admin.pengguna') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                    </svg>
                    <span class="ml-3 whitespace-nowrap opacity-transition">Pengguna</span>
                </a>
            </li>
            {{-- dd() --}}
        </ul>
    </div>
</aside>
