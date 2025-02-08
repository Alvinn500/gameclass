<nav>
    <ul class="flex flex-col sm:flex-row text-center sm:text-left gap-2 bg-main shadow-md py-2 px-3 rounded-xl">
        <li><a class="uppercase text-xs block sm:inline-block text-main py-3 px-4 font-bold {{preg_match('/class|lesson|quiz|task|essay|upload/', request()->path()) ? "bg-focus text-secondary py-3 px-4 rounded-lg" : ""}}" href="{{$missionPath}}">Misi</a></li>
        <li><a class="uppercase text-xs block sm:inline-block text-main py-3 px-4 font-bold {{strpos(request()->path(), "leaderboard") ? "bg-focus text-secondary py-3 px-4 rounded-lg" : "" }}" href="{{$leaderboardPath}}">Leaderboard</a></li>
        <li><a class="uppercase text-xs block sm:inline-block text-main py-3 px-4 font-bold {{strpos(request()->path(), "activity") ? "bg-focus text-secondary py-3 px-4 rounded-lg" : "" }}" href="{{$activityPath}}">aktivitas</a></li>
        <li><a class="uppercase text-xs block sm:inline-block text-main py-3 px-4 font-bold {{strpos(request()->path(), "information") ? "bg-focus text-secondary py-3 px-4 rounded-lg" : "" }}" href="{{$informationPath}}">informasi</a></li>
    </ul>
</nav>