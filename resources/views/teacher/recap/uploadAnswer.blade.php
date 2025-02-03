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
        <h1 class="my-4 text-sm font-semibold text-neutral-800">IDENTITAS</h1>
        <div class="flex gap-6 min-w-full p-4 rounded-xl bg-white shadow-md">
            <div class="flex flex-col gap-1">
                <h2 class="text-neutral-800 font-medium">Judul Soal</h2>
                <h2 class="text-neutral-800 font-medium">Nama</h2>
                <h2 class="text-neutral-800 font-medium">Selesai</h2>
                <h2 class="text-neutral-800 font-medium">Reward</h2>
                <h2 class="text-neutral-800 font-medium">Nilai</h2>
                <h2 class="text-neutral-800 font-medium">Komentar</h2>
                <button id="updateScore" class="bg-indigo-600 text-sm font-semibold uppercase py-2 px-4 rounded-lg mt-2">{{$user->uploadScores->where("upload_id", $upload->upload->id)->first()->status ? "ubah nilai" : "beri nilai"}}</button>
            </div>
            <div class="flex flex-col gap-1">
                <p class="text-neutral-800 font-medium">: {{$upload->title}}</p>
                <p class="text-neutral-800 font-medium">: {{$user->name}}</p>
                <p class="text-neutral-800 font-medium">: {{$user->uploadScores->where("upload_id", $upload->upload->id)->first()->created_at->setTimezone('Asia/Jakarta')->format('d M Y (H:i T)')}}</p>
                <p class="text-neutral-800 font-medium">: {{$upload->upload->score->XP}} XP</p>
                <p class="text-neutral-800 font-medium">: {{$upload->upload->score->score}}</p>
                <p class="text-neutral-800 font-medium">: {{$user->uploadScores->where("upload_id", $upload->upload->id)->first()->comment ?? "-"}}</p>
            </div>
        </div>
        <h2 class="my-4 text-sm font-semibold text-neutral-800">HASIL JAWABAN {{$user->name}}</h2>
        <div class="flex flex-col gap-5 mb-6">
            {{-- @foreach ($up->essays as $essay) --}}
                <div class="p-4 bg-white shadow-md rounded-xl space-y-4">
                    <p class="text-yellow-500 uppercase text-sm">pertanyaan</p>
                    <h3 class="text-base font-semibold text-neutral-800">{{$upload->upload->question}}</h3>
                    @if($upload->upload->file)
                        <img class="rounded-xl h-44" src="{{asset("uploads/" . $upload->upload->file)}}" alt="img">
                    @endif
                    <form action="/upload/answer/download/{{$upload->upload->answer->file}}" method="POST">
                        @csrf
                        <button class="bg-indigo-600 text-sm font-semibold uppercase py-3 px-8 mb-2 rounded-lg">download jawaban {{$user->name}}</button>
                    </form>
                </div>
            {{-- @endforeach --}}
        </div>

        <div id="parent_score_overlay" class="fixed hidden z-50 bg-black bg-opacity-70 w-full h-full top-0 left-0 overflow-scroll">
            <div id="score_overlay" class="flex h-full justify-center items-center py-6">
                <form action="" method="POST" enctype="multipart/form-data" class="bg-main p-4 rounded-xl w-[80%] md:w-[60%]">
                    @csrf
                    @method("PATCH")
                    <div class="flex justify-between">
                        <h2 class="text-sm md:text-base font-semibold text-neutral-800">Edit Nilai</h2>
                        <img id="score_close" class="cursor-pointer" src="{{asset("img/close.svg")}}" alt="close image">
                    </div>
                    <span class="block h-[0.0625rem] mx-auto w-full bg-gray-500 my-4"></span>
                    <div class="flex flex-col gap-4">
                        <div class="flex flex-col gap-2">
                            <label for="score" class="text-xs md:text-sm font-semibold text-neutral-800">Nilai</label>
                            <input type="text" name="score" id="score" value="{{$upload->upload->score->score}}" class="bg-main focus:outline-none border border-neutral-300 text-neutral-800 rounded-lg p-2.5 text-sm">
                        </div>
                        <div class="flex flex-col gap-2">
                            <label for="comment" class="text-xs md:text-sm font-semibold text-neutral-800">Komentar</label>
                            <textarea id="comment" name="comment" class="bg-main focus:outline-none border border-neutral-300 text-neutral-800 rounded-lg p-2.5 text-sm">-</textarea>
                        </div>
                        <button type="submit" class="uppercase px-8 py-3.5 font-semibold rounded-lg w-full lg:w-auto block text-xs bg-indigo-600">Tambah Pertanyaan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-teacher-layout>