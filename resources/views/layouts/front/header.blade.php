
<div class=" text-black/50 dark:text-black ">
    <div class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
        <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">

    <header class="grid grid-cols-2 items-center gap-2 py-10 lg:grid-cols-3 ">
        <div class="flex lg:justify-center lg:col-start-2 ">
        </div>
        @if (Route::has('login'))
            <nav class="-mx-3 flex flex-1 justify-end">
                @auth
                    <a
                        href="{{ url('/dashboard') }}"
                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20]  dark:hover:text-white/80 dark:focus-visible:ring-white"
                    >
                        <p>Dashboard</p>
                    </a>
                @else
                    <a
                        href="{{ route('login') }}"
                        class=" rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20]  dark:hover:text-white/80 dark:focus-visible:ring-white"
                    >
                       <p>Log in</p> 
                    </a>

                    @if (Route::has('register'))
                        <a
                            href="{{ route('register') }}"
                            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20]  dark:hover:text-white/80 dark:focus-visible:ring-white"
                        >
                            <p>Register</p>
                        </a>
                    @endif
                    <a href="legals" class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20]  dark:hover:text-white/80 dark:focus-visible:ring-white"
                    ><p>Legals</p>
                    </a>
                    <a href="about" class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20]  dark:hover:text-white/80 dark:focus-visible:ring-white"
                    ><p>About</p></a>
                @endauth
                
            </nav>
        @endif  
        <p class="text-6xl text-red-800">Blog</p>
    </header>

