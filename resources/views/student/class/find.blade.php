<x-student-layout title="Temukan Kelas">
    <x-breadcrumbs :breadcrumbs="$breadcrumbs"/>
    <div class="grid grid-cols-2 gap-7">
        @foreach ($classes as $class)
            <div class="flex items-center gap-5 bg-main px-7 pt-5 pb-6 rounded-xl w-full">
                <div>
                    <img class="aspect-square w-14 rounded-lg" src="{{asset('logo_class/' . $class->logo_class)}}" alt="logo class">
                </div>
                <div>
                    <h1 class="font-semibold text-base">{{$class->study_name}}</h1>
                    <p class="font-medium text-gray-400 text-sm mt-1 mb-2">{{$class->class}}</p>
                    <form action="/student/class/join/{{$class->id}}" method="POST">
                        @csrf
                        <button type="submit" class="inline-block font-bold text-xs text-white px-8 py-2.5 bg-violet-800 rounded-md uppercase">
                            Bergabung Ke Kelas
                        </button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
</x-student-layout>