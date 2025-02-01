<x-student-layout title="Hasil Quiz">
    <x-breadcrumbs :breadcrumbs="$breadcrumbs"/>
    <x-student-sub-nav
        missionPath="/student/class/{{$class->id}}"
        leaderboardPath="/student/{{$class->id}}/leaderboard"
        activityPath="/student/{{$class->id}}/activity"
        informationPath="/student/{{$class->id}}/information"
        />
    <div class="mt-6">
        <div class="dark-green flex flex-col sm:flex-row rounded-xl pb-8 sm:pb-0">
            <div class="w-[85%] mx-auto sm:mx-0 sm:w-[40%]">
                <img class="w-full mx-auto" src="{{asset("img/vector/Grades-cuate.svg")}}" alt="image">
            </div>
            <div class="w-full sm:w-[60%] p-4 sm:pr-2 lg:pr-4 flex flex-col justify-center items-center sm:items-start gap-4">
                <h1 class="font-bold text-center sm:text-left text-lg sm:text-xl md:text-2xl lg:text-3xl">{{$task->type === 1 ? $task->title : "Kamu sudah mengerjakan soal tes $task->title"}}</h1>
                <p class="text-sm sm:text-base font-semibold">kamu mendapatkan reward {{$rewerdXP}} xp</p>
                <div class="bg-yellow-400 inline-block text-center py-5 px-16 sm:px-20 md:px-24 lg:px-28 md:space-y-3 lg:space-y-4">
                    <h2 class="font-bold text-2xl text-black">Nilaimu</h2>
                    <h3 class="font-bold text-3xl md:text-4xl lg:text-5xl text-black">{{$grade}}</h3>
                </div>
                @if($task->type === 2)
                    <p class="text-sm text-center sm:text-left">Kunci jawaban tes kamu tidak di tampilkan karena soal bersifat rahasia</p>
                @endif
            </div>
        </div>
        @if($task->type === 1) 
            <h2 class="font-bold text-2xl my-4 uppercase">hasil quiz</h2>
            <div class="flex flex-col gap-4">
                @foreach ($task->multipleChoices as $quiz)
                    <div class="p-4 bg-main rounded-xl space-y-2">
                        @if($quiz->image)
                            <img class="h-44" src="{{asset("mutiple_choices/$quiz->image")}}" alt="question image">
                        @endif
                        <h3 class="text-lg font-semibold">{{$quiz->question}}</h3>
                        <div>
                            <p class="{{$quiz->answer == 'a' ? "text-lime-500" : ""}}">A. {{$quiz->options['a']}}</p>
                            <p class="{{$quiz->answer == 'b' ? "text-lime-500" : ""}}">B. {{$quiz->options['b']}}</p>
                            <p class="{{$quiz->answer == 'c' ? "text-lime-500" : ""}}">C. {{$quiz->options['c']}}</p>
                            <p class="{{$quiz->answer == 'd' ? "text-lime-500" : ""}}">D. {{$quiz->options['d']}}</p>
                            <p class="{{$quiz->answer == 'e' ? "text-lime-500" : ""}}">E. {{$quiz->options['e']}}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif    
    </div>
</x-student-layout>