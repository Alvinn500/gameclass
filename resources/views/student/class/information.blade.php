<x-student-layout title="{{$class->study_name}} - {{$class->class}}">
    <x-breadcrumbs :breadcrumbs="$breadcrumbs"/>
    <x-student-sub-nav
        missionPath="/student/class/{{$class->id}}"
        leaderboardPath="/student/{{$class->id}}/leaderboard"
        activityPath="/student/{{$class->id}}/activity"
        informationPath="/student/{{$class->id}}/information" 
    /> 
    <div>
        <h1 class="text-sm font-semibold my-4">AKTIVITAS</h1>
        <div class="flex flex-col md:flex-row gap-6 bg-neutral-900 p-6 rounded-xl">
            <div><img class="mx-auto md:mx-0 w-56 rounded-lg" src="{{asset("logo_class/" . $class->logo_class)}}" alt="logo class"></div>
            <div class="flex flex-col gap-2 mx-auto w-full md:w-1/3">
                <div class="flex justify-between border-b border-neutral-700 px-2 py-1">
                    <h2 class="font-semibold">Mata Pelajaran</h2>
                    <p>{{$class->study_name}}</p>
                </div>
                <div class="flex justify-between border-b border-neutral-700 px-2 py-1">
                    <h2 class="font-semibold">Kelas</h2>
                    <p>{{$class->class}}</p>
                </div>
                <div class="flex justify-between border-b border-neutral-700 px-2 py-1">
                    <h2 class="font-semibold">Sekolah</h2>
                    <p>{{$class->school_name}}</p>
                </div>
                <div class="flex justify-between border-b border-neutral-700 px-2 py-1 mb-2">
                    <h2 class="font-semibold">Guru</h2>
                    <p>{{$class->users->where("role", "teacher")->first()->name}}</p>
                </div>
                <button id="leaveClass" class="bg-red-600 py-3 px-4 rounded-lg shadow-lg text-xs font-semibold uppercase">keluar dari kelas</button>
            </div>
        </div>
    </div>
    <div id="confirm_overlay" class="fixed hidden top-0 left-0 w-full h-full z-50 bg-black bg-opacity-50">
        <div id="confirm_modal" class="flex justify-center items-center h-full">
            <form action="/leave/class/{{$class->id}}/{{$user->id}}" method="POST" class="bg-neutral-900 rounded-lg p-4 w-80 flex flex-col gap-4">
                @csrf
                <div>
                    <h2 class="font-semibold text-lg text-center mb-1">Keluar Dari Kelas</h2>
                    <p class="text-center text-sm  text-gray-400">Anda yakin ingin keluar dari kelas ini?</p>
                </div>
                <div class="flex justify-between">  
                    <button id="unconfirm" type="button" class="border border-lime-500 py-2.5 px-12 rounded-lg shadow-lg text-xs font-semibold uppercase">batal</button>
                    <button type="submit" class="bg-red-600 py-2.5 px-14 rounded-lg shadow-lg text-xs font-semibold uppercase">iya</button>
                </div>
            </form>
        </div>
    </div>
</x-student-layout>