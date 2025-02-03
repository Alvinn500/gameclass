<x-student-layout title="Kelas">
        <div class="flex flex-col md:flex-row gap-8">
        <div class=" w-full">
            <a href="/student/class/find" class="w-full text-center sm:text-left sm:w-auto inline-block uppercase bg-main text-neutral-800 shadow-md rounded-md px-4 py-3.5 font-bold text-xs mb-6">Temukan Kelas</a>
            <div class="flex items-center gap-2 mb-2.5">
                <i class="fas fa-dot-circle text-lime-500 text-sm"></i>
                <h4 class="uppercase text-neutral-800 text-sm font-semibold">Kelas Saya</h4>
            </div>
            <div class="flex flex-col md:flex-row gap-4">
                @foreach ($classes as $class )
                    <a href="/student/class/{{$class->id}}" class="bg-main shadow-md rounded-lg flex w-full gap-4 md:w-1/2 p-4 mb-2">
                        <img class="w-14 aspect-square my-auto rounded-md" src="{{asset("logo_class/$class->logo_class")}}" alt="icon">
                        <div class="my-auto">
                            <h3 class="text-base font-medium text-neutral-800">{{$class->study_name}}</h3>
                            <p class="text-xs text-neutral-600">{{$class->class}}</p>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
        {{-- <div class="flex-1">
            <img class="mx-auto" src="{{asset("img/Course app-pana.png")}}" alt="image">
        </div> --}}
    </div>
</x-student-layout>