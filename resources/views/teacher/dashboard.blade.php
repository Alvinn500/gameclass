<x-teacher-layout title="Dashboard">
    <div class="md:flex grid grid-rows-2 gap-8 mb-0 md:mb-8">
        <div class="mx-auto md:mx-0 dark-purple rounded-xl w-full md:w-3/5 md:min-w-[298.73px] duration-600 ease-in-out">
            <div class="px-5 pt-5 mb-3">
                <h3 class="uppercase text-2xl">guru</h3>
                <h3 class="uppercase text-2xl font-semibold text-yellow-400">guru</h3>
            </div>
            <span class="block h-[0.0625rem] mx-auto w-[97%] bg-gray-400"></span>
            <div class="grid grid-cols-2 p-5 h-40">
                <div clfass="h-16">
                    <p class="text-sm mb-1">kelas</p>
                    <p class="text-xl font-semibold">{{$totalClass}}</p>     
                </div>
                <div class="h-16">
                    <p class="text-sm mb-1">materi</p>
                    <p class="text-xl font-semibold">{{$totalSubject}}</p>
                </div>
                <div class="h-16">
                    <p class="text-sm mb-1">siswa</p>
                    <p class="text-xl font-semibold">{{$totalStudent}}</p>
                </div>
                <div class="h-16">
                    <p class="text-sm mb-1">quiz</p>
                    <p class="text-xl font-semibold">{{$totalQuiz}}</p>
                </div>
            </div>
        </div>
        <div class="mx-auto md:mx-0 bg-main p-4 rounded-xl md:min-w-[200px] w-full md:w-2/5 h-44">
            <div class="gradient-diskusi w-full h-full rounded-lg pt-6 pl-3">
                <h3 class="text-xl mb-12 font-semibold">Forum Diskusi</h3>
                <p class="text-sm font-medium">Jelajahi Forum</p>
            </div>
        </div>
    </div>
    <div>
        <h3 class="font-semibold mb-4">Kelas Terbaru</h3>
        <div class="mb-4 flex gap-2">
            @foreach ($classes as $class )
                <a href="/teacher/class/{{$class->id}}" class="flex bg-main p-4 rounded-lg items-center gap-4 w-full sm:w-1/2 md:w-1/3">
                    <img class="ratio-16x9 h-10 rounded-md" src="{{asset("logo_class/" . $class->logo_class)}}" alt="class image">
                    <h3>{{$class->study_name}}</h3>
                </a>
            @endforeach
        </div> 
        <a href="/teacher/class" class="w-full md:w-auto  uppercase bg-yellow-500 text-black rounded-md px-4 py-3 font-semibold text-xs mb-6">LIHAT SEMUA KELAS</a>
    </div>
</x-teacher-layout>
