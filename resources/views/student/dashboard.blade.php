<x-student-layout title="Dashboard">
    <div class="flex flex-col md:flex-row gap-8 mb-0 md:mb-8 mt-14 md:mt-0">
        <div class="flex gap-4 mx-auto md:mx-0 bg-main shadow-md rounded-xl w-full md:w-[70%] md:min-w-[298.73px] duration-600 ease-in-out">
            <div class="w-3/5 flex flex-col">
                <div class="px-5 pt-5 mb-3">
                    <h3 class="uppercase text-xl text-main font-medium">{{$user->name}}</h3>
                    <h3 class="uppercase text-3xl font-semibold text-secondary">{{$emblem}}</h3>
                </div>
                <span class="block h-[0.0625rem] mx-auto w-[90%] bg-line"></span>
                <div class="flex p-5 h-24">
                    <div class="h-16 w-1/2">
                        <p class="text-sm mb-1 text-main">kelas</p>
                        <p class="text-2xl text-main font-medium">{{$totalClass}}</p>     
                    </div>
                    <div class="h-16 w-1/2">
                        <p class="text-sm mb-1 text-main">tantangan</p>
                        <p class="text-2xl text-main font-medium">{{$ongoing_mission}}/{{$total_mission}}</p>
                    </div>
                </div>
                <span class="block h-[0.0625rem] mx-auto w-[90%] bg-line mb-2"></span>
                <div>   
                    <h4 class="px-5 text-main">Lencana</h4>
                    <div class="flex p-4 gap-2">
                        <div class="relative flex items-center">
                            <div class="tooltip absolute hidden bg-white rounded-xl w-56 -top-24 -left-20 z-50">
                                <div class="bg-neutral-200 rounded-t-xl px-4 py-2">
                                    <h2 class="text-sm text-neutral-500 font-semibold">Lencana Pemula</h2>
                                </div>
                                <p class="text-neutral-500 bg-neutral-100 text-xs px-4 py-2">Raih 500XP untuk mendapatkan lencana PEMULA</p>
                            </div>
                            @if($total_xp > 500)
                                <img id="item" class="w-14 sm:w-16 aspect-square" src="{{asset("image/badge/1.png")}}" alt="badge">
                            @else
                                <img id="item" class="w-14 sm:w-16 aspect-square" src="{{asset("image/badge/1-gs.png")}}" alt="badge">
                            @endif
                        </div>
                        <div class="relative flex items-center">
                            <div class="tooltip absolute hidden bg-white rounded-xl w-56 -top-24 -left-20 z-50">
                                <div class="bg-neutral-200 rounded-t-xl px-4 py-2">
                                    <h2 class="text-sm text-neutral-500 font-semibold">Lencana Petuala</h2>
                                </div>
                                <p class="text-neutral-500 bg-neutral-100 text-xs px-4 py-2">Raih 1000XP untuk mendapatkan lencana PETUALANG</p>
                            </div>
                            @if($total_xp > 1000)
                                <img id="item" class="w-14 sm:w-16 aspect-square" src="{{asset("image/badge/2.png")}}" alt="badge">
                            @else
                                <img id="item" class="w-14 sm:w-16 aspect-square" src="{{asset("image/badge/2-gs.png")}}" alt="badge">
                            @endif
                        </div>
                        <div class="relative flex items-center">
                            <div class="tooltip absolute hidden bg-white rounded-xl w-56 -top-24 -left-20 z-50">
                                <div class="bg-neutral-200 rounded-t-xl px-4 py-2">
                                    <h2 class="text-sm text-neutral-500 font-semibold">Lencana Pejuang</h2>
                                </div>
                                <p class="text-neutral-500 bg-neutral-100 text-xs px-4 py-2">Raih 2000XP untuk mendapatkan lencana PEJUANG</p>
                            </div>
                            @if($total_xp > 2000)
                                <img id="item" class="w-14 sm:w-16 aspect-square" src="{{asset("image/badge/3.png")}}" alt="badge">
                            @else
                                <img id="item" class="w-14 sm:w-16 aspect-square" src="{{asset("image/badge/3-gs.png")}}" alt="badge">
                            @endif
                        </div>
                        <div class="relative flex items-center">
                            <div class="tooltip absolute hidden bg-white rounded-xl w-56 -top-24 -left-20 z-50">
                                <div class="bg-neutral-200 rounded-t-xl px-4 py-2">
                                    <h2 class="text-sm text-neutral-500 font-semibold">Lencana Petarung</h2>
                                </div>
                                <p class="text-neutral-500 bg-neutral-100 text-xs px-4 py-2">Raih 4000XP untuk mendapatkan lencana PETARUNG</p>
                            </div>
                            @if($total_xp > 4000)
                                <img id="item" class="w-14 sm:w-16 aspect-square" src="{{asset("image/badge/4.png")}}" alt="badge">
                            @else
                                <img id="item" class="w-14 sm:w-16 aspect-square" src="{{asset("image/badge/4-gs.png")}}" alt="badge">   
                            @endif
                        </div>
                        <div class="relative flex items-center">
                            <div class="tooltip absolute hidden bg-white rounded-xl w-56 -top-24 -left-20 z-50">
                                <div class="bg-neutral-200 rounded-t-xl px-4 py-2">
                                    <h2 class="text-sm text-neutral-500 font-semibold">Lencana Master</h2>
                                </div>
                                <p class="text-neutral-500 bg-neutral-100 text-xs px-4 py-2">Raih 8000XP untuk mendapatkan lencana MASTER</p>
                            </div>
                            @if($total_xp > 8000)
                                <img id="item" class="w-14 sm:w-16 aspect-square" src="{{asset("image/badge/5.png")}}" alt="badge">
                            @else
                                <img id="item" class="w-14 sm:w-16 aspect-square" src="{{asset("image/badge/5-gs.png")}}" alt="badge">
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-[30%]">
                <img class="h-full object-contain mt-0 sm:-mt-10 mx-auto" src="{{asset("img/character/$level.png")}}" alt="character">
            </div>
            
        </div>
        <div class="h-1/2 w-full md:w-[30%]">
            <div class="flex flex-col justify-center lg:justify-normal gap-4 md:gap-6 w-full ">
                <div class="bg-main shadow-md p-5 rounded-xl sm:min-w-[180px] lg:min-w-[140px] xl:min-w-[180px] w-full h-[9.5rem]">
                    <div class="flex items-center gap-2 mb-5">
                        <i class="fas fa-dot-circle text-link text-sm"></i>
                        <h3 class="text-sm text-main uppercase font-bold">total xp</h3>
                    </div>
                    <p class="text-3xl text-main font-semibold text-center">{{$total_xp}}</p>
                </div>
                <div class="bg-main shadow-md p-5 rounded-xl sm:min-w-[180px] lg:min-w-[140px] xl:min-w-[180px] w-full h-[9.5rem]">
                    <div class="flex items-center gap-2 mb-5">
                        <i class="fas fa-dot-circle text-link text-sm"></i>
                        <h3 class="text-sm text-main uppercase font-bold">level</h3>
                    </div>
                    <p class="text-3xl text-main font-semibold text-center">{{$level}}</p>
                </div>
            </div>
        </div>
    </div>
    <div>
        <h3 class="font-semibold my-4 text-main">Kelas Terbaru</h3>
        <div class="mb-4 flex flex-col sm:flex-row gap-3">
            @foreach ($classes as $class )
                <a href="/student/class/{{$class->id}}" class="flex bg-main shadow-md p-4 rounded-lg items-center gap-4 w-full sm:w-3/5 md:w-1/3">
                    <img class="ratio-16x9 h-10 rounded-md" src="{{asset("logo_class/$class->logo_class")}}" alt="class image">
                    <h3 class="text-main text-sm lg:text-base font-semibold">{{$class->study_name}}</h3>
                </a>
            @endforeach
        </div> 
        <a href="/student/class" class="w-full md:w-auto inline-block uppercase bg-button text-main rounded-md px-4 py-3 font-semibold text-xs mb-6">LIHAT SEMUA KELAS</a>
    </div>
</x-student-layout>