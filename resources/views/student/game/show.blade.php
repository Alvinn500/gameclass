<x-layout title="game">
    <main>
        <div> 
            <x-sidebar dashboardUrl="student" discussioniUrl="student/discussion" classUrl="student/class" profileSettingUrl="profile"/>
        </div>
        <div class="m-0 lg:ml-64 pt-3">
            <div id="start">
                <div class="bg-semiblack mx-4 relative flex lg:hidden items-center mb-2 p-2 rounded-lg">                
                    <img id="openSidebar" class="w-6 cursor-pointer block lg:hidden" src="{{asset("image/open-sidebar.png")}}" alt="">
                </div>
                <div class="flex justify-center items-center dark-green mx-4 rounded-lg h-[87.5vh] lg:h-[96vh]">
                    <div class="w-[40%]">
                        <img class="w-72 mx-auto" src="{{asset("image/memory-game.png")}}" alt="">
                    </div>
                    <div class="w-[60%]">
                        <h1 class="text-white uppercase text-5xl font-bold">Memory Game</h1>
                        <div class="space-y-3 space-x-1">
                            <button class="uppercase hover:scale-105 shadow-md duration-300 ease-in-out px-4 text-sm py-3 rounded-md text-white bg-violet-800 font-semibold" onclick="hideshow('start', 'game')">Mulai</button>
                            <button id="tutorialButton" class="uppercase hover:scale-105 shadow-md duration-300 ease-in-out px-4 text-sm py-3 rounded-md text-white bg-yellow-500 font-semibold">Tutorial</button>
                        </div>
                    </div>
                </div>
            </div>
            <div id="gameOverlay" class="hidden justify-center items-center bg-main bg-opacity-75 absolute top-0 left-0 w-full h-full z-50">
                <div id="gameModal" class="rounded-lg shadow-sm w-96">
                    <div class="modalGradient rounded-t-lg px-4 pt-4">
                        {{-- <img id="closeGameModal" class="cursor-pointer h-5 ml-auto pr-2 mb-2" src="/image/close.png" alt="close icon"> --}}
                        <img class="h-52 mx-auto" id="modalImage" class="rounded-lg" src="" alt="tutor gama image 1">
                    </div>
                    <div class="bg-neutral-900 p-4 rounded-b-lg">
                        <div class="text-center mb-6">
                            <h2 id="modalTitle" class="text-white font-semibold mb-2"></h2>
                            <p id="modalDescription" class="text-white"></p>
                        </div>
                        <div class="flex justify-around items-center">
                            <button id="prevButton" class="text-white shadow-md hover:scale-105 text-sm bg-violet-800 rounded-md px-5 py-2.5 uppercase font-semibold">Kembali</button>
                            <button id="nextButton" class="text-white shadow-md hover:scale-105 text-sm bg-yellow-500 rounded-md px-5 py-2.5 uppercase font-semibold">Lanjut</button>
                        </div>
                    </div>
                </div>
            </div>
            @if($gameImages != null)
                <div id="game" style="display: none" class="flex flex-col gap-4 mx-6">
                    <div class="bg-semiblack relative flex justify-between items-center p-2 rounded-lg">
                        <div>
                            <img id="humburger-dashboard" class="w-6 cursor-pointer block lg:hidden" src="{{asset("image/open-sidebar.png")}}" alt="">
                            <h1 class="text-white font-semibold">{{$task->title}}</h1>
                        </div>
                        <div class="flex gap-2 ml-0 lg:ml-auto">
                            <p class="bg-[#ffffff0e] px-2 py-1 rounded-md text-lime-500 text-sm font-semibold">Time: <span class="text-white">1:30</span></p>
                            <p class="bg-[#ffffff0e] px-2 py-1 rounded-md text-lime-500 text-sm font-semibold">Reward: <span id="gameScore" class="text-white">0 XP</span></p>
                        </div>
                    </div>
                    <div class="container memory-game grid grid-cols-4 gap-5 mx-auto">
                        @for ($i = 0; $i < count($gameImages); $i++)
                            <div id="{{$i}}" data-game="{{pathinfo($gameImages[$i], PATHINFO_FILENAME)}}" class="memory-card h-36 relative cursor-pointer">
                                <div class="back-face absolute top-0 left-0 bg-main h-full w-full rounded-lg flex gap-2 items-center justify-center">
                                    <img class="h-5" src="{{asset('image/logo.png')}}" alt="logo">
                                    <h2 class="uppercase text-white font-semibold">played</h2>
                                </div>
                                <div class="front-face flex justify-center items-center absolute bg-neutral-900 rounded-lg w-full h-full">
                                    <img class="h-[80%] rounded-sm object-cover object-center" src="{{asset($gameImages[$i])}}" alt="">
                                </div>
                            </div>
                        @endfor
                    </div>
                </div>
            @endif
            @if($gameImages == null)
                <div class="flex justify-center items-center h-80">
                    <p>Game belum di buat Balik ke <a href="/student/class/{{$class->id}}" class="text-lime-500 font-semibold">kelas</a></p>
                </div>
            @endif
        </div>
        </main>
        @vite('resources/js/main.js')
</x-layout>