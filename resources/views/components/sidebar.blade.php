<aside id="sidebar" class="fixed z-40 -translate-x-96 duration-700 ease-in-out bg-neutral-900 border-r border-neutral-800 h-screen w-64 text-white lg:-translate-x-0">
   <div>
    <svg id="close" class="block lg:hidden ml-auto cursor-pointer" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"/></svg>
   </div>
    <div class="py-[1.13rem] border-b border-neutral-800 flex justify-center items-center gap-3">
        <img class="h-8" src="{{asset("image/logo.png")}}" alt="logo">
        <h1 class="font-extrabold text-xl">PLAYED</h1>
    </div>
    <div class="flex flex-col gap-4 py-8 px-4">
        <div class="flex flex-col gap-3 text-sm text-gray-300 font-light">
            <a href="/{{$dashboardUrl}}" class="flex items-center py-3 space-x-2 px-6 rounded-lg {{request()->path()  == $dashboardUrl ? 'sidebar-focus' : ''}}">
                <i class="fa fa-home" aria-hidden="true"></i>
                <p class="font-medium">Dashboard</p>
            </a>
            <a href="/{{$classUrl}}" class="flex items-center py-3 space-x-2 px-6 rounded-lg {{preg_match('/class|lesson|task|quiz|essay|upload|leaderboard|activity|recap|game/', request()->path()) ? 'sidebar-focus' : ''}}">
                <i class="fas fa-chalkboard-teacher "></i>
                <p class="font-medium">Kelas</p>
            </a>
            <a href="/{{$discussioniUrl}}" class="flex items-center py-3 space-x-2 px-6 rounded-lg {{request()->path() == $discussioniUrl ? 'sidebar-focus' : ''}}">
                <i class="fas fa-comments "></i>
                <p class="font-medium">Diskusi</p>
            </a>
        </div>
        <h3 class="uppercase text-sm font-medium text-gray-300 px-3">profil</h3>
        <div class="flex flex-col gap-3 text-sm text-gray-300 font-light">
            <a href="/{{$profileSettingUrl}}" class="flex items-center py-3 space-x-2 px-6 rounded-lg {{request()->path() == $profileSettingUrl ? 'sidebar-focus' : ''}}">
                <i class="fas fa-user-alt "></i>
                <p class="font-medium">Pengaturan Profile</p>
            </a>
            <div class="text-left py-3 space-x-2 px-6 rounded-lg">
                <i class="fas fa-sign-out-alt "></i>
                <button form="logout">Keluar</button>
            </div>
        </div>
    </div>
</aside>

<form action="/logout" method="POST" id="logout">
    @csrf
    @method("DELETE")
</form>