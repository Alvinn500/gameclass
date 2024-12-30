<x-layout title="{{$title}}">
    <main class="h-full p-4 flex gap-8">
        <div> 
            <x-sidebar dashboardUrl="student" discussioniUrl="student/discussion" classUrl="student/class" profileSettingUrl="profileSetting"/>
        </div>
        <div class="text-white flex-1 m-0 lg:ml-64">
            <div class="flex px-2 py-4 justify-between mb-4 rounded-xl">
                <div class="flex">
                    <div class="flex flex-col space-y-1.5 pr-4 lg:hidden cursor-pointer" id="humburger-dashboard">
                        <span class="duration-500 ease-in h-[0.187rem] w-9 bg-white inline-block rounded-full"></span>
                        <span class="duration-500 ease-in h-[0.187rem] w-9 bg-white inline-block rounded-full"></span>
                        <span class="duration-500 ease-in h-[0.187rem] w-9 bg-white inline-block rounded-full"></span>
                    </div>
                    <h2 class="font-semibold text-base">{{$title}}</h2>
                </div>
                <h2 class="font-light text-gray-300">{{Auth::user()->name}}</h2>
            </div>
            {{$slot}}
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    @vite('resources/js/chart.js')
    @vite('resources/js/game.js')
    @vite('resources/js/main.js')
</x-layout>