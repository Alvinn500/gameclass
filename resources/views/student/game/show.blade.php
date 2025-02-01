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
                    <div class="w-[60%] space-y-2">
                        <h1 class="text-white uppercase text-5xl font-bold">Memory Game</h1>
                        @if($game === null)
                            {{-- <p class="text-red-500 text-sm font-semibold">Game belum di buat</p> --}}
                            <p class="text-white font-semibold">Game belum di buat Balik ke <a href="/student/class/{{$class->id}}" class="text-lime-500 font-semibold">kelas</a></p>
                        @endif
                        <div class="space-y-3 space-x-1">
                            <button {{$game == null ? 'disabled' : ''}} id="startGame" class="uppercase hover:scale-105 shadow-md duration-300 ease-in-out px-4 text-sm py-3 rounded-md text-white bg-violet-800 font-semibold" onclick="hideshow('start', 'game')">Mulai</button>
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
                <div id="game" style="display: none" class="flex flex-col gap-4 mx-6 relative">
                    <div class="sticky top-0 left-0 w-full">
                        <div class="bg-semiblack relative flex justify-between items-center px-3 py-2 mt-1 rounded-md">
                            <div>
                                <img id="humburger-dashboard" class="w-6 cursor-pointer block lg:hidden" src="{{asset("image/open-sidebar.png")}}" alt="icon open sidebar">
                                <h1 class="text-white font-semibold">{{$task->title}}</h1>
                            </div>
                            <div class="flex gap-2 ml-0 lg:ml-auto">
                                <p class="bg-[#ffffff0e] p-2 rounded-md text-lime-500 text-sm font-semibold">Time: <span id="gameTime" class="text-white">{{$game->time}}</span></p>
                                <p class="bg-[#ffffff0e] p-2 rounded-md text-lime-500 text-sm font-semibold">Reward: <span id="gameXP" class="text-white">0 XP</span></p>
                            </div>
                        </div>
                    </div>
                    <div id="gameCard" class="container memory-game grid grid-cols-4 gap-5 mx-auto">
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
                    <div id="gameQuestion" class="hidden">
                        <form id="gameForm" action="" method="POST">
                            @csrf
                            <div class="grid grid-cols-2 gap-6">
                                <input type="hidden" name="game_id" value="{{$game->id}}">
                                <input type="hidden" name="gameXP" value="" id="sendGameXP">
                                @foreach (array_slice($game->images , 0, 6) as $key => $image)
                                    <div class="space-y-4">
                                        <div class="w-[50%] mx-auto flex justify-center items-center bg-neutral-800 p-8 rounded-lg">
                                            <img class="w-[60%] rounded-lg" src="{{asset($image)}}" alt="question image">
                                        </div>
                                        <p class="text-white font-medium text-center">{{$game->questions[$key]}}</p>
                                        <textarea name="{{$key}}" placeholder="Jawab disini" class="w-full text-sm focus:outline-none resize-none rounded-md bg-neutral-900 text-white p-4 min-h-40"></textarea>
                                    </div>  
                               @endforeach
                            </div>
                            <button class="w-full bg-yellow-400 text-secondary font-bold rounded-md py-2 my-6" type="submit">Submit</button>
                        </form>
                    </div>
                </div>
            @endif
            @if($game && $game->answers->where('user_id', Auth::user()->id)->count() > 0)
                <div class="mx-6">
                    <x-breadcrumbs :breadcrumbs="$breadcrumbs"/>
                    <div class="flex flex-col sm:flex-row rounded-xl pb-8 sm:pb-0 bg-neutral-900">
                        <div class="w-[85%] mx-auto sm:mx-0 sm:w-[40%]">
                            <img class="w-full mx-auto" src="{{asset("img/vector/Grades-cuate.svg")}}" alt="image">
                        </div>
                        <div class="w-full sm:w-[60%] p-4 sm:pr-2 lg:pr-4 flex flex-col justify-center items-center sm:items-start gap-4">
                            <h1 class="font-bold text-center text-white sm:text-left text-lg sm:text-xl md:text-2xl lg:text-3xl">{{$task->type === 1 ? $task->title : "Kamu sudah mengerjakan soal tes $task->title"}}</h1>
                            <p class="text-sm sm:text-base text-white font-semibold">kamu mendapatkan reward {{$task->memoryGameScores->first()->XP}} XP</p>
                            <div>
                                <div class="bg-yellow-400 inline-block text-center py-5 px-16 sm:px-20 md:px-24 lg:px-28 md:space-y-3 lg:space-y-4">
                                    <h2 class="font-bold text-2xl text-black">Nilaimu</h2>
                                    <h3 class="font-bold text-3xl md:text-4xl lg:text-5xl text-black">{{$task->memoryGameScores->first()->score}}</h3>
                                </div>
                            </div>
                            @if($task->memoryGameScores->first()->status === 0)
                                <p class="text-sm text-center font-semibold sm:text-left text-lime-500">Jawabanmu belum dikoreksi, jadi ada kemungkinan nilaimu akan bertambah</p>
                            @endif
                        </div>
                    </div>
                    <h2 class="font-bold text-xl md:text-2xl my-4 uppercase text-white">Jawaban kamu</h2>
                    <div class="flex flex-col gap-5">
                        @foreach (array_slice($game->images, 0, 6) as $key => $image)
                            <div class="p-4 dark-blue rounded-xl space-y-4">
                                <p class="text-yellow-500 uppercase text-sm">pertanyaan no {{$loop->iteration}}</p>
                                <div class="w-[35%] flex justify-center items-center bg-neutral-800 p-8 rounded-lg">
                                    <img class="w-[60%] rounded-lg" src="{{asset("$image")}}" alt="image memory game {{$key}}">
                                </div>
                                <h3 class="text-sm text-white font-semibold">{{$game->questions[$key]}}</h3>
                                <div class="bg-secondary p-4">
                                    <p class="text-gray-400">{{$game->answers->where('user_id', Auth::user()->id)->first()->answers[$key]}}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
            {{-- @if($gameImages == null)
                <div class="flex justify-center items-center h-screen">
                    <p class="text-white font-semibold">Game belum di buat Balik ke <a href="/student/class/{{$class->id}}" class="text-lime-500 font-semibold">kelas</a></p>
                </div>
            @endif --}}
        </div>
        </main>
        @vite('resources/js/main.js')
</x-layout>