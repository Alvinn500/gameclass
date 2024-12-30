<nav>
    <ul class="flex gap-6 bg-main py-4 px-3 rounded-xl">
        <li><a class="uppercase text-xs text-gray-600 font-semibold {{strpos(request()->path(), "class") ? "bg-whiteSubNav text-white py-3 px-4 rounded-lg" : ""}}" href="{{$missionPath}}">Misi</a></li>
        <li><a class="uppercase text-xs text-gray-600 font-semibold {{strpos(request()->path(), "leaderboard") ? "bg-whiteSubNav text-white py-3 px-4 rounded-lg" : "" }}" href="{{$leaderboardPath}}">Leaderboard</a></li>
        <li><a class="uppercase text-xs text-gray-600 font-semibold {{strpos(request()->path(), "activity") ? "bg-whiteSubNav text-white py-3 px-4 rounded-lg" : "" }}" href="{{$activityPath}}">aktivitas</a></li>
        <li><a class="uppercase text-xs text-gray-600 font-semibold {{strpos(request()->path(), "information") ? "bg-whiteSubNav text-white py-3 px-4 rounded-lg" : "" }}" href="{{$informationPath}}">informasi</a></li>
    </ul>
</nav>