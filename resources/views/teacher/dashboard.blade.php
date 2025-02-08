<x-teacher-layout title="Dashboard">
    <div class="w-full flex gap-8 mb-0 md:mb-8">
        <div class="mx-auto md:mx-0 bg-main shadow-md rounded-xl w-full  duration-600 ease-in-out">
            <div class="px-5 pt-5 mb-3">
                <h3 class="uppercase text-2xl text-main font-medium">{{$user->name}}</h3>
                <h3 class="uppercase text-2xl font-semibold text-violet-main">{{$user->role === "teacher" ? "Guru" : "Siswa"}}</h3>
            </div>
            <span class="block h-[0.0625rem] mx-auto w-[97%] bg-line"></span>
            <div class="grid grid-cols-2 p-5 h-40">
                <div clfass="h-16">
                    <p class="text-sm mb-1 text-main font-medium uppercase">kelas</p>
                    <p class="text-xl font-semibold text-main">{{$totalClass}}</p>     
                </div>
                <div class="h-16">
                    <p class="text-sm mb-1 text-main font-medium uppercase">materi</p>
                    <p class="text-xl font-semibold text-main">{{$totalSubject}}</p>
                </div>
                <div class="h-16">
                    <p class="text-sm mb-1 text-main font-medium uppercase">siswa</p>
                    <p class="text-xl font-semibold text-main">{{$totalStudent}}</p>
                </div>
                <div class="h-16">
                    <p class="text-sm mb-1 text-main font-medium uppercase">quiz</p>
                    <p class="text-xl font-semibold text-main">{{$totalQuiz}}</p>
                </div>
            </div>
        </div>
        {{-- <div class="mx-auto md:mx-0 bg-main p-4 rounded-xl md:min-w-[200px] w-full md:w-2/5 h-44">
            <div class="gradient-diskusi w-full h-full rounded-lg pt-6 pl-3">
                <h3 class="text-xl mb-12 font-semibold">Forum Diskusi</h3>
                <p class="text-sm font-medium">Jelajahi Forum</p>
            </div>
        </div> --}}
    </div>
    <div>
        <h3 class="font-semibold my-4 text-main">Kelas Terbaru</h3>
        <div class="mb-4 flex flex-col sm:flex-row gap-2">
            @foreach ($classes as $class )
                <a href="/teacher/class/{{$class->id}}" class="flex bg-main shadow-md p-4 rounded-lg items-center gap-4 w-full sm:w-1/2 md:w-1/3">
                    <img class="ratio-16x9 h-10 rounded-md" src="{{asset("logo_class/" . $class->logo_class)}}" alt="class image">
                    <h3 class="text-main font-medium text-sm lg:text-base">{{$class->study_name}}</h3>
                </a>
            @endforeach
        </div> 
        <a href="/teacher/class" class="w-full md:w-auto uppercase bg-main text-white rounded-md px-4 py-3 font-bold text-xs mb-6">LIHAT SEMUA KELAS</a>
    </div>
</x-teacher-layout>
