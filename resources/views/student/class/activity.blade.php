<x-student-layout title="{{$class->study_name}} - {{$class->class}}">
    <x-breadcrumbs :breadcrumbs="$breadcrumbs"/>
    <x-student-sub-nav
        missionPath="/student/class/{{$class->id}}"
        leaderboardPath="/student/{{$class->id}}/leaderboard"
        activityPath="/student/{{$class->id}}/activity"
        informationPath="/student/{{$class->id}}/information" 
    /> 
    <div class="bg-main shadow-md my-4 rounded-lg p-6 space-y-3">
        <h1 class="text-sm font-semibold text-main">AKTIVITAS</h1>
        <div class="border-l-2 border-sky-300">
            @if($activities->count() == 0)
                <h2 class="ml-4 py-1 text-sm text-secondary font-semibold">Belum ada aktivitas</h2>
            @endif
            @foreach ($activities as $activity)
                <div class="ml-4 py-1 flex items-center gap-6">
                    <img class="h-7" src="{{asset($activity->user->photo)}}" alt="user profile image">
                    <div class="flex gap-1">
                        <h2 class="font-semibold text-link text-sm">{{$activity->user->name}}</h2>
                        <p class="text-sm text-main font-medium">{{$activity->description}}. </p>
                        <p class="text-sm text-secondary font-medium">{{$activity->created_at->setTimezone('Asia/Jakarta')->format('d M Y (H:i T)')}}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-student-layout>