<x-student-layout title="kelas">
    <x-breadcrumbs :breadcrumbs="$breadcrumbs"/>
    <x-student-sub-nav
        missionPath="/student/class/{{$class->id}}"
        leaderboardPath="/student/class/{{$class->id}}/leaderboard"
        activityPath="/student/class/{{$class->id}}/activity"
        informationPath="/student/class/{{$class->id}}/information"
    />
    <div class="flex gap-6 mt-6">
        <div class="w-[70%]">
            @foreach ($lessons as $lesson)
                <div class="mb-2">
                    <a 
                        id="lesson" 
                        data-lesson-id="{{$lesson->id}}"
                        class="flex dark-green items-center justify-between bg-main rounded-xl py-3 px-5 cursor-pointer"
                    >
                        <h3 class="text-base font-normal">{{$lesson->name}}</h3>
                        <img class="w-6 duration-300 ease-in-out" src="{{asset("img/arrow.png")}}" alt="arrow">
                    </a>
                    <div id="content{{$lesson->id}}" class="hidden ease-in-out bg-semiblack pt-3 pb-4 px-5 rounded-b-xl">
                        @foreach ($lesson->subjects as $subject)
                            <a href="/student/lesson/1/subject/{{$subject->id}}" class="flex items-center justify-between border-b border-gray-600 py-3">
                                <h4 class="text-sm font-medium">
                                    {{$subject->title}}
                                </h4>
                                <img class="w-6" src="{{asset("img/arrow.png")}}" alt="arrow">
                            </a>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
        <div class="w-[30%] flex gap-6 flex-col">
            <div class="bg-main p-3 rounded-xl text-center">
                <h3 class="mb-4 font-medium">Tantangan</h3>
                <canvas id="myChart" class="canvas mx-auto"></canvas>
            </div>
            <div class="bg-main px-3 pt-5 pb-2 rounded-xl">
                <div class="flex justify-evenly mb-4">
                    <div class="text-center">
                        <h4 class="font-medium text-base">Skor</h4>
                        <p class="text-yellow-400 font-semibold text-lg">{{$score}}</p>
                    </div>
                    <div class="text-center">
                        <h4 class="font-medium text-base">Total XP</h4>
                        <p class="text-yellow-400 font-semibold text-lg">1020</p>
                    </div>
                    <div class="text-center">
                        <h4 class="font-medium text-base">Level</h4>
                        <p class="text-yellow-400 font-semibold text-lg">2</p>
                    </div>
                </div>
                <img class="w-[58%] mx-auto mb-4" src="{{asset("img/character/2.png")}}" alt="character">
                <h4 class="bg-primary text-center p-2 text-lg font-medium">Petualangan</h4>
                <div class="flex justify-center px-5 gap-2 py-4">
                    <img class="w-[16%] md:w-[14%] aspect-square" src="{{asset("img/badge/1-gs.png")}}" alt="badge">
                    <img class="w-[16%] md:w-[14%] aspect-square" src="{{asset("img/badge/2-gs.png")}}" alt="badge">
                    <img class="w-[16%] md:w-[14%] aspect-square" src="{{asset("img/badge/3-gs.png")}}" alt="badge">
                    <img class="w-[16%] md:w-[14%] aspect-square" src="{{asset("img/badge/4-gs.png")}}" alt="badge">
                    <img class="w-[16%] md:w-[14%] aspect-square" src="{{asset("img/badge/5-gs.png")}}" alt="badge">
                </div>
            </div>
        </div>
    </div>
</x-student-layout>