<x-teacher-layout title="Kelas">
    <div class="flex flex-col md:flex-row gap-8">
        <div class=" w-full md:w-2/4">
            <a href="/teacher/class/create" class="w-full md:w-auto inline-block uppercase bg-yellow-500 text-black rounded-md px-4 py-3 font-semibold text-xs mb-6">Buat Kelas</a>
            <h4 class="mb-2.5 uppercase text-sm font-medium">Kelas Saya</h4>
            <div class="space-y-3">
                @foreach ( $classes as $class )
                    <a href="/teacher/class/{{$class->id}}" class="bg-main rounded-lg flex w-full md:w-5/6 p-4 gap-4">
                        <img class="w-16 ratio-16x9 my-auto rounded-lg" src="{{asset('logo_class/' . $class->logo_class)}}" alt="icon">
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
</x-teacher-layout>