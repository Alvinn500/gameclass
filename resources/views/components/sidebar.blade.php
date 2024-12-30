<aside id="sidebar" class="fixed z-50 -translate-x-96 duration-700 ease-in-out bg-main h-[94.8vh] w-64 rounded-lg text-white lg:-translate-x-0">
   <div class="p-2">
    <svg id="close" class="block lg:hidden ml-auto cursor-pointer" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"/></svg>
   </div>
    <div class="pb-4 lg:pt-4  border-b border-gray-600">
        <img class="h-12 mx-auto" src="{{asset("img/logo.png")}}" alt="logo">
    </div>
    <div class="flex flex-col gap-4 py-8 px-4">
        <div class="flex flex-col text-sm text-gray-300 font-light">
            <a href="/{{$dashboardUrl}}" class="py-3 px-6 {{request()->path()  == $dashboardUrl ? 'sidebar-focus' : ''}}">Dashboard</a>
            <a href="/{{$classUrl}}" class="py-3 px-6 {{strpos( request()->path(), "class")  ? 'sidebar-focus' : ''}}">Kelas</a>
            <a href="/{{$discussioniUrl}}" class="py-3 px-6 {{request()->path() == $discussioniUrl ? 'sidebar-focus' : ''}}">Diskusi</a>
        </div>
        <h3 class="uppercase text-sm font-medium text-gray-300 px-3">profil</h3>
        <div class="flex flex-col text-sm text-gray-300 font-light">
            <a href="/{{$profileSettingUrl}}" class="py-3 px-6 {{request()->path() == $profileSettingUrl ? 'sidebar-focus' : ''}}">Pengaturan Profile</a>
            <button class="text-left py-3 px-6" form="logout">Keluar</button>
        </div>
    </div>
</aside>

<form action="/logout" method="POST" id="logout">
    @csrf
    @method("DELETE")
</form>