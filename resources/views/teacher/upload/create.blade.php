<x-teacher-layout title="{{$task->title}}">
    <x-breadcrumbs :breadcrumbs="$breadcrumbs"/>
    <x-teacher-sub-nav 
        classPath="/teacher/class/{{$class->id}}" 
        activityPath="/teacher/{{$class->id}}/activity" 
        gradePath="/teacher/recap/{{$lesson->id}}/{{$task->id}}/upload" 
        studentPath="/teacher/{{$class->id}}/student" 
        settingPath="/teacher/{{$class->id}}/setting"
    />
    <div>
        <div class="bg-main shadow-md rounded-xl flex gap-2 px-3 py-4 my-4">
            <button id="ButtonEditTask" class="uppercase block text-xs px-4 py-3 rounded-lg font-bold bg-button">edit judul Tugas</button>
        </div>

        <div id="modalEditTask" class="fixed z-50 hidden justify-center items-center w-full h-screen bg-black bg-opacity-70 top-0 left-0 ">
            <div class="bg-main rounded-xl w-2/3 sm:w-2/5 lg:w-1/3 inline-block">
                <form id="editForm" action="/task/edit/{{$task->id}}" method="POST" class="flex flex-col p-4 gap-4">
                    @csrf
                    @method("PATCH")
                    <label class="text-sm font-medium text-main" for="inputTask">Judul Tugas</label>
                    <input id="inputTask" class="bg-input focus:outline-none text-input placeholder:text-placehodler font-medium rounded-lg p-2.5 text-sm" type="text"  name="title" value="{{$task->title}}" placeholder="Masukan judul task">
                    <div class="flex justify-between">
                        <button type="submit" class="bg-violet-800 py-3 px-4 rounded-lg shadow-lg text-xs font-semibold">SIMPAN</button>
                        <button form="deleteForm" class="bg-red-600 py-3 px-4 rounded-lg shadow-lg text-xs font-semibold">HAPUS QUIZ</button>
                    </div>
                </form>
                <form action="/upload/delete/{{$task->id}}" id="deleteForm" method="POST">
                    @csrf
                    @method("DELETE")
                </form>
            </div>
        </div>

        <h1 class="px-4 text-sm font-semibold my-4 uppercase text-main">TUGAS {{$task->title}}</h1>
        
        <div class="flex flex-col md:flex-row gap-4 mb-4">
            @if(!$upload)
                <div class="bg-main shadow-md px-6 py-8 space-y-4 rounded-2xl w-full md:w-[70%] lg:w-[75%]">
                    <h2 class="text-secondary">Anda belum membuat pertanyaan</h2>
                    <span class="block h-[0.0625rem] mx-auto w-full bg-line"></span>
                    <button id="buttonCreateChallenge" class="uppercase block text-xs px-4 py-3 rounded-lg font-bold text-secondary bg-yellow-400">tambah pertanyaan</button>
                </div>
            @else
                <div class="w-full md:w-[70%] lg:w-[75%] space-y-2">
                    <div id="upload" class="flex flex-col gap-3 justify-between bg-main shadow-md px-4 py-6 rounded-2xl">
                        <h2 class="w-[96%] text-main">{{$upload->question}}</h2>
                        <div class="flex flex-col mt-2 gap-3">  
                            @if($upload->file)
                                <img class="w-44 mx-auto mb-2" src="{{asset("uploads/$upload->file")}}" alt="question image">
                            @endif
                            <div class="flex">
                                <button id="buttonEditChallenge" class="text-sky-400 font-semibold uppercase text-sm px-8 rounded-l-xl py-2 border border-r-0 border-sky-400">Edit</button>
                                <form action="/upload/question/delete/{{$upload->id}}" method="POST">
                                    @csrf
                                    @method("DELETE")
                                    <button type="submit" class="font-semibold uppercase text-yellow-500 text-sm px-8 rounded-r-xl py-2 border border-yellow-500">Hapus</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full md:w-[30%] lg:w-[25%] h-fit bg-main shadow-md rounded-2xl p-4">
                    <h2 class="font-bold mb-2 text-4xl lg:text-5xl text-main">{{$uploadAnswered}}</h2>
                    <p class="text-sm mb-4 text-main">Siswa telah mengumpulkan tugas</p>
                    <a href="/teacher/recap/{{$lesson->id}}/{{$task->id}}/upload" class="uppercase text-center block text-xs px-4 py-3 rounded-lg font-bold bg-yellow-500 text-white">lihat hasil</a>
                </div>
            @endif
        </div>
    </div>

    <div id="create_challenge_overlay" class="fixed hidden z-50 bg-black bg-opacity-70 w-full h-full top-0 left-0 overflow-scroll">
        <div id="modal_create_challenge" class="flex h-full justify-center items-center py-6">
            <form action="" method="POST" enctype="multipart/form-data" class="bg-main p-4 rounded-xl w-[80%] md:w-[60%]">
                @csrf
                <div class="flex justify-between">
                    <h2 class="text-sm md:text-base font-semibold text-main">Buat Tugas</h2>
                    <img id="create_challenge_close" class="cursor-pointer" src="{{asset("img/close.svg")}}" alt="close image">
                </div>
                <span class="block h-[0.0625rem] mx-auto w-full bg-line my-4"></span>
                <div class="flex flex-col gap-2 mb-4">
                    <label for="question" class="text-xs md:text-sm font-semibold text-main">Deskripsi Tugas</label>
                    <textarea id="question" name="question" placeholder="Tulis Pertanyaan" class="bg-input focus:outline-none text-input placeholder:text-placehodler rounded-lg p-2.5 text-sm"></textarea>
                </div>
                <div class="flex flex-col sm:flex-row gap-2">
                    <div class="flex flex-col gap-2 lg:mb-0">
                        <lable for="file" class="text-xs lg:text-sm font-semibold text-main">Gambar (opsional)</lable>
                        <input type="file" name="file" id="file" class="py-2.5 px-3 text-input bg-input rounded-lg text-sm">
                    </div>
                    <div class="flex items-end">
                        <button type="submit" class="uppercase px-8 py-3.5 font-semibold rounded-lg w-full lg:w-auto block text-xs bg-button">Tambah Pertanyaan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    @if($upload)
        <div id="edit_challenge_overlay" class="fixed hidden z-50 bg-black bg-opacity-70 w-full h-full top-0 left-0 overflow-scroll">
            <div id="modal_edit_challenge" class="flex h-full justify-center items-center py-6">
                <form action="/upload/question/edit/{{$upload->id}}" method="POST" enctype="multipart/form-data" class="bg-main p-4 rounded-lg w-[80%] md:w-[60%]">
                    @csrf
                    @method("PATCH")
                    <div class="flex justify-between">
                        <h2 class="text-sm md:text-base font-semibold text-main">Buat Tugas</h2>
                        <img id="edit_challenge_close" class="cursor-pointer" src="{{asset("img/close.svg")}}" alt="close image">
                    </div>
                    <span class="block h-[0.0625rem] mx-auto w-full bg-line my-4"></span>
                    <div class="flex flex-col gap-2 mb-4">
                        <label for="question" class="text-xs md:text-sm font-semibold text-main">Deskripsi Tugas</label>
                        <textarea id="question" name="question" class="bg-input focus:outline-none text-input rounded-lg p-2.5 text-sm">{{$upload->question}}</textarea>
                    </div>
                    <div class="flex flex-col sm:flex-row gap-2">
                        <div class="flex flex-col gap-2 lg:mb-0">
                            <lable for="file" class="text-xs lg:text-sm font-semibold text-main">Gambar (opsional)</lable>
                            <input type="file" name="file" id="file" class="py-2.5 px-3 bg-input text-input rounded-xl text-sm">
                        </div>
                        <div class="flex items-end">
                            <button type="submit" class="uppercase px-8 py-3.5 font-semibold rounded-lg w-full lg:w-auto block text-xs bg-button">Tambah Pertanyaan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    @endif
</x-teacher-layout>