<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <link rel="icon" href="{{asset("image/logo.png")}}" type="image/x-icon">
    <title>PLAYED</title>
</head> 
<body class="bg-secondary">
    {{-- <div> --}}
        <x-navbar/>
    {{-- </div> --}}

    <main class="container md:px-12 lg:px-24 mx-auto">

        <section id="home-section" class="flex flex-col md:flex-row gap-6 my-28 md:justify-center md:my-0 md:h-[90vh]">           
                <div class="flex w-full lg:w-[70%] mx-auto flex-col gap-5 justify-center items-center lg:items-start text-white order-2 px-4 lg:order-1">
                    <h1 class="font-permanentMarker font-bold text-4xl md:text-5xl xl:text-6xl text-violet-900">PLAYED</h1>
                    <h2 class="font-semibold text-main text-lg sm:text-1xl md:text-2xl">Cara Seru Belajar Bersama Teman Sekelas!</h2>
                    <div class="space-x-3">
                        <a href="register" class="uppercase inline-block bg-main rounded-md text-sm py-3 px-6 font-semibold">Daftar</a> 
                        <a href="/login" class="uppercase inline-block border bg-neutral-200 text-violet-600 rounded-md text-sm py-3 px-6 font-semibold">Masuk</a>
                    </div>
                </div>

                <div class="w-full lg:w-[40%] flex justify-center items-center order-1 md:order-2 -mt-14 lg:mt-0">
                    <img class="w-60 md:w-96 object-contain" src="{{asset("image/student-board.png")}}" alt="image">
                </div>
        </section>

        <section class="mb-28 md:mb-36" id="about-section">
            <div class="grid grid-rows-1 md:grid-rows-2 text-white">
                <div class="pb-16 relative -z-10" data-aos="fade-up">
                    <div class="text-center px-16">
                        <h1 class="font-bold text-4xl text-bgMain md:text-6xl mb-20">Tentang</h1>
                        <h2 class="text-6xl text-neutral-800 md:text-8xl font-extrabold opacity-5 absolute top-5 -translate-x-1/2 left-1/2">Tentang</h2>
                        <p class="text-neutral-200"><b>PLAYED</b> merupakan e-learning berbasis gamifikasi dengan forum diskusi untuk menunjang kegiatan pembelajaran secara daring</p>
                    </div>
                </div>
                <div class="-z-10 grid grid-cols-1 md:grid-cols-2 px-8 space-x-0 md:space-x-4 space-y-3 md:space-y-0">
                    <div class="bg-main shadow-md px-4 py-8 rounded-lg" data-aos="fade-up">
                        <div class="text-center">
                            <img class="mx-auto aspect-square object-contain h-8 sm:h-12 md:h-14" src="{{asset("img/game.png")}}" alt="game-image">
                            <h2 class="mt-6 text-2xl text-main font-semibold">Gamifikasi</h2>
                            <p class="mt-6 text-secondary">Dapatkan pengalaman belajar kamu seperti layaknya bermain game</p>
                        </div>
                    </div>
                    <div class="bg-main shadow-md px-4 py-8 rounded-lg" data-aos="fade-up">
                        <div class="text-center">
                            <img class="mx-auto aspect-square object-contain h-8 sm:h-12 md:h-14" src="{{asset("img/code.png")}}" alt="game-image">
                            <h2 class="mt-6 text-2xl text-main font-semibold">Quiz Interakif</h2>
                            <p class="mt-6 text-secondary">Uji hasil belajar kamu dengan quiz pilihan ganda</p>
                        </div>
                    </div>
                    {{-- <div class="bg-main shadow-md px-4 py-8 rounded-lg" data-aos="fade-up">
                        <div class="text-center">
                            <img class="mx-auto aspect-square object-contain h-8 sm:h-12 md:h-14" src="{{asset("img/forum.png")}}" alt="game-image">
                            <h2 class="mt-6 text-2xl text-main font-semibold">Diskusi</h2>
                            <p class="mt-6 text-secondary">Lakukan Diskusi bersama guru dan teman sekelas</p>
                        </div>
                    </div> --}}
                </div>
            </div>
        </section>

        <section class="text-white mb-28 md:mb-36" id="feature-section">
            <div class="pb-5 relative -z-10" data-aos="fade-up">
                <div class="text-center px-16">
                    <h1 class="text-main font-bold text-4xl md:text-6xl mb-20">Fitur</h1>
                    <h2 class="text-neutral-800 text-6xl md:text-8xl font-extrabold opacity-5 absolute top-5 -translate-x-1/2 left-1/2">Fitur</h2>
                </div>
            </div>
            <div class="grid px-8 grid-cols-1 md:grid-cols-3 gap-4">
                <div class="text-center px-2 py-3 bg-main shadow-sm hover:bg-hover transition-colors duration-300 hover-fitur" data-aos="fade-up">
                        <h3 class="text-main mb-3 uppercase font-medium text-xs sm:text-sm lg:text-base">Akses Materi 24/7</h3>
                        <span class="block h-[0.0625rem] mx-auto w-10 bg-line"></span>
                    </div>
                <div class="text-center px-2 py-3 bg-main shadow-sm hover:bg-hover transition-colors duration-300 hover-fitur" data-aos="fade-up">
                        <h3 class="text-main mb-3 uppercase font-medium text-xs sm:text-sm lg:text-base ">Kerjakan Quiz</h3>
                        <span class="block h-[0.0625rem] mx-auto w-10 bg-line"></span>
                    </div>
                <div class="text-center px-2 py-3 bg-main shadow-sm hover:bg-hover transition-colors duration-300 hover-fitur" data-aos="fade-up">
                        <h3 class="text-main mb-3 uppercase font-medium text-xs sm:text-sm lg:text-base ">Forum Diskusi</h3>
                        <span class="block h-[0.0625rem] mx-auto w-10 bg-line"></span>
                    </div>
                <div class="text-center px-2 py-3 bg-main shadow-sm hover:bg-hover transition-colors duration-300 hover-fitur" data-aos="fade-up">
                        <h3 class="text-main mb-3 uppercase font-medium text-xs sm:text-sm lg:text-base ">Kerjakan Test</h3>
                        <span class="block h-[0.0625rem] mx-auto w-10 bg-line"></span>
                    </div>
                <div class="text-center px-2 py-3 bg-main shadow-sm hover:bg-hover transition-colors duration-300 hover-fitur" data-aos="fade-up">
                        <h3 class="text-main mb-3 uppercase font-medium text-xs sm:text-sm lg:text-base ">Naikkan Level</h3>
                        <span class="block h-[0.0625rem] mx-auto w-10 bg-line"></span>
                    </div>
                <div class="text-center px-2 py-3 bg-main shadow-sm hover:bg-hover transition-colors duration-300 hover-fitur" data-aos="fade-up">
                        <h3 class="text-main mb-3 uppercase font-medium text-xs sm:text-sm lg:text-base ">Dapatkan Reward</h3>
                        <span class="block h-[0.0625rem] mx-auto w-10 bg-line"></span>
                    </div>
                <div class="text-center px-2 py-3 bg-main shadow-sm hover:bg-hover transition-colors duration-300 hover-fitur" data-aos="fade-up">
                        <h3 class="text-main mb-3 uppercase font-medium text-xs sm:text-sm lg:text-base ">Leaderboard</h3>
                        <span class="block h-[0.0625rem] mx-auto w-10 bg-line"></span>
                    </div>
                <div class="text-center px-2 py-3 bg-main shadow-sm hover:bg-hover transition-colors duration-300 hover-fitur" data-aos="fade-up">
                        <h3 class="text-main mb-3 uppercase font-medium text-xs sm:text-sm lg:text-base ">Avatar Unik</h3>
                        <span class="block h-[0.0625rem] mx-auto w-10 bg-line"></span>
                    </div>
                <div class="text-center px-2 py-3 bg-main shadow-sm hover:bg-hover transition-colors duration-300 hover-fitur" data-aos="fade-up">
                        <h3 class="text-main mb-3 uppercase font-medium text-xs sm:text-sm lg:text-base ">Manajemen Kelas (Guru)</h3>
                        <span class="block h-[0.0625rem] mx-auto w-10 bg-line"></span>
                    </div>
                <div class="text-center px-2 py-3 bg-main shadow-sm hover:bg-hover transition-colors duration-300 hover-fitur" data-aos="fade-up">
                        <h3 class="text-main mb-3 uppercase font-medium text-xs sm:text-sm lg:text-base ">Kelola Materi dan Quiz (Guru)</h3>
                        <span class="block h-[0.0625rem] mx-auto w-10 bg-line"></span>
                    </div>
                <div class="text-center px-2 py-3 bg-main shadow-sm hover:bg-hover transition-colors duration-300 hover-fitur" data-aos="fade-up">
                        <h3 class="text-main mb-3 uppercase font-medium text-xs sm:text-sm lg:text-base ">Akses Rekap Nilai (Guru)</h3>
                        <span class="block h-[0.0625rem] mx-auto w-10 bg-line"></span>
                    </div>
                <div class="text-center px-2 py-3 bg-main shadow-sm hover:bg-hover transition-colors duration-300 hover-fitur" data-aos="fade-up">
                        <h3 class="text-main mb-3 uppercase font-medium text-xs sm:text-sm lg:text-base ">Forum Diskusi (Guru)</h3>
                        <span class="block h-[0.0625rem] mx-auto w-10 bg-line"></span>
                    </div>
            </div>
        </section>
    </main>

    <footer class="text-secondary h-72 bg-main shadow-sm w-full flex items-center justify-center text-xs sm:text-sm">
            <p>
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                Copyright &copy;<script>
                    document.write(new Date().getFullYear());
                </script> All rights reserved | PLAYED Team
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>
    </footer>

    @vite('resources/js/app.js')
</body>
</html>