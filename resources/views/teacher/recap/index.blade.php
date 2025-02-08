<x-teacher-layout title="{{$class->study_name}} - {{$class->class}}">
    <x-breadcrumbs :breadcrumbs="$breadcrumbs"/>
    <x-teacher-sub-nav 
        classPath="/teacher/class/{{$class->id}}" 
        activityPath="/teacher/{{$class->id}}/activity" 
        gradePath="/teacher/{{$class->id}}/recap" 
        studentPath="/teacher/{{$class->id}}/list/student" 
        settingPath="/teacher/{{$class->id}}/setting"
    />
    <div>
        <h1 class="uppercase font-semibold text-sm my-4 text-main">Rekap nilai</h1>
        <div class="space-y-4">
            @if($lessons->count() == 0)
                <div class="bg-main shadow-md rounded-xl p-6">
                    <h2 class="py-1 text-sm text-secondary font-semibold">Belum ada rekap nilai</h2>
                </div>
            @endif
            @foreach ($lessons as $lesson)
                <div class="bg-main shadow-md rounded-xl p-6">
                    <h2 class="font-semibold text-main">{{$lesson->name}}</h2>
                    <span class="block h-[0.0625rem] my-4 mx-auto w-full bg-line"></span>
                    <div class="flex flex-col gap-2 font-medium">
                        @php
                            $counter = 1;
                        @endphp
        
                        @foreach ($lesson->subjects as $subject)
                            <a href="/teacher/recap/{{$lesson->id}}/{{$subject->id}}/subject" class="text-sm font-semibold text-main">
                                {{$counter++}}. Materi: {{$subject->title}}
                            </a>
                        @endforeach
                    
                        @foreach ($lesson->tasks->where("type", "1") as $quiz)
                            <a href="/teacher/recap/{{$lesson->id}}/{{$quiz->id}}/quiz" class="text-sm font-semibold text-main">
                                {{$counter++}}. Quiz: {{$quiz->title}}
                            </a>
                        @endforeach
        
                        @foreach ($lesson->tasks->where("type", "2") as $quiz)
                            <a href="/teacher/recap/{{$lesson->id}}/{{$quiz->id}}/quiz" class="text-sm font-semibold text-main">
                                {{$counter++}}. Test: {{$quiz->title}}
                            </a>
                        @endforeach
        
                        @foreach ($lesson->tasks->where("type", "3") as $essay)
                            <a href="/teacher/recap/{{$lesson->id}}/{{$essay->id}}/essay" class="text-sm font-semibold text-main">
                                {{$counter++}}. Essay: {{$essay->title}}
                            </a>
                        @endforeach
        
                        @foreach ($lesson->tasks->where("type", "4") as $upload)
                            <a href="/teacher/recap/{{$lesson->id}}/{{$upload->id}}/upload" class="text-sm font-semibold text-main">
                                {{$counter++}}. Upload: {{$upload->title}}
                            </a>
                        @endforeach
                    
                        @foreach ($lesson->tasks->where("type", "5") as $game)
                            <a href="/teacher/recap/{{$lesson->id}}/{{$game->id}}/game" class="text-sm font-semibold text-main">
                                {{$counter++}}. game: {{$game->title}}
                            </a>
                        @endforeach
                    </div>
                </div>    
            @endforeach
        </div>
    </div>
</x-teacher-layout>