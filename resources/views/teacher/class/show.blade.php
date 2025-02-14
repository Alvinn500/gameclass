<x-teacher-layout title="{{$class->study_name }} - {{$class->class}}">
    <x-breadcrumbs :breadcrumbs="$breadcrumbs"/>
    <x-teacher-sub-nav 
        classPath="/teacher/class/{{$class->id}}" 
        activityPath="/teacher/{{$class->id}}/activity" 
        gradePath="/teacher/{{$class->id}}/recap" 
        studentPath="/teacher/{{$class->id}}/list/student" 
        settingPath="/teacher/{{$class->id}}/setting"
    />
    <div class="h-full px-2 mt-5 relative">
        <h4 class="text-base font-semibold mb-5 text-main">CP</h4>
        <div class="flex flex-col md:flex-row gap-6 h-full">
            <div class="flex flex-col gap-4 w-full md:w-[74%] order-2 md:order-1">
                @foreach ($lessons as $lesson )
                    <div class="bg-main shadow-md p-5 flex flex-col justify-center rounded-xl">
                        <h2 class="font-semibold text-lg text-main">{{$lesson->name}}</h2>
                        <span class="block h-[0.0625rem] my-4 mx-auto w-full bg-line"></span>
                        <div class="mb-3 flex flex-col gap-2">
                            @php
                                $counter = 1;
                            @endphp

                                @foreach ($lesson->subjects as $subject)
                                    <a href="/teacher/lesson/{{$lesson->id}}/subject/{{$subject->id}}" class="text-sm font-semibold text-main">
                                        {{$counter++}}. Materi: {{$subject->title}}
                                    </a>
                                @endforeach
                            
                                @foreach ($lesson->tasks->where("type", "1") as $quiz)
                                    <a href="/teacher/{{$class->id}}/{{$lesson->id}}/{{$quiz->id}}/quiz/create" class="text-sm font-semibold text-main">
                                        {{$counter++}}. Quiz: {{$quiz->title}}
                                    </a>
                                @endforeach

                                @foreach ($lesson->tasks->where("type", "2") as $quiz)
                                    <a href="/teacher/{{$class->id}}/{{$lesson->id}}/{{$quiz->id}}/quiz/create" class="text-sm font-semibold text-main">
                                        {{$counter++}}. Test: {{$quiz->title}}
                                    </a>
                                @endforeach

                                @foreach ($lesson->tasks->where("type", "3") as $essay)
                                    <a href="/teacher/{{$class->id}}/{{$lesson->id}}/{{$essay->id}}/essay/create" class="text-sm font-semibold text-main">
                                        {{$counter++}}. Essay: {{$essay->title}}
                                    </a>
                                @endforeach

                                @foreach ($lesson->tasks->where("type", "4") as $upload)
                                    <a href="/teacher/{{$class->id}}/{{$lesson->id}}/{{$upload->id}}/upload/create" class="text-sm font-semibold text-main">
                                        {{$counter++}}. Upload: {{$upload->title}}
                                    </a>
                                @endforeach

                                @foreach ($lesson->tasks->where("type", "5") as $game)
                                    <a href="/teacher/{{$class->id}}/{{$lesson->id}}/{{$game->id}}/game/create" class="text-sm font-semibold text-main">
                                        {{$counter++}}. game: {{$game->title}}
                                    </a>
                                @endforeach
                        </div>
                        <div class="flex items-center text-link">
                            <a href="/teacher/lesson/{{$lesson->id}}/subject" class="uppercase border border-primary rounded-r-none rounded-lg p-2 m-0 text-xs font-semibold">+tambah materi</a>
                            <a href="/teacher/{{$class->id}}/{{$lesson->id}}/task/create" class="uppercase border-t border-primary border-b p-2 m-0 text-xs font-semibold">+tambah soal</a>
                            <button id="editLesson" data-name="{{$lesson->name}}" data-lessonId="{{$lesson->id}}" data-classId="{{$class->id}}" class="uppercase border border-primary rounded-r-md p-2 m-0 text-xs font-semibold">edit cp</button>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="w-full md:w-[25%] order-1 md:order-2">
                <div class="bg-main shadow-md p-5 rounded-xl text-center">
                    <h2 class="text-base font-semibold text-main">Jumlah CP</h2>
                    <p class="text-4xl font-bold my-4 text-main">{{$lessons->count()}}</p>
                    <x-form-error name="lesson_name"/>
                    <button id="addLesson" class="uppercase px-6 py-2.5 text-xs font-bold bg-button text-main rounded-lg">+tambah cp</button>
                </div>
            </div>
        
        </div>
    </div>
    <div id="modalCreate" class="fixed z-50 hidden justify-center items-center w-full h-screen bg-black  bg-opacity-70 top-0 left-0 ">
        <div class="bg-main rounded-xl w-2/3 sm:w-2/5 lg:w-1/3 inline-block">
            <form action="" method="POST" class="flex flex-col p-4 gap-4">
                @csrf
                <label class="text-lg font-semibold text-main" for="lesson">Masukan Nama CP</label>
                <input class="bg-input focus:outline-none text-input placeholder:text-placehodler rounded-lg p-2.5 text-sm" type="text" id="lesson" name="lesson_name" placeholder="Masukan Nama CP">
                <button type="submit" class="bg-button py-2 rounded-lg text-sm font-semibold">TAMBAH CP</button>
            </form>
        </div>
    </div>

    <div id="modalEdit" class="fixed z-50 hidden justify-center items-center w-full h-screen bg-black  bg-opacity-70 top-0 left-0 ">
        <div class="bg-main rounded-xl w-2/3 sm:w-2/5 lg:w-1/3 inline-block">
            <form id="editForm" action="" method="POST" class="flex flex-col p-4 gap-4">
                @csrf
                @method("PATCH")
                <label class="text-lg font-semibold text-main" for="lesson">Masukan Nama CP</label>
                <input id="inputLesson" class="bg-input focus:outline-none text-input placeholder:text-placehodler rounded-lg p-2.5 text-sm" type="text" id="lesson" name="lesson_name" value="" placeholder="Masukan Nama CP">
                <div class="flex justify-between">
                    <button type="submit" class="bg-button py-3 px-4 rounded-lg shadow-lg text-xs font-semibold">EDIT NAMA CP</button>
                    <button form="deleteForm" class="bg-red-600 py-3 px-4 rounded-lg shadow-lg text-xs font-semibold">HAPUS CP</button>
                </div>
            </form>
            <form action="" id="deleteForm" method="POST">
                @csrf
                @method("DELETE")
            </form>
        </div>
    </div>
</x-teacher-layout>
