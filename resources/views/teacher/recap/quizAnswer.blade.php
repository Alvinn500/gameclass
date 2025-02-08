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
        <h1 class="my-4 text-sm font-semibold text-main">IDENTITAS</h1>
        <div class="flex gap-6 min-w-full p-4 rounded-xl bg-main shadow-md">
            <div class="flex flex-col gap-1">
                <h2 class="text-main font-medium">Judul Soal</h2>
                <h2 class="text-main font-medium">Nama</h2>
                <h2 class="text-main font-medium">Selesai</h2>
                <h2 class="text-main font-medium">Reward</h2>
                <h2 class="text-main font-medium">Nilai</h2>
            </div>
            <div class="flex flex-col gap-1">
                <p class="text-main font-medium">: {{$quiz->title}}</p>
                <p class="text-main font-medium">: {{$user->name}}</p>
                <p class="text-main font-medium">: {{$answers->first()->created_at->setTimezone('Asia/Jakarta')->format('d M Y (H:i T)')}}</p>
                <p class="text-main font-medium">: {{$XP}} XP</p>
                <p class="text-main font-medium">: {{$score}}</p>
            </div>
        </div>
        <h2 class="my-4 text-sm font-semibold text-main">HASIL JAWABAN {{$user->name}}</h2>
        <div class="flex flex-col gap-4">
            @foreach ($quiz->multipleChoices as $quiz)
                <div class="p-4 bg-main shadow-md rounded-xl space-y-2">
                    <h3 class="font-semibold text-main">{{$quiz->question}}</h3>
                    <div>
                        <p class="{{$quiz->answer == 'a' ? "text-link" : "text-main"}}">A. {{$quiz->options['a']}}</p>
                        <p class="{{$quiz->answer == 'b' ? "text-link" : "text-main"}}">B. {{$quiz->options['b']}}</p>
                        <p class="{{$quiz->answer == 'c' ? "text-link" : "text-main"}}">C. {{$quiz->options['c']}}</p>
                        <p class="{{$quiz->answer == 'd' ? "text-link" : "text-main"}}">D. {{$quiz->options['d']}}</p>
                        <p class="{{$quiz->answer == 'e' ? "text-link" : "text-main"}}">E. {{$quiz->options['e']}}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-teacher-layout>