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
        <div class="dark-purple rounded-xl flex gap-2 px-3 py-4 my-4">
            <button id="ButtonEditTask" class="uppercase block text-xs px-4 py-3 rounded-lg font-bold bg-violet-800">edit judul Tugas</button>
        </div>

        <div id="modalEditTask" class="fixed z-50 hidden justify-center items-center w-full h-screen bg-black bg-opacity-70 top-0 left-0 ">
            <div class="bg-main rounded-xl w-2/3 sm:w-2/5 lg:w-1/3 inline-block">
                <form id="editForm" action="/upload/edit/{{$task->id}}" method="POST" class="flex flex-col p-4 gap-4">
                    @csrf
                    @method("PATCH")
                    <label class="text-sm font-medium" for="inputTask">Judul Tugas</label>
                    <input id="inputTask" class="bg-main focus:outline-none border border-white rounded-lg p-2.5 text-sm" type="text"  name="title" value="{{$task->title}}" placeholder="Masukan judul task">
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

        <h1 class="px-4 text-sm font-semibold my-4 uppercase">TUGAS {{$task->title}}</h1>
        
        <div class="flex flex-col md:flex-row gap-4">
            @if(!$memory)
                <div class="bg-main px-6 py-8 space-y-4 rounded-2xl w-full md:w-[70%] lg:w-[75%]">
                    <h2 class="text-gray-500">Anda belum membuat game</h2>
                    <span class="block h-[0.0625rem] mx-auto w-full bg-gray-600"></span>
                    <x-form-error name="images"/>
                    <x-form-error name="images.*"/>
                    <button id="addChallenge" class="uppercase block text-xs px-4 py-3 rounded-lg font-bold text-secondary bg-yellow-400">tambah pertanyaan</button>
                </div>
            @else
                <div class="order-2 md:order-1 w-full md:w-[70%] lg:w-[75%] space-y-2">
                    <div class="flex flex-col gap-3 justify-between bg-main px-4 py-6 rounded-2xl">
                        <div class="grid grid-cols-3 gap-2"> 
                            @if($memory)
                                @foreach (array_slice($memory->images, 0, 6) as $key => $image)
                                    <div class="w-full bg-neutral-800 p-2 rounded-lg">
                                        <img class="w-full rounded-lg" src="{{asset("$image")}}" alt="image memory game {{$key}}">
                                    </div>
                                @endforeach
                            @endif  
                        </div>
                        <div class="flex flex-col mt-2 gap-3">  
                            <div class="flex">
                                <button id="buttonEditChallenge" class="text-sky-400 font-semibold uppercase text-sm px-8 rounded-l-xl py-2 border border-r-0 border-sky-400">Edit</button>
                                <form action="/game/images/delete/{{$memory->id}}" method="POST">
                                    @csrf
                                    @method("DELETE")
                                    <button type="submit" class="font-semibold uppercase text-yellow-500 text-sm px-8 rounded-r-xl py-2 border border-yellow-500">Hapus</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="order-1 md:order-2 w-full md:w-[30%] lg:w-[25%] h-fit dark-green rounded-2xl p-4">
                    <h2 class="font-bold mb-2 text-4xl lg:text-5xl">{{"0"}}</h2>
                    <p class="text-sm mb-4">Siswa telah menyelesaikan game</p>
                    <a href="/teacher/recap/{{$lesson->id}}/{{$task->id}}/game" class="uppercase text-center block text-xs px-4 py-3 rounded-lg font-bold bg-yellow-500 text-black">lihat hasil</a>
                </div>
            @endif
        </div>
    </div>

    <div id="challenge_overlay" class="fixed hidden z-50 bg-black bg-opacity-70 w-full h-full top-0 left-0 overflow-scroll">
        <div id="modal_challenge" class="flex h-full justify-center items-center py-6">
            <form action="" method="POST" enctype="multipart/form-data" class="bg-main p-4 rounded-xl w-[80%] md:w-[60%]">
                @csrf
                <div class="flex justify-between">
                    <h2 class="text-sm md:text-base font-semibold">Buat Game</h2>
                    <img id="challenge_close" class="cursor-pointer" src="{{asset("img/close.svg")}}" alt="close image">
                </div>
                <span class="block h-[0.0625rem] mx-auto w-full bg-gray-500 my-4"></span>
                <div class="flex gap-2">
                    <div class="flex flex-col gap-2 mb-1 lg:mb-0">
                        <lable for="image" class="text-xs lg:text-sm font-semibold">Gambar</lable>
                        <input type="file" name="images[]" multiple id="image" class="py-2.5 px-3 border border-gray-500 rounded-xl text-sm">
                    </div>
                    <div class="flex items-end">
                        <button type="submit" class="uppercase px-8 py-3.5 font-semibold rounded-lg w-full lg:w-auto block text-xs bg-violet-800">Tambah Pertanyaan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div id="edit_challenge_overlay" class="fixed hidden z-50 bg-black bg-opacity-70 w-full h-full top-0 left-0 overflow-scroll">
        <div id="modal_edit_challenge" class="flex h-full justify-center items-center py-6">
            <form action="/game/images/edit/{{$task->id}}" method="POST" enctype="multipart/form-data" class="bg-main p-4 rounded-xl w-[80%] md:w-[60%]">
                @csrf
                @method("PATCH")
                <div class="flex justify-between">
                    <h2 class="text-sm md:text-base font-semibold">Edit Game</h2>
                    <img id="edit_challenge_close" class="cursor-pointer" src="{{asset("img/close.svg")}}" alt="close image">
                </div>
                <span class="block h-[0.0625rem] mx-auto w-full bg-gray-500 my-4"></span>
                <div class="grid grid-cols-3 gap-2 mb-2"> 
                    @if($memory)
                        @foreach (array_slice($memory->images, 0, 6) as $key => $image)
                            <div class="w-full bg-neutral-800 p-2 rounded-lg">
                                <img class="w-full rounded-lg" src="{{asset("$image")}}" alt="image memory game {{$key}}">
                            </div>
                        @endforeach
                    @endif  
                </div>
                <div class="flex gap-2">
                    <div class="flex flex-col gap-2 mb-1 lg:mb-0">
                        <lable for="image" class="text-xs lg:text-sm font-semibold">Gambar</lable>
                        <input type="file" name="images[]" multiple id="image" class="py-2.5 px-3 border border-gray-500 rounded-xl text-sm">
                    </div>
                    <div class="flex items-end">
                        <button type="submit" class="uppercase px-8 py-3.5 font-semibold rounded-lg w-full lg:w-auto block text-xs bg-violet-800">Edit Game</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-teacher-layout>