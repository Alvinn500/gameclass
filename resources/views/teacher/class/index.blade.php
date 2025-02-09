<x-teacher-layout title="Kelas">
    <div class="flex gap-8">
        <div class="w-full">
            <a href="/teacher/class/create" class="w-full md:w-auto inline-block uppercase bg-main shadow-md text-main rounded-md px-4 py-3 font-semibold text-xs mb-6">Buat Kelas</a>
            <h4 class="mb-2.5 uppercase text-sm font-semibold text-main">Kelas Saya</h4>
            <div class="flex gap-4">
                <div class="w-full md:w-[60%]">
                    @foreach ( $classes as $class )
                        <a href="/teacher/class/{{$class->id}}" class="bg-main shadow-md rounded-lg flex w-full p-4 gap-4">
                            <img class="w-16 aspect-square my-auto rounded-lg" src="{{asset('logo_class/' . $class->logo_class)}}" alt="icon">
                            <div class="my-auto">
                                <h3 class="text-base font-bold text-main">{{$class->study_name}}</h3>
                                <p class="text-sm text-secondary font-semibold">{{$class->class}}</p>
                            </div>
                        </a>
                    @endforeach    
                </div>
                <div class="hidden md:block md:w-[40%]">
                    <img class="w-[80%] mx-auto" src="{{asset("image/student-readbook-3.png")}}" alt="student readbook"/>
                </div>
            </div>
        </div>
    </div>
</x-teacher-layout>