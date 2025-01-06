<x-student-layout title="Kelas">
        <div class="flex flex-col md:flex-row gap-8">
        <div class=" w-full md:w-2/4">
            <a href="/student/class/find" class="w-full md:w-auto inline-block uppercase bg-yellow-500 text-black rounded-md px-4 py-3 font-semibold text-xs mb-6">Temukan Kelas</a>
            <div class="flex items-center gap-2 mb-2.5">
                <i class="fas fa-dot-circle text-yellow-500 text-sm"></i>
                <h4 class="uppercase text-sm font-semibold">Kelas Saya</h4>
            </div>
            <div>
                @foreach ($classes as $class )
                    <a href="/student/class/{{$class->id}}" class="bg-main rounded-lg flex w-full gap-4 md:w-5/6 p-4 mb-2">
                        <img class="w-14 aspect-square my-auto rounded-md" src="{{asset("logo_class/$class->logo_class")}}" alt="icon">
                        <div class="my-auto">
                            <h3 class="text-base font-medium">{{$class->study_name}}</h3>
                            <p class="text-xs text-gray-400">{{$class->class}}</p>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
        <div class="flex-1">
            <img class="mx-auto" src="{{asset("img/Course app-pana.png")}}" alt="image">
        </div>
    </div>
</x-student-layout>