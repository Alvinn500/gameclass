<nav>
    <ul class="flex flex-col sm:flex-row text-center sm:text-left gap-2 bg-main shadow-md py-2 px-3 rounded-xl">
        <li><a class="uppercase text-xs block sm:inline-block text-main py-3 px-4 font-bold {{preg_match('/class|lesson|task|quiz\/create|essay\/create|upload\/create|game\/create/', request()->path()) ? "bg-focus text-secondary py-3 px-4 rounded-lg" : ""}}" href="{{$classPath}}">kelas</a></li>
        <li><a class="uppercase text-xs block sm:inline-block text-main py-3 px-4 font-bold {{strpos(request()->path(), "activity") ? "bg-focus text-secondary py-3 px-4 rounded-lg" : "" }}" href="{{$activityPath}}">aktivitas</a></li>
        <li><a class="uppercase text-xs block sm:inline-block text-main py-3 px-4 font-bold {{strpos(request()->path(), "recap") ? "bg-focus text-secondary py-3 px-4 rounded-lg" : "" }}" href="{{$gradePath}}">rekap nilai</a></li>
        <li><a class="uppercase text-xs block sm:inline-block text-main py-3 px-4 font-bold {{strpos(request()->path(), "student") ? "bg-focus text-secondary py-3 px-4 rounded-lg" : "" }}" href="{{$studentPath}}">daftar siswa</a></li>
        <li><a class="uppercase text-xs block sm:inline-block text-main py-3 px-4 font-bold {{strpos(request()->path(), "setting") ? "bg-focus text-secondary py-3 px-4 rounded-lg" : "" }}" href="{{$settingPath}}">pengaturan</a></li>
    </ul>
</nav>