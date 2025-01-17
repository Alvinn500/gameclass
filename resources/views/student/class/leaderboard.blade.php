<x-student-layout title="Leaderboard">
    <x-breadcrumbs :breadcrumbs="$breadcrumbs"/>
    <x-student-sub-nav
        missionPath="/student/class/{{$class->id}}"
        leaderboardPath="/student/{{$class->id}}/leaderboard"
        activityPath="/student/{{$class->id}}/activity"
        informationPath="/student/{{$class->id}}/information" 
    /> 
    <div class="flex mt-6">
        <div class="w-[50%]">
            <img class="w-full mx-auto" src="{{asset("img/vector/Project Stages-pana.svg")}}" alt="rocket image">
        </div>
        <div class="w-[50%] px-4 py-6 bg-main rounded-xl">
            <div class="flex justify-between font-semibold text-sm mb-8">
                <h1 class="uppercase">Leaderboard</h1>
                <h2 class="uppercase">skor</h2>
            </div>
            <div class="flex flex-col gap-4">
                @if($scores->isEmpty())
                <div class="flex justify-between px-3 py-3 dark-green border-r-4 border-lime-500">
                    <h3 class="text-gray-400 text-sm">Belum ada siswa yang mendapatkan skor</h3>
                </div>
                @endif
                @foreach ($scores as $score)
                    <div class="flex justify-between px-3 py-3 dark-green border-r-4 border-lime-500">
                        <div class="flex gap-6">
                            <img class="aspect-square w-7" src="{{asset("photo_profile/" . $score->user->photo)}}" alt="photo profile">
                            <h3>{{$score->user->name}}</h3>
                        </div>
                        <div> 
                            <p>{{$score->score}}</p>
                            {{-- <p>{{$subjectScore->where('user_id', $user->id)->sum('score') + $quizScore->where('user_id', $user->id)->sum('score')}}</p> --}}
                            {{-- <span class="absolute block h-full -right-2 top-0 mx-auto w-2 bg-yellow-400"></span> --}}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-student-layout>