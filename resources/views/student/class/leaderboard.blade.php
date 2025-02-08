<x-student-layout title="Leaderboard">
    <x-breadcrumbs :breadcrumbs="$breadcrumbs"/>
    <x-student-sub-nav
        missionPath="/student/class/{{$class->id}}"
        leaderboardPath="/student/{{$class->id}}/leaderboard"
        activityPath="/student/{{$class->id}}/activity"
        informationPath="/student/{{$class->id}}/information" 
    /> 
    <div class="flex mt-6">
        <div class="w-[50%] hidden md:block">
            <img class="w-full mx-auto" src="{{asset("img/vector/Project Stages-pana.svg")}}" alt="rocket image">
        </div>
        <div class="w-full md:w-[50%] px-4 py-6 bg-main shadow-md mb-4 rounded-xl">
            <div class="flex justify-between font-semibold text-sm mb-8">
                <h1 class="uppercase text-main">Leaderboard</h1>
                <h2 class="uppercase text-main">skor</h2>
            </div>
            <div class="flex flex-col gap-4">
                @if($leaderboards->isEmpty())
                <div class="flex justify-between px-3 py-3 bg-focus border-r-4 border-sky-300">
                    <h3 class="text-secondary text-sm">Belum ada siswa yang mendapatkan skor</h3>
                </div>
                @endif
                @foreach ($leaderboards as $leaderboard)
                    <div class="flex justify-between px-3 py-3 shadow-md rounded-l-md bg-focus border-r-4 border-sky-300">
                        <div class="flex gap-6">
                            <img class="aspect-square w-7" src="{{asset($user->where('id', $leaderboard['user_id'])->first()->photo)}}" alt="photo profile">
                            <h3 class="text-main font-medium">{{$user->where('id', $leaderboard['user_id'])->first()->name}}</h3>
                        </div>
                        <div> 
                            <p class="font-semibold text-main text-sm md:text-base">{{$leaderboard["total_xp"]}}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-student-layout>