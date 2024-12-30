<nav>
    <ul class="flex flex-col sm:flex-row text-center sm:text-left gap-2 bg-main py-2 px-3 rounded-xl">
        <li><a class="uppercase text-xs block sm:inline-block text-gray-600 py-3 px-4 font-bold {{strpos(request()->path(), "class") ? "bg-whiteSubNav text-white rounded-lg uppercase" : ""}}" href="{{$classPath}}">kelas</a></li>
        <li><a class="uppercase text-xs block sm:inline-block text-gray-600 py-3 px-4 font-bold {{strpos(request()->path(), "activity") ? "bg-whiteSubNav text-white rounded-lg uppercase" : "" }}" href="{{$activityPath}}">aktivitas</a></li>
        <li><a class="uppercase text-xs block sm:inline-block text-gray-600 py-3 px-4 font-bold {{strpos(request()->path(), "grade") ? "bg-whiteSubNav text-white rounded-lg uppercase" : "" }}" href="{{$gradePath}}">rekap nilai</a></li>
        <li><a class="uppercase text-xs block sm:inline-block text-gray-600 py-3 px-4 font-bold {{strpos(request()->path(), "student") ? "bg-whiteSubNav text-white rounded-lg uppercase" : "" }}" href="{{$studentPath}}">daftar siswa</a></li>
        <li><a class="uppercase text-xs block sm:inline-block text-gray-600 py-3 px-4 font-bold {{strpos(request()->path(), "setting") ? "bg-whiteSubNav text-white rounded-lg uppercase" : "" }}" href="{{$settingPath}}">pengatuean</a></li>
    </ul>
</nav>