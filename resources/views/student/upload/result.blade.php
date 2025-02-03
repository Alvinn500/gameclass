<x-student-layout title="Hasil Essay">
    <x-breadcrumbs :breadcrumbs="$breadcrumbs"/>
    <x-student-sub-nav
        missionPath="/student/class/{{$class->id}}"
        leaderboardPath="/student/{{$class->id}}/leaderboard"
        activityPath="/student/{{$class->id}}/activity"
        informationPath="/student/{{$class->id}}/information"
        />
        <div class="my-6">
            <div class="dark-green shadow-md flex flex-col sm:flex-row rounded-xl pb-8 sm:pb-0">
                {{-- <div class="w-[85%] mx-auto sm:mx-0 sm:w-[40%]">
                    <img class="w-full mx-auto" src="{{asset("img/vector/Grades-cuate.svg")}}" alt="image">
                </div> --}}
                <div class="w-full p-4 sm:pr-2 lg:pr-4 flex flex-col justify-center items-center gap-4">
                    <h1 class="font-bold text-center sm:text-left text-lg sm:text-xl md:text-2xl lg:text-3xl text-neutral-800">Kamu sudah mengumpulkan jawaban {{$task->title}}</h1>
                    @if($task->upload->scores->where("user_id", Auth::user()->id)->first()->status === 0)
                        <p class="text-sm sm:text-base text-center sm:text-left font-semibold text-neutral-800">Jawabanmu belum dikoreksi, reward XP akan diberikan setelah jawabanmu dinilai</p>
                    @else
                        <p class="text-sm sm:text-base font-semibold text-neutral-800">kamu mendapatkan reward {{$user->uploadScores->where('user_id', Auth::user()->id)->first()->XP ?? 0}} XP</p>    
                        <div class="bg-yellow-400 inline-block text-center py-5 px-16 sm:px-20 md:px-24 lg:px-28 md:space-y-3 lg:space-y-4">
                            <h2 class="font-bold text-2xl text-neutral-800">Nilaimu</h2>
                            <h3 class="font-bold text-3xl md:text-4xl lg:text-5xl text-neutral-800">{{$user->uploadScores->where('user_id', Auth::user()->id)->first()->score ?? 0}}</h3>
                        </div>
                        <div class="bg-secondary p-4 w-80">
                            <h2 class="text-yellow-400 font-semibold uppercase">Komentar</h2>
                            <p class="text-neutral-800 font-medium">{{$user->uploadScores->where('user_id', Auth::user()->id)->first()->comment ?? "-"}}</p>
                        </div>
                    @endif
                </div>
            </div>
            <h2 class="font-bold text-xl md:text-2xl my-4 uppercase text-neutral-800">Jawaban kamu</h2>
            <div class="flex flex-col gap-5">
                <div class="p-4 dark-blue shadow-md rounded-xl space-y-4">
                    <p class="text-yellow-500 uppercase text-sm">pertanyaan</p>
                    <h3 class="text-base font-semibold text-neutral-800">{{$task->upload->question}}</h3>
                    @if($task->upload->file)
                        <img class="rounded-xl h-64" src="{{asset("uploads/" . $task->upload->file)}}" alt="img">
                    @endif
                    <a href="{{asset("uploads/" . $user->uploadAnswers->where("upload_id", $task->upload->id)->first()->file)}}" target="_blank" class="bg-indigo-600 inline-block text-sm font-semibold uppercase py-3 px-8 mb-2 rounded-lg">lihat jawabanmu</a>
                </div>
            </div>
        </div>
</x-student-layout>