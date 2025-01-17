    <header class="sticky top-0 bg-secondary z-50">
        <nav class="container md:px-12 lg:px-24 mx-auto relative">
            <div class="flex pl-4 py-6 justify-between">
                <a href="/" class="flex justify-center items-center gap-2">
                    <img src="{{asset("image/logo.png")}}" alt="logo" class="h-6 ms:h-8">
                    <h1 class="text-white font-permanentMarker text-xl md:text-2xl">PLAYED</h1>
                </a>
                <div class="my-auto">
                    <ul class="space-x-6 hidden md:flex" id="nav">
                        <li class="relative text-white pb-1"><a id="nav-link" href="/#home-section" class=" font-medium md:text-md lg:text-lg">Beranda</a></li>
                        <li class="relative text-white pb-1"><a id="nav-link" href="/#about-section" class=" font-medium md:text-md lg:text-lg">Tentang</a></li>
                        <li class="relative text-white pb-1"><a id="nav-link" href="/#feature-section" class=" font-medium md:text-md lg:text-lg">Fitur</a></li>
                    </ul>
    
                    <div class="flex flex-col space-y-1.5 pr-4 md:hidden cursor-pointer" id="hamburger">
                        <span class="duration-500 ease-in h-[0.187rem] w-9 bg-white inline-block rounded-full"></span>
                        <span class="duration-500 ease-in h-[0.187rem] w-9 bg-white inline-block rounded-full"></span>
                        <span class="duration-500 ease-in h-[0.187rem] w-9 bg-white inline-block rounded-full"></span>
                    </div>
                    
                    <ul id="nav-mobile" class="duration-300 ease-in -translate-x-96 absolute md:hidden left-0 px-4 top-20">
                        <li class="relative text-white pb-1"><a href="#home-section" class=" font-semibold text-lg">Beranda</a></li>
                        <li class="relative text-white pb-1"><a href="#about-section" class=" font-semibold text-lg">Tentang</a></li>
                        <li class="relative text-white pb-1"><a href="#feature-section" class=" font-semibold text-lg">Fitur</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>