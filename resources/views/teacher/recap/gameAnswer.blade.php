<x-teacher-layout title="Rekap Nilai">
    <x-breadcrumbs :breadcrumbs="$breadcrumbs"/>
    <x-teacher-sub-nav 
        classPath="/teacher/class/{{$class->id}}" 
        activityPath="/teacher/{{$class->id}}/activity" 
        gradePath="/teacher/{{$class->id}}/recap" 
        studentPath="/teacher/{{$class->id}}/list/student" 
        settingPath="/teacher/{{$class->id}}/setting"
    />
    <div>
        <h1 class="my-4 text-sm font-semibold">IDENTITAS</h1>
        <div class="flex gap-6 min-w-full p-4 rounded-xl bg-neutral-900">
            <div class="flex flex-col gap-1">
                <h2>Judul Soal</h2>
                <h2>Nama</h2>
                <h2>Selesai</h2>
                <h2>Reward</h2>
                <h2>Nilai</h2>
                <h2>Komentar</h2>
                <button id="updateScore" class="bg-violet-800 text-sm font-semibold uppercase py-2 px-4 rounded-lg mt-2">{{$user->memoryGameScores->where("task_id", $game->id)->first()->status ? "ubah nilai" : "beri nilai"}}</button>
            </div>
            <div class="flex flex-col gap-1">
                <p>: {{$game->title}}</p>
                <p>: {{$user->name}}</p>
                <p>: {{$user->memoryGameScores->where("task_id", $game->id)->first()->created_at->setTimezone('Asia/Jakarta')->format('d M Y (H:i T)')}}</p>
                <p>: {{$XP}} XP</p>
                <p>: {{$score}}</p>
                <p>: {{$user->memoryGameScores->where("task_id", $game->id)->first()->comment ?? "-"}}</p>
            </div>
        </div>
        <h2 class="my-4 text-sm font-semibold">HASIL JAWABAN {{$game->title}}</h2>
        <div class="flex flex-col gap-5">
            @foreach (array_slice($memory->images, 0, 6) as $key => $image)
                <div class="p-4 bg-neutral-900 rounded-xl space-y-3">
                    <p class="text-yellow-500 uppercase text-sm font-semibold">pertanyaan no {{$loop->iteration}}</p>
                    <div class="w-[35%] flex justify-center items-center bg-neutral-800 p-8 rounded-lg">
                        <img class="w-[60%] rounded-lg" src="{{asset("$image")}}" alt="image memory game {{$key}}">
                    </div>
                    <h3 class="text-base font-semibold">{{$memory->questions[$key]}}</h3>
                    <div class="bg-secondary p-4">
                        <p class="text-gray-400">{{$memory->answers->where('user_id', $user->id)->first()->answers[$key]}}</p>
                    </div>
                </div>
            @endforeach
        </div>

        <div id="parent_score_overlay" class="fixed hidden z-50 bg-black bg-opacity-70 w-full h-full top-0 left-0 overflow-scroll">
            <div id="score_overlay" class="flex h-full justify-center items-center py-6">
                <form action="" method="POST" enctype="multipart/form-data" class="bg-main p-4 rounded-xl w-[80%] md:w-[60%]">
                    @csrf
                    @method("PATCH")
                    <div class="flex justify-between">
                        <h2 class="text-sm md:text-base font-semibold">Edit Nilai</h2>
                        <img id="score_close" class="cursor-pointer" src="{{asset("img/close.svg")}}" alt="close image">
                    </div>
                    <span class="block h-[0.0625rem] mx-auto w-full bg-gray-500 my-4"></span>
                    <div class="flex flex-col gap-4">
                        <div class="flex flex-col gap-2">
                            <label for="score">Nilai</label>
                            <input type="text" name="score" id="score" value="{{$score}}" class="bg-main focus:outline-none border border-gray-400 rounded-lg p-2.5 text-sm">
                        </div>
                        <div class="flex flex-col gap-2">
                            <label for="comment" class="text-xs md:text-sm font-semibold">Komentar</label>
                            <textarea id="comment" name="comment" class="bg-main focus:outline-none border border-gray-400 rounded-lg p-2.5 text-sm">-</textarea>
                        </div>
                        <button type="submit" class="uppercase px-8 py-3.5 font-semibold rounded-lg w-full lg:w-auto block text-xs bg-violet-800">Tambah Pertanyaan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-teacher-layout>