<x-student-layout title="materi">
    <x-breadcrumbs :breadcrumbs="$breadcrumbs"/>
    <x-student-sub-nav
        missionPath="/student/class/{{$class->id}}"
        leaderboardPath="/student/{{$class->id}}/leaderboard"
        activityPath="/student/{{$class->id}}/activity"
        informationPath="/student/{{$class->id}}/information" 
    /> 
    <div class="bg-main shadow-md rounded-xl py-7 px-5 my-6 relative">
        <h1 class="text-3xl font-semibold text-main">{{$subject->title}}</h1>
        <span class="block h-[0.0625rem] my-5 mx-auto w-[100%] bg-line"></span>
        <div class="text-lg text-main">{!! $subject->content !!}</div>
    </div>

    <div class="{{$subject->assignment ? "block " : "hidden "}}bg-main shadow-md rounded-xl py-7 px-5 mb-6">
        <h3 class="text-xl font-medium text-main">Berkas Lampiran</h3>
        <p class="text-lg font-light mb-5 mt-1 text-main">{{$subject->assignment}}</p>
        <a href="/student/download/{{$subject->assignment}}" class="bg-button text-main py-2.5 px-5 text-sm font-semibold rounded-lg">Download</a>
    </div>

    
    <a 
        class="{{$subjectReaded->is_readed ? 'block ' : 'hidden '}}inline-block font-semibold text-sm py-2.5 px-5 mb-4 rounded-lg bg-button"
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
        <button type="submit" class="uppercase bg-main w-full py-3 mb-6 rounded-lg text-xs text-secondary font-bold">saya sudah mempelajari materi</button>
    </form>        
</x-student-layout>