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
        <h1 class="px-4 text-sm font-semibold my-4 uppercase text-neutral-800">SOAL ESSAY {{$task->title}}</h1>
        <div class="dark-purple shadow-md rounded-xl flex gap-2 px-3 py-4 mb-4">
            <button id="addEssay" class="uppercase block text-xs px-4 py-3 rounded-lg font-bold text-secondary bg-yellow-400">tambah pertanyaan</button>
            <button id="editEssay" class="uppercase block text-xs px-4 py-3 rounded-lg font-bold bg-indigo-600">edit judul soal Essay</button>
        </div>

        <div id="modalEditTaskEssay" class="fixed z-50 hidden justify-center items-center w-full h-screen bg-black bg-opacity-70 top-0 left-0 ">
            <div class="bg-main rounded-xl w-2/3 sm:w-2/5 lg:w-1/3 inline-block">
                <form id="editForm" action="/essay/edit/{{$task->id}}" method="POST" class="flex flex-col p-4 gap-4">
                    @csrf
                    @method("PATCH")
                    <label class="text-lg font-medium text-neutral-800" for="inputTask">Judul {{$task->type === 1 ? "Quiz" : "Test"}}</label>
                    <input id="inputTask" class="bg-main focus:outline-none border border-neutral-300 text-neutral-800 placeholder:text-neutral-500 rounded-lg p-2.5 text-sm" type="text"  name="title" value="{{$task->title}}" placeholder="Masukan judul task">
                    <div class="flex justify-between">
                        <button type="submit" class="bg-indigo-600 py-3 px-4 rounded-lg shadow-lg text-xs font-semibold">SIMPAN</button>
                        <button form="deleteForm" class="bg-red-600 py-3 px-4 rounded-lg shadow-lg text-xs font-semibold">HAPUS QUIZ</button>
                    </div>
                </form>
                <form action="/essay/delete/{{$task->id}}" id="deleteForm" method="POST">
                    @csrf
                    @method("DELETE")
                </form>
            </div>
        </div>

        <div class="flex flex-col md:flex-row gap-4 mb-4">
            <div class="order-2 md:order-1 w-full md:w-[70%] lg:w-[75%] space-y-2">
                @foreach ($essays as $essay )
                <div>
                    <div id="essay" data-essayId="{{$essay->id}}" class="flex justify-between bg-main shadow-md px-3 py-4 rounded-2xl hover:bg-neutral-200">
                        <h2 class="w-[96%] text-neutral-800">{{$loop->iteration}}. {{$essay->question}}</h2>
                        <div class="w-[4%] flex items-center justify-center">
                            <img id="essayArrow" class="w-[50%] items-center" src="{{asset("image/arrow.png")}}" alt="arrow image">
                        </div>
                    </div>
                    <div id="essay{{$essay->id}}" class="bg-main shadow-md hidden px-3 py-4 rounded-b-2xl">
                        @if($essay->image)
                            <img class="h-44 mx-auto mb-2" src="{{asset("essays/$essay->image")}}" alt="question image">
                        @endif

                        <div class="flex mt-2">  
                            <button id="buttonEditEssay" data-essayId="{{$essay->id}}" data-question="{{$essay->question}}" class="buttonEditEssay text-sky-400 font-semibold uppercase text-sm px-8 rounded-l-xl py-2 border border-r-0 border-sky-400">Edit</button>
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
            <div class="order-1 md:order-2 w-full md:w-[30%] lg:w-[25%] h-fit dark-green shadow-md rounded-2xl p-4">
                <h2 class="font-bold mb-2 text-4xl lg:text-5xl text-neutral-800">{{$studentAnswered}}</h2>
                <p class="text-sm mb-4 text-neutral-800">Siswa telah mengerjakan Soal {{$task->type === 1 ? "Quiz" : "Test"}}</p>
                <a href="/teacher/recap/{{$lesson->id}}/{{$task->id}}/essay" class="uppercase text-center block text-xs px-4 py-3 rounded-lg font-bold bg-yellow-500 text-white">lihat hasil</a>
            </div>
        </div>

        <div id="parent_essay_overlay" class="fixed hidden z-50 bg-black bg-opacity-70 w-full h-full top-0 left-0 overflow-scroll">
            <div id="essay_overlay" class="flex h-full justify-center items-center py-6">
                <form action="" method="POST" enctype="multipart/form-data" class="bg-main p-4 rounded-xl w-[80%] md:w-[60%]">
                    @csrf
                    <div class="flex justify-between">
                        <h2 class="text-sm md:text-base font-semibold text-neutral-800">Tambah Soal</h2>
                        <img id="essay_close" class="cursor-pointer" src="{{asset("img/close.svg")}}" alt="close image">
                    </div>
                    <span class="block h-[0.0625rem] mx-auto w-full bg-gray-500 my-4"></span>
                    <div class="flex flex-col gap-2 mb-4">
                        <label for="essay" class="text-xs md:text-sm font-semibold text-neutral-800">Pertanyaan</label>
                        <textarea id="essay" name="question" class="bg-main focus:outline-none border border-neutral-300 text-neutral-800 rounded-lg p-2.5 text-sm"></textarea>
                    </div>
                    <div class="flex gap-2">
                        <div class="flex flex-col gap-2 mb-1 lg:mb-0">
                            <lable for="image" class="text-xs lg:text-sm font-semibold text-neutral-800">Gambar (opsional)</lable>
                            <input type="file" name="image" id="image" class="py-2.5 px-3 border border-neutral-300 text-neutral-800 rounded-xl text-sm">
                        </div>
                        <div class="flex items-end">
                            <button type="submit" class="uppercase px-8 py-3.5 font-semibold rounded-lg w-full lg:w-auto block text-xs bg-indigo-600">Tambah Pertanyaan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div id="parent_edit_essay_overlay" class="fixed hidden z-50 bg-black bg-opacity-70 w-full h-full top-0 left-0 overflow-scroll">
            <div id="edit_essay_overlay" class="flex h-full w-full justify-center items-center py-6">
                <form id="formEditEssay" action="" method="POST" enctype="multipart/form-data" class="bg-main p-4 rounded-xl w-[80%] md:w-[60%]">
                    @csrf
                    @method("PATCH")  
                    <div class="flex justify-between">
                        <h2 class="text-sm md:text-base font-semibold text-neutral-800">Tambah Soal</h2>
                        <img id="edit_essay_close" class="cursor-pointer" src="{{asset("img/close.svg")}}" alt="close image">
                    </div>
                    <span class="block h-[0.0625rem] mx-auto w-full bg-gray-500 my-4"></span>
                    <div class="flex flex-col gap-2 mb-4">
                        <label for="essay" class="text-xs md:text-sm font-semibold text-neutral-800">Pertanyaan</label>
                        <textarea id="inputEditEssay" name="question" class="bg-main focus:outline-none border border-neutral-300 text-neutral-800 rounded-lg p-2.5 text-sm"></textarea>
                    </div>
                    <div class="flex gap-2">
                        <div class="flex flex-col gap-2 mb-1 lg:mb-0">
                            <lable for="image" class="text-xs lg:text-sm font-semibold text-neutral-800">Gambar (opsional)</lable>
                            <input type="file" name="image" id="editImage" class="py-2.5 px-3 border border-neutral-300 text-neutral-800 rounded-xl text-sm">
                        </div>
                        <div class="flex items-end">
                            <button type="submit" class="uppercase px-8 py-3.5 font-semibold rounded-lg w-full lg:w-auto block text-xs bg-indigo-600">simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
  </div>
</x-teacher-layout>