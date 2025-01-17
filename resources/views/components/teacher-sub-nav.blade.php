<nav>
    <ul class="flex flex-col sm:flex-row text-center sm:text-left gap-2 bg-main py-2 px-3 rounded-xl">
        <li><a class="uppercase text-xs block sm:inline-block text-gray-600 py-3 px-4 font-bold {{preg_match('/class|lesson|task|quiz|essay|upload/', request()->path()) ? "sub-nav-focus text-white py-3 px-4 rounded-lg" : ""}}" href="{{$classPath}}">kelas</a></li>
        <li><a class="uppercase text-xs block sm:inline-block text-gray-600 py-3 px-4 font-bold {{strpos(request()->path(), "activity") ? "sub-nav-focus text-white py-3 px-4 rounded-lg" : "" }}" href="{{$activityPath}}">aktivitas</a></li>
        <li><a class="uppercase text-xs block sm:inline-block text-gray-600 py-3 px-4 font-bold {{strpos(request()->path(), "grade") ? "sub-nav-focus text-white py-3 px-4 rounded-lg" : "" }}" href="{{$gradePath}}">rekap nilai</a></li>
        <li><a class="uppercase text-xs block sm:inline-block text-gray-600 py-3 px-4 font-bold {{strpos(request()->path(), "student") ? "sub-nav-focus text-white py-3 px-4 rounded-lg" : "" }}" href="{{$studentPath}}">daftar siswa</a></li>
        <li><a class="uppercase text-xs block sm:inline-block text-gray-600 py-3 px-4 font-bold {{strpos(request()->path(), "setting") ? "sub-nav-focus text-white py-3 px-4 rounded-lg" : "" }}" href="{{$settingPath}}">pengatuean</a></li>
    </ul>
</nav>