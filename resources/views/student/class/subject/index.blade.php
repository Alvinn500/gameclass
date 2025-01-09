<x-student-layout title="materi">
    <x-breadcrumbs :breadcrumbs="$breadcrumbs"/>
    <x-student-sub-nav
        missionPath="/student/class/{{$class->id}}"
        leaderboardPath="/student/{{$class->id}}/leaderboard"
        activityPath="/student/{{$class->id}}/activity"
        informationPath="/student/{{$class->id}}/information" 
    /> 
    <div class="bg-main rounded-xl py-7 px-5 my-6 relative">
        <h1 class="text-3xl font-semibold">{{$subject->title}}</h1>
        <span class="block h-[0.0625rem] my-5 mx-auto w-[100%] bg-gray-600"></span>
        <p class="text-lg">{!! $subject->content !!}</p>
    </div>

    <div class="{{$subject->assignment ? "block " : "hidden "}}bg-main rounded-xl py-7 px-5 mb-6">
        <h3 class="text-xl font-medium">Berkas Lampiran</h3>
        <p class="text-lg font-light mb-5 mt-1">{{$subject->assignment}}</p>
        <a href="/student/download/{{$subject->assignment}}" class="bg-purple text-white py-2.5 px-5 text-sm font-semibold rounded-lg">Download</a>
    </div>

    
    <a 
        class="{{$subjectReaded->is_readed ? 'block ' : 'hidden '}}inline-block font-semibold text-sm py-3 px-5 rounded-lg bg-violet-800"
        href="/student/class/{{$class->id}}"
    >
        Kembali
    </a>

    <form 
        class="{{$subjectReaded->is_readed ? 'hidden ' : 'block '}}" 
        action="/student/lesson/{{$lesson->id}}/subject/{{$subject->id}}" 
        method="POST"
    > 
        @csrf
        <button type="submit" class="uppercase bg-yellow-400 w-full py-3 rounded-lg text-xs text-secondary font-bold">saya sudah mempelajari materi</button>
    </form>        
</x-student-layout>