<x-student-layout title="kelas">
    <x-breadcrumbs :breadcrumbs="$breadcrumbs"/>
    <x-student-sub-nav
        missionPath="/student/class/{{$class->id}}"
        leaderboardPath="/student/{{$class->id}}/leaderboard"
        activityPath="/student/{{$class->id}}/activity"
        informationPath="/student/{{$class->id}}/information"
    />
    <div class="flex flex-col sm:flex-row gap-6 my-6">
        <div class="w-full sm:w-[62%] md:w-[70%]">
            @foreach ($lessons as $lesson)
                <div class="mb-2">
                    <a 
                        id="lesson" 
                        data-lesson-id="{{$lesson->id}}"
                        class="flex shadow-md items-center justify-between bg-main hover:bg-violet-700 rounded-xl py-3 px-5 cursor-pointer"
                    >
                        <h3 class="text-base font-medium text-main">{{$lesson->name}}</h3>
                        <img class="w-6 duration-300 ease-in-out" src="{{asset("img/arrow.png")}}" alt="arrow">
                    </a>
                    <div id="content{{$lesson->id}}" class="hidden ease-in-out bg-main shadow-md pt-3 pb-4 px-5 rounded-b-xl">
                        @foreach ($lesson->subjects as $subject)
                            <a href="/student/lesson/{{$lesson->id}}/subject/{{$subject->id}}" class=" flex items-center justify-between border-b border-main py-3">
                                <h4 class="text-main text-sm font-medium">
                                    {{$subject->title}}
                                </h4>
                                <img class="w-6" src="{{asset("img/arrow.png")}}" alt="arrow">
                            </a>
                        @endforeach
                        {{-- Quiz --}}
                        @foreach ($lesson->tasks->where("type", "1") as $quiz)
                            <a href="/student/{{$class->id}}/{{$lesson->id}}/quiz/{{$quiz->id}}" class="flex items-center justify-between border-b border-main py-3">
                                <h4 class="text-main text-sm font-medium">
                                    {{$quiz->title}}
                                </h4>
                                <img class="w-6" src="{{asset("img/arrow.png")}}" alt="arrow">
                            </a>
                        @endforeach
                        {{-- Test Quiz --}}
                        @foreach ($lesson->tasks->where("type", "2") as $test)
                            <a href="/student/{{$class->id}}/{{$lesson->id}}/quiz/{{$test->id}}" class="flex items-center justify-between border-b border-main py-3">
                                <h4 class="text-main text-sm font-medium">
                                    {{$test->title}}
                                </h4>
                                <img class="w-6" src="{{asset("img/arrow.png")}}" alt="arrow">
                            </a>
                        @endforeach

                        @foreach ($lesson->tasks->where("type", "3") as $essay)
                            <a href="/student/{{$class->id}}/{{$lesson->id}}/essay/{{$essay->id}}" class="flex items-center justify-between border-b border-main py-3">
                                <h4 class="text-main text-sm font-medium">
                                    {{$essay->title}}
                                </h4>
                                <img class="w-6" src="{{asset("img/arrow.png")}}" alt="arrow">
                            </a>
                        @endforeach

                        @foreach ($lesson->tasks->where("type", "4") as $upload)
                            <a href="/student/{{$class->id}}/{{$lesson->id}}/upload/{{$upload->id}}" class="flex items-center justify-between border-b border-main py-3">
                                <h4 class="text-main text-sm font-medium">
                                    {{$upload->title}}
                                </h4>
                                <img class="w-6" src="{{asset("img/arrow.png")}}" alt="arrow">
                            </a>
                        @endforeach 
                    
                        @foreach ($lesson->tasks->where("type", "5") as $game)
                            <a href="/student/{{$class->id}}/{{$lesson->id}}/game/{{$game->id}}" class="flex items-center justify-between border-b border-main py-3">
                                <h4 class="text-main text-sm font-medium">
                                    {{$game->title}}
                                </h4>
                                <img class="w-6" src="{{asset("img/arrow.png")}}" alt="arrow">
                            </a>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
        <div class="w-full sm:w-[38%] md:w-[30%] flex gap-6 flex-col">
            <div class="bg-main shadow-md p-3 rounded-xl text-center">
                <input type="hidden" id="completed_mission" value="{{$completed_mission}}">
                <input type="hidden" id="ongoing_mission" value="{{$ongoing_mission}}">
                <input type="hidden" id="total_mission" value="{{$total_mission}}">
                <h3 class="mb-4 font-medium text-main">Tantangan</h3>
                <canvas id="myChart" class="canvas mx-auto"></canvas>
            </div>
            <div class="bg-main shadow-md px-3 pt-5 pb-2 rounded-xl">
                <div class="flex justify-evenly mb-4">
                    <div class="text-center">
                        <h4 class="font-medium text-main text-base">Skor</h4>
                        <p class="text-link font-semibold text-lg">{{$xp}}</p> 
                    </div>
                    <div class="text-center">
                        <h4 class="font-medium text-main text-base">Total XP</h4>
                        <p class="text-link font-semibold text-lg">{{$total_xp}}</p>
                    </div>
                    <div class="text-center">
                        <h4 class="font-medium text-main text-base">Level</h4>
                        <p class="text-link font-semibold text-lg">{{$level}}</p>
                    </div>
                </div> 
                <img class="w-[45%] sm:w-[58%] mx-auto mb-4" src="{{asset("img/character/$level.png")}}" alt="character">
                <h4 class="bg-focus text-main text-center p-2 text-lg font-medium">{{$emblem}}</h4>
                <div class="flex justify-center px-5 gap-2 py-4">
                    @if($total_xp > 500)
                        <img class="w-12 aspect-square" src="{{asset("image/badge/1.png")}}" alt="badge">
                    @else
                        <img class="w-12 aspect-square" src="{{asset("image/badge/1-gs.png")}}" alt="badge">
                    @endif

                    @if($total_xp > 1000)
                        <img class="w-12 aspect-square" src="{{asset("image/badge/2.png")}}" alt="badge">
                    @else
                        <img class="w-12 aspect-square" src="{{asset("image/badge/2-gs.png")}}" alt="badge">
                    @endif

                    @if($total_xp > 2000)
                        <img class="w-12 aspect-square" src="{{asset("image/badge/3.png")}}" alt="badge">
                    @else
                        <img class="w-12 aspect-square" src="{{asset("image/badge/3-gs.png")}}" alt="badge">
                    @endif

                    @if($total_xp > 4000)
                        <img class="w-12 aspect-square" src="{{asset("image/badge/4.png")}}" alt="badge">
                    @else
                        <img class="w-12 aspect-square" src="{{asset("image/badge/4-gs.png")}}" alt="badge">
                    @endif

                    @if($total_xp > 8000)
                        <img class="w-12 aspect-square" src="{{asset("image/badge/5.png")}}" alt="badge">
                    @else
                        <img class="w-12 aspect-square" src="{{asset("image/badge/5-gs.png")}}" alt="badge">
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-student-layout>