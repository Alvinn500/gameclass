<x-student-layout title="Temukan Kelas">
    <x-breadcrumbs :breadcrumbs="$breadcrumbs"/>
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-7 mb-6">
        @foreach ($classes as $class)
            <div class="{{$user->classes()->where('class_listing_id', $class->id)->exists() ? 'hidden' : ''}} flex items-center gap-5 bg-main shadow-md px-7 pt-5 pb-6 rounded-xl w-full">
                <div>
                    <img class="aspect-square w-14 rounded-lg" src="{{asset('logo_class/' . $class->logo_class)}}" alt="logo class">
                </div>
                <div>
                    <h1 class="font-semibold text-base text-main">{{$class->study_name}}</h1>
                    <p class="font-medium text-secondary text-sm mt-1 mb-2">{{$class->class}}</p>
                    <form action="/student/class/join/{{$class->id}}" method="POST">
                        @csrf
                        <button type="submit" class="inline-block font-bold text-xs text-main px-8 py-2.5 bg-button rounded-md uppercase">
                            Bergabung Ke Kelas
                        </button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
</x-student-layout>