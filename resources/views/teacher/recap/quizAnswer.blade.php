<x-teacher-layout title="Rekap Nilai">
    <x-breadcrumbs :breadcrumbs="$breadcrumbs"/>
    <x-teacher-sub-nav 
        classPath="/teacher/class/{{$class->id}}" 
        activityPath="/teacher/{{$class->id}}/activity" 
        gradePath="/teacher/{{$class->id}}/recap" 
        studentPath="/teacher/{{$class->id}}/student" 
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
            </div>
            <div class="flex flex-col gap-1">
                <p>: {{$quiz->title}}</p>
                <p>: {{$user->name}}</p>
                <p>: {{$answers->first()->created_at->setTimezone('Asia/Jakarta')->format('d M Y (H:i T)')}}</p>
                <p>: {{$XP}} XP</p>
                <p>: {{$score}}</p>
            </div>
        </div>
        <h2 class="my-4 text-sm font-semibold">HASIL JAWABAN {{$quiz->title}}</h2>
        <div class="flex flex-col gap-4">
            @foreach ($quiz->multipleChoices as $quiz)
                <div class="p-4 bg-main rounded-xl space-y-2">
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
    </div>
</x-teacher-layout>