<aside id="sidebar" class="fixed z-40 -translate-x-96 duration-700 ease-in-out bg-white border-r border-neutral-300 h-screen w-64 text-white lg:-translate-x-0">
    <div class="py-[1.13rem] px-4 border-b border-neutral-300 flex justify-center items-center gap-8">
        <div class="flex gap-3 mr-10">
            <img class="h-8 ml-4" src="{{asset("image/logo.png")}}" alt="logo">
            <h1 class="font-extrabold text-indigo-600 text-xl">PLAYED</h1>
        </div>
        <img id="close" class="w-6 cursor-pointer block lg:hidden" src="{{asset("image/minimize-sidebar.png")}}" alt="image minimize">
    </div>
    <div class="flex flex-col gap-4 py-8 px-4">
        <div class="flex flex-col gap-3 text-sm text-gray-300 font-light">
            <a href="/{{$dashboardUrl}}" class="flex items-center py-3 space-x-2 px-6 rounded-lg {{request()->path()  == $dashboardUrl ? 'sidebar-focus' : ''}}">
                <i class="text-neutral-700 fa fa-home" aria-hidden="true"></i>
                <p class="font-semibold text-neutral-700 ">Dashboard</p>
            </a>
            <a href="/{{$classUrl}}" class="flex items-center py-3 space-x-2 px-6 rounded-lg {{preg_match('/class|lesson|task|quiz|essay|upload|leaderboard|activity|recap|game|information|setting|list/', request()->path()) ? 'sidebar-focus' : ''}}">
                <i class="text-neutral-700 fas fa-chalkboard-teacher "></i>
                <p class="font-semibold text-neutral-700 ">Kelas</p>
            </a>
            {{-- <a href="/{{$discussioniUrl}}" class="flex items-center py-3 space-x-2 px-6 rounded-lg {{request()->path() == $discussioniUrl ? 'sidebar-focus' : ''}}">
                <i class="text-neutral-700 fas fa-comments "></i>
                <p class="font-semibold text-neutral-700 ">Diskusi</p>
            </a> --}}
            <a href="/{{$profileSettingUrl}}" class="flex items-center py-3 space-x-2 px-6 rounded-lg {{preg_match('/profile/', request()->path()) ? 'sidebar-focus' : ''}}">
                <i class="text-neutral-700 fas fa-user-alt "></i>
                <p class="font-semibold text-neutral-700 ">Pengaturan Profile</p>
            </a>
            <div class="text-left py-3 mt-auto space-x-2 px-6 rounded-lg">
                <i class="text-neutral-700 fas fa-sign-out-alt "></i>
                <button form="logout" class="font-semibold text-neutral-700 ">Keluar</button>
            </div>
        </div>
    </div>
</aside>

<form action="/logout" method="POST" id="logout">
    @csrf
    @method("DELETE")
</form>