<x-student-layout title="Dashboard">
    <div class="md:flex grid grid-rows-2 gap-8 mb-0 md:mb-8 mt-14 md:mt-0">
        <div class="flex mx-auto md:mx-0 dark-purple rounded-xl w-full md:w-3/5 md:min-w-[298.73px] duration-600 ease-in-out">
            <div class="w-3/5">
                <div class="px-5 pt-5 mb-3">
                    <h3 class="uppercase text-xl font-medium">student</h3>
                    <h3 class="uppercase text-3xl font-semibold text-yellow-400">pemula</h3>
                </div>
                <span class="block h-[0.0625rem] mx-auto w-[90%] bg-gray-600"></span>
                <div class="flex p-5 h-24">
                    <div class="h-16 w-1/2">
                        <p class="text-sm mb-1">kelas</p>
                        <p class="text-2xl font-medium">5</p>     
                    </div>
                    <div class="h-16 w-1/2">
                        <p class="text-sm mb-1">tantangan</p>
                        <p class="text-2xl font-medium">8/16</p>
                    </div>
                </div>
                <span class="block h-[0.0625rem] mx-auto w-[90%] bg-gray-600 mb-2"></span>
                <h4 class="px-5">Lencana</h4>
                <div class="flex px-5 gap-2 py-4">
                    <img class="w-[16%] md:w-[14%] aspect-square" src="{{asset("img/badge/1-gs.png")}}" alt="badge">
                    <img class="w-[16%] md:w-[14%] aspect-square" src="{{asset("img/badge/2-gs.png")}}" alt="badge">
                    <img class="w-[16%] md:w-[14%] aspect-square" src="{{asset("img/badge/3-gs.png")}}" alt="badge">
                    <img class="w-[16%] md:w-[14%] aspect-square" src="{{asset("img/badge/4-gs.png")}}" alt="badge">
                    <img class="w-[16%] md:w-[14%] aspect-square" src="{{asset("img/badge/5-gs.png")}}" alt="badge">
                </div>
            </div>
            <div class="w-2/5">
                <img class="w-full -mt-10 mx-auto" src="{{asset("img/character/2.png")}}" alt="character">
            </div>
            
        </div>
        <div class="flex md:flex-wrap justify-center lg:justify-normal gap-4 md:gap-6 w-full md:w-2/5">
            <div class="dark-green p-5 rounded-xl md:min-w-[165px] w-1/3 h-32">
                <h3 class="text-sm md:text-base uppercase mb-4 md:mb-2">total xp</h3>
                <p class="text-2xl md:text-3xl font-medium text-center">500</p>
            </div>
            <div class="dark-green p-5 rounded-xl md:min-w-[165px] w-1/3 h-32">
                <h3 class="text-sm md:text-base uppercase mb-4 md:mb-2">level</h3>
                <p class="text-2xl md:text-3xl font-medium text-center">1</p>
            </div>
            <div class="mx-auto md:mx-0 bg-main p-2 md:p-4 rounded-xl md:min-w-[165px] w-1/3 h-32">
                <div class="gradient-diskusi w-full h-full rounded-lg pt-6 pl-3">
                    <h3 class="text-sm md:text-base mb-2 md:mb-4 font-semibold">Forum Diskusi</h3>
                    <p class="text-xs md:text-sm font-normal md:font-medium">Jelajahi Forum</p>
                </div>
            </div>
        </div>
    </div>
    <div class="-mt-32 md:-mt-0">
        <h3 class="font-semibold mb-4">Kelas Terbaru</h3>
        <div class="mb-4">
            <div class="flex bg-main p-4 rounded-lg items-center gap-4 w-full sm:w-1/2 md:w-1/3">
                <img class="ratio-16x9 h-10 rounded-md" src="{{asset("img/luluu.jpg")}}" alt="class image">
                <h3>kelas</h3>
            </div>
        </div> 
        <button class="w-full md:w-auto  uppercase bg-yellow-500 text-black rounded-md px-4 py-3 font-semibold text-xs mb-6">LIHAT SEMUA KELAS</button>
    </div>
</x-student-layout>