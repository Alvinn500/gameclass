<x-layout title="{{$title}}">
    <main class="h-full flex">
        <div> 
            <x-sidebar class="fixed duration-700 ease-in-out" dashboardUrl="teacher" classUrl="teacher/class" profileSettingUrl="profile"/>
        </div>
        <div class="text-main flex-1 m-0 lg:ml-64 relative">
            <div class="flex justify-between items-center p-6 mb-5 bg-main h-[69px] border-b border-main">
                <div class="flex items-center gap-1">
                    <img class="h-6 object-contain cursor-pointer block lg:hidden" id="humburger-dashboard" src="{{asset("image/open-sidebar.png")}}" alt="icon open sidebar">
                    <h2 class="font-semibold text-main text-sm md:text-base lg:text-lg">{{$title}}</h2>
                </div>
                <div class="flex gap-2">
                    <img class="w-6" src="{{asset(Auth::user()->photo)}}" alt="user avatar image">
                    <h2 class="font-semibold text-main">{{Auth::user()->name}}</h2>
                </div>
            </div>
            <div class="mx-6">
                {{$slot}}
            </div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>
    <script src="https://cdn.datatables.net/2.2.1/js/dataTables.js"></script>
    @vite('resources/js/editor.js')
    @vite('resources/js/main.js')
</x-layout>