<x-student-layout title="game">
    @if($gameImages != null)
    
        <div class="flex flex-col gap-4">
            <div class="bg-semiblack">
                <p>score</p>
            </div>
            <div class="container memory-game grid grid-cols-4 gap-5 justify-center items-center">
                @for ($i = 0; $i < count($gameImages); $i++)
                    <div id="{{$i}}" data-game="{{pathinfo($gameImages[$i], PATHINFO_FILENAME)}}" class="memory-card h-36 relative cursor-pointer">
                        <div class="back-face absolute top-0 left-0 bg-main h-full w-full rounded-lg flex gap-2 items-center justify-center">
                            <img class="h-5" src="{{asset('image/logo.png')}}" alt="logo">
                            <h2 class="uppercase font-semibold">played</h2>
                        </div>
                        <div class="front-face flex justify-center items-center absolute bg-neutral-900 rounded-lg w-full h-full">
                            <img class="h-[85%] rounded-sm object-cover object-center" src="{{asset($gameImages[$i])}}" alt="">
                        </div>
                    </div>
                @endfor
            </div>
        </div>
    @endif
    @if($gameImages == null)
        <div class="flex justify-center items-center h-80">
            <p>Game belum di buat Balik ke <a href="/student/class/{{$class->id}}" class="text-lime-500 font-semibold">kelas</a></p>
        </div>
    @endif
</x-student-layout>