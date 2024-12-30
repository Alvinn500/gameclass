<x-student-layout title="Kelas">
        <div class="flex flex-col md:flex-row gap-8">
        <div class=" w-full md:w-2/4">
            <button class="w-full md:w-auto  uppercase bg-yellow-500 text-black rounded-md px-4 py-3 font-semibold text-xs mb-6">Temukan Kelas</button>
            <h4 class="mb-2.5 uppercase text-sm font-medium">Kelas Saya</h4>
            <div>
                <a href="/student/class/lesson/1" class="bg-main rounded-lg flex w-full md:w-5/6 p-2">
                    <img class="w-20 ratio-16x9 my-auto" src="{{asset("img/vector/Connected-rafiki.svg")}}" alt="icon">
                    <div class="my-auto">
                        <h3 class="text-base font-medium">PKN</h3>
                        <p class="text-xs text-gray-400">XII RPL - Mutu</p>
                    </div>
                </a>
            </div>
        </div>
        <div class="flex-1">
            <img class="mx-auto" src="{{asset("img/Course app-pana.png")}}" alt="image">
        </div>
    </div>
</x-student-layout>