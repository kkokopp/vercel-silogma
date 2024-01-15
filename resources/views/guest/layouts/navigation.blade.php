<nav class=" fixed w-full text-slate-700 bg-slate-800 shadow-sm z-50">
    <div class="flex flex-col md:flex-row w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 gap-0 md:gap-4 justify-between">
        <div class="flex flex-row w-full md:w-auto justify-between pt-5 md:py-0">
            <div class="flex px-5 font-extrabold uppercase justify-center items-center sm:py-0">

                <a class="uppercase font-bold text-2xl text-white" href="/">
                    <img src="{{ asset('images/logo2.svg') }}" alt="logo" class=" w-24">
                </a>
            </div>
            <div class="flex md:hidden items-center">
                <button class="block humberger items-center active:bg-green-200 rounded-full" type="button">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6 open-menu">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6 close-menu hidden">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
        <ul
            class="menu md:flex transition-all duration-500 flex-col md:flex-row justify-center items-center text-gray-300 md:justify-between gap-4 font-medium py-2 md:py-0 hilang md:ada">
            <li class="relative group py-5 px-3 hover:text-white">
                <a href="{{ route('alutsista.index') }}"
                    class="{{ request()->is('alutsista') ? 'text-white' : '' }}">Home</a>
                <div
                    class="absolute bottom-0 left-0 w-0 h-[0.20rem] bg-white origin-center transform scale-x-0 transition-transform duration-300 ease-in-out group-hover:scale-x-100 group-hover:w-full">
                </div>
            </li>
            <li class="relative group py-5 px-3 hover:text-white">
                <a href="{{ route('alutsista.semua') }}"
                    class="{{ Str::contains(request()->url(), 'alutsista/post') ? 'text-white' : '' }}">Post</a>
                <div
                    class="absolute bottom-0 left-0 w-0 h-[0.20rem] bg-white origin-center transform scale-x-0 transition-transform duration-300 ease-in-out group-hover:scale-x-100 group-hover:w-full">
                </div>
            </li>
            <li class="relative group py-5 px-3 hover:text-white">
                <a href="{{ route('alutsista.index') . '#etalase' }}"
                    class="{{ Str::contains(request()->url(), '/#etalase') ? 'text-white' : '' }}">Etalase</a>
                <div
                    class="absolute bottom-0 left-0 w-0 h-[0.20rem] bg-white origin-center transform scale-x-0 transition-transform duration-300 ease-in-out group-hover:scale-x-100 group-hover:w-full">
                </div>
            </li>
            {{-- {{ dd(request()->url()) }} --}}
            <li class="relative group py-5 px-3 hover:text-white">
                {{-- {{ dd(auth()->user()->hasRole('admin')) }} --}}
                @if (Auth::check())
                    @if (auth()->user()->hasRole('admin') == true)
                        <a href="{{ route('admin.dashboard') }}"
                            class="bg-white py-2 px-2 rounded-md text-black hover:text-white hover:bg-slate-500">Dashboard</a>
                    @else 
                        <a href="{{ route('user.dashboard') }}"
                            class="bg-white py-2 px-2 rounded-md text-black hover:text-white hover:bg-slate-500">Dashboard</a>
                    @endif
                @else
                    <a href="{{ route('login') }}"
                        class="bg-white py-2 px-2 rounded-md text-black hover:text-white hover:bg-slate-500">Login</a>
                @endif
                {{-- <div class="absolute bottom-0 left-0 w-0 h-[0.20rem] bg-white origin-center transform scale-x-0 transition-transform duration-300 ease-in-out group-hover:scale-x-100 group-hover:w-full"></div> --}}
            </li>
        </ul>
    </div>
</nav>
