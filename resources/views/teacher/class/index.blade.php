<x-teacher-layout title="Kelas">
    <div class="flex gap-8">
        <div class="w-full">
            <a href="/teacher/class/create" class="w-full md:w-auto inline-block uppercase bg-white shadow-md text-neutral-800 rounded-md px-4 py-3 font-semibold text-xs mb-6">Buat Kelas</a>
            <h4 class="mb-2.5 uppercase text-sm font-semibold text-neutral-800">Kelas Saya</h4>
            <div class="flex flex-col md:flex-row gap-4">
                @foreach ( $classes as $class )
                    <a href="/teacher/class/{{$class->id}}" class="bg-main shadow-md rounded-lg flex md:w-1/2 p-4 gap-4">
                        <img class="w-16 aspect-square my-auto rounded-lg" src="{{asset('logo_class/' . $class->logo_class)}}" alt="icon">
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
</x-teacher-layout>