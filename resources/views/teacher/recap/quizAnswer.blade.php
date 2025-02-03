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
            </div>
            <div class="flex flex-col gap-1">
                <p class="text-neutral-800 font-medium">: {{$quiz->title}}</p>
                <p class="text-neutral-800 font-medium">: {{$user->name}}</p>
                <p class="text-neutral-800 font-medium">: {{$answers->first()->created_at->setTimezone('Asia/Jakarta')->format('d M Y (H:i T)')}}</p>
                <p class="text-neutral-800 font-medium">: {{$XP}} XP</p>
                <p class="text-neutral-800 font-medium">: {{$score}}</p>
            </div>
        </div>
        <h2 class="my-4 text-sm font-semibold text-neutral-800">HASIL JAWABAN {{$user->name}}</h2>
        <div class="flex flex-col gap-4">
            @foreach ($quiz->multipleChoices as $quiz)
                <div class="p-4 bg-main shadow-md rounded-xl space-y-2">
                    <h3 class="font-semibold text-neutral-800">{{$quiz->question}}</h3>
                    <div>
                        <p class="{{$quiz->answer == 'a' ? "text-lime-500" : "text-neutral-800"}}">A. {{$quiz->options['a']}}</p>
                        <p class="{{$quiz->answer == 'b' ? "text-lime-500" : "text-neutral-800"}}">B. {{$quiz->options['b']}}</p>
                        <p class="{{$quiz->answer == 'c' ? "text-lime-500" : "text-neutral-800"}}">C. {{$quiz->options['c']}}</p>
                        <p class="{{$quiz->answer == 'd' ? "text-lime-500" : "text-neutral-800"}}">D. {{$quiz->options['d']}}</p>
                        <p class="{{$quiz->answer == 'e' ? "text-lime-500" : "text-neutral-800"}}">E. {{$quiz->options['e']}}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-teacher-layout>