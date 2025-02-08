<x-teacher-layout title="Essay">
    <x-breadcrumbs :breadcrumbs="$breadcrumbs"/>
    <x-teacher-sub-nav 
        classPath="/teacher/class/{{$class->id}}" 
        activityPath="/teacher/{{$class->id}}/activity" 
        gradePath="/teacher/recap/{{$lesson->id}}/{{$task->id}}/essay" 
        studentPath="/teacher/{{$class->id}}/list/student" 
        settingPath="/teacher/{{$class->id}}/setting"
    />
    <div>
        <h1 class="px-4 text-sm font-semibold my-4 uppercase text-main">SOAL ESSAY {{$task->title}}</h1>
        <div class="bg-main shadow-md rounded-xl flex gap-2 px-3 py-4 mb-4">
            <button id="buttonCreateChallenge" class="uppercase block text-xs px-4 py-3 rounded-lg font-bold text-main bg-yellow-400">tambah pertanyaan</button>
            <button id="ButtonEditTask" class="uppercase block text-xs px-4 py-3 rounded-lg font-bold bg-button">edit judul soal {{$task->name}}</button>
            
            <x-form-error name="question"/>
        </div>

        <div id="modalEditTask" class="fixed hidden z-50 justify-center items-center w-full h-screen bg-black bg-opacity-70 top-0 left-0 ">
            <div class="bg-main shadow-md rounded-xl w-2/3 sm:w-2/5 lg:w-1/3 inline-block">
                <form id="editForm" action="/task/edit/{{$task->id}}" method="POST" class="flex flex-col p-4 gap-4">
                    @csrf
                    @method("PATCH")
                    <label class="text-lg font-semibold text-main" for="inputTask">Judul {{$task->name}}</label>
                    <input id="inputTask" class="bg-input focus:outline-none text-input placeholder:text-placehodler rounded-lg p-2.5 text-sm" type="text"  name="title" value="{{$task->title}}" placeholder="Masukan judul task">
                    <div class="flex justify-between">
                        <button type="submit" class="bg-button py-3 px-4 rounded-lg shadow-lg text-xs font-semibold">SIMPAN</button>
                        <button form="deleteForm" class="bg-red-600 py-3 px-4 rounded-lg shadow-lg text-xs font-semibold">HAPUS QUIZ</button>
                    </div>
                </form>
                <form action="/task/delete/{{$task->id}}" id="deleteForm" method="POST">
                    @csrf
                    @method("DELETE")
                </form>
            </div>
        </div>

        <div class="flex flex-col md:flex-row gap-4 mb-4">
            <div class="w-full md:w-[70%] lg:w-[75%] space-y-2">
                @foreach ($essays as $essay )
                <div>
                    <div id="essay" data-essayId="{{$essay->id}}" class="flex justify-between bg-main shadow-md px-3 py-4 rounded-2xl hover:bg-violet-700">
                        <h2 class="w-[96%] text-main">{{$loop->iteration}}. {{$essay->question}}</h2>
                        <div class="w-[4%] flex items-center justify-center">
                            <img id="essayArrow" class="w-[50%] items-center duration-300 ease-in-out" src="{{asset("image/arrow.png")}}" alt="arrow image">
                        </div>
                    </div>
                    <div id="essay{{$essay->id}}" class="bg-main shadow-md hidden px-3 py-4 rounded-b-2xl">
                        @if($essay->image)
                            <img class="h-44 mx-auto mb-2" src="{{asset("essays/$essay->image")}}" alt="question image">
                        @endif

                        <div class="flex mt-2">  
                            <button id="buttonEditEssay" data-id="{{$essay->id}}" data-question="{{$essay->question}}" class="buttonEditEssay text-sky-400 font-semibold uppercase text-sm px-8 rounded-l-xl py-2 border border-r-0 border-sky-400">Edit</button>
                            <form action="/essay/question/delete/{{$essay->id}}" method="POST">
                                @csrf
                                @method("DELETE")
                                <button type="submit" class="font-semibold uppercase text-yellow-500 text-sm px-8 rounded-r-xl py-2 border border-yellow-500">Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="w-full md:w-[30%] lg:w-[25%] h-fit bg-main shadow-md rounded-2xl p-4">
                <h2 class="font-bold mb-2 text-4xl lg:text-5xl text-main">{{$studentAnswered}}</h2>
                <p class="text-sm mb-4 text-main">Siswa telah mengerjakan Soal {{$task->type === 1 ? "Quiz" : "Test"}}</p>
                <a href="/teacher/recap/{{$lesson->id}}/{{$task->id}}/essay" class="uppercase text-center block text-xs px-4 py-3 rounded-lg font-bold bg-yellow-500 text-white">lihat hasil</a>
            </div>
        </div>

        <div id="create_challenge_overlay" class="fixed hidden z-50 bg-black bg-opacity-70 w-full h-full top-0 left-0 overflow-scroll">
            <div id="modal_create_challenge" class="flex h-full justify-center items-center py-6">
                <form action="" method="POST" enctype="multipart/form-data" class="bg-main p-4 rounded-xl w-[80%] md:w-[60%]">
                    @csrf
                    <div class="flex justify-between">
                        <h2 class="text-sm md:text-base font-semibold text-main">Tambah Soal</h2>
                        <img id="create_challenge_close" class="cursor-pointer" src="{{asset("img/close.svg")}}" alt="close image">
                    </div>
                    <span class="block h-[0.0625rem] mx-auto w-full bg-line my-4"></span>
                    <div class="flex flex-col gap-2 mb-4">
                        <label for="essay" class="text-xs md:text-sm font-semibold text-main">Pertanyaan</label>
                        <textarea id="essay" name="question" placeholder="buat pertanyaan" class="bg-input placeholder:text-placehodler focus:outline-none text-input rounded-lg p-2.5 text-sm"></textarea>
                    </div>
                    <div class="flex flex-col sm:flex-row gap-2">
                        <div class="flex flex-col gap-2">
                            <lable for="image" class="text-xs lg:text-sm font-semibold text-main">Gambar (opsional)</lable>
                            <input type="file" name="image" id="image" class="py-2.5 px-3 text-input bg-input rounded-xl text-sm">
                        </div>
                        <div class="flex items-end">
                            <button type="submit" class="uppercase px-8 py-3.5 font-semibold rounded-lg w-full lg:w-auto block text-xs bg-button">Tambah Pertanyaan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div id="edit_challenge_overlay" class="fixed hidden z-50 bg-black bg-opacity-70 w-full h-full top-0 left-0 overflow-scroll">
            <div id="modal_edit_challenge" class="flex h-full w-full justify-center items-center py-6">
                <form id="formEditEssay" action="" method="POST" enctype="multipart/form-data" class="bg-main p-4 rounded-xl w-[80%] md:w-[60%]">
                    @csrf
                    @method("PATCH")  
                    <div class="flex justify-between">
                        <h2 class="text-sm md:text-base font-semibold text-main">Tambah Soal</h2>
                        <img id="edit_challenge_close" class="cursor-pointer" src="{{asset("img/close.svg")}}" alt="close image">
                    </div>
                    <span class="block h-[0.0625rem] mx-auto w-full bg-line my-4"></span>
                    <div class="flex flex-col gap-2 mb-4">
                        <label for="essay" class="text-xs md:text-sm font-semibold text-main">Pertanyaan</label>
                        <textarea id="inputEditEssay" name="question" class="bg-input focus:outline-none text-input rounded-lg p-2.5 text-sm"></textarea>
                    </div>
                    <div class="flex flex-col sm:flex-row gap-2">
                        <div class="flex flex-col gap-2 lg:mb-0">
                            <lable for="image" class="text-xs lg:text-sm font-semibold text-main">Gambar (opsional)</lable>
                            <input type="file" name="image" id="editImage" class="py-2.5 px-3 text-input bg-input rounded-xl text-sm">
                        </div>
                        <div class="flex items-end">
                            <button type="submit" class="uppercase px-8 py-3.5 font-semibold rounded-lg w-full lg:w-auto block text-xs bg-button">simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
  </div>
</x-teacher-layout>