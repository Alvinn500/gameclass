<x-teacher-layout title="{{$task->title}}">
    <x-breadcrumbs :breadcrumbs="$breadcrumbs"/>
    <x-teacher-sub-nav 
        classPath="/teacher/class/{{$class->id}}" 
        activityPath="/teacher/{{$class->id}}/activity" 
        gradePath="/teacher/recap/{{$lesson->id}}/{{$task->id}}/game" 
        studentPath="/teacher/{{$class->id}}/list/student" 
        settingPath="/teacher/{{$class->id}}/setting"
    />
    <div>
        <div class="dark-purple shadow-md rounded-xl flex gap-2 px-3 py-4 my-4">
            <button id="ButtonEditTask" class="uppercase block text-xs px-4 py-3 rounded-lg font-bold bg-indigo-600">edit judul Tugas</button>
        </div>

        <div id="modalEditTask" class="fixed z-50 hidden justify-center items-center w-full h-screen bg-black bg-opacity-70 top-0 left-0 ">
            <div class="bg-main rounded-xl w-2/3 sm:w-2/5 lg:w-1/3 inline-block">
                <form id="editForm" action="/upload/edit/{{$task->id}}" method="POST" class="flex flex-col p-4 gap-4">
                    @csrf
                    @method("PATCH")
                    <label class="text-sm font-medium text-neutral-800" for="inputTask">Judul Tugas</label>
                    <input id="inputTask" class="bg-main focus:outline-none font-medium border border-neutral-200 text-neutral-800 placeholder:text-neutral-500 rounded-lg p-2.5 text-sm" type="text"  name="title" value="{{$task->title}}" placeholder="Masukan judul task">
                    <div class="flex justify-between">
                        <button type="submit" class="bg-indigo-600 py-3 px-4 rounded-lg shadow-lg text-xs font-semibold">SIMPAN</button>
                        <button form="deleteForm" class="bg-red-600 py-3 px-4 rounded-lg shadow-lg text-xs font-semibold">HAPUS QUIZ</button>
                    </div>
                </form>
                <form action="/upload/delete/{{$task->id}}" id="deleteForm" method="POST">
                    @csrf
                    @method("DELETE")
                </form>
            </div>
        </div>

        <h1 class="px-4 text-sm font-semibold my-4 uppercase text-neutral-800">TUGAS {{$task->title}}</h1>
        
        <div class="flex flex-col md:flex-row gap-4">
            @if(!$memory)
                <div class="bg-main shadow-md px-6 py-8 rounded-2xl w-full md:w-[70%] lg:w-[75%]">
                    <div id="emptyGame" class="space-y-4">
                        <h2 class="text-neutral-500">Anda belum membuat game</h2>
                        <span class="block h-[0.0625rem] mx-auto w-full bg-gray-600"></span>
                        <x-form-error name="images"/>
                        <x-form-error name="images.*"/>
                        <button id="addGame" class="uppercase block text-xs px-4 py-3 rounded-lg font-bold text-secondary bg-yellow-400">tambah pertanyaan</button>
                    </div>        
                    <div id="addImageGame" class="hidden">
                        <form action="" method="POST" enctype="multipart/form-data">
                           @csrf
                           <h2 class="text-sm md:text-base font-semibold text-neutral-800">Tambahkan 6 Gambar</h2>
                           <span class="block h-[0.0625rem] mx-auto w-full bg-gray-500 my-4"></span>
                           <div class="flex items-center gap-2">
                               <div class="flex flex-col gap-2 mb-1 lg:mb-0">
                                   <lable for="image" class="text-xs lg:text-sm font-semibold text-neutral-800">Gambar</lable>
                                   <div class="flex items-center gap-2">
                                       <input type="file" name="images[]" multiple id="image" class="py-2.5 px-3 border border-neutral-300 text-neutral-800 rounded-xl text-sm">
                                       <button type="submit" class="uppercase px-8 py-3.5 font-semibold rounded-lg w-full lg:w-auto block text-xs bg-indigo-600">Tambah Pertanyaan</button>
                                   </div>
                                   <x-form-error name="images"/>
                               </div>
                           </div>
                       </form>
                    </div>           
                </div>
            @endif
            @if($memory)     
                <div class="order-2 md:order-1 w-full px-4 py-5 rounded-2xl mb-6 bg-main shadow-md md:w-[70%] lg:w-[75%] space-y-2">
                    @if(!$memory->questions)
                        <div class="flex flex-col gap-3 justify-between">
                            <h1 class="font-medium text-sm text-neutral-800">Buat pertanyaan masing masing gambar <span class="text-lime-500">(contoh: Apa fungsi dari gambar tersebut)</span></h1>
                            <form action="" method="POST" class="flex flex-col gap-4">
                                @csrf
                                @if($memory)
                                    @foreach (array_slice($memory->images, 0, 6) as $key => $image)
                                        <div class="flex flex-col gap-2">
                                            <div class="w-[40%] flex justify-center items-center bg-neutral-200 p-8 rounded-lg">
                                                <img class="w-[60%] rounded-lg" src="{{asset("$image")}}" alt="image memory game {{$key}}">
                                            </div>
                                            <input type="text" name="question{{$key}}" id="question{{$key}}" value="{{old("question$key")}}" placeholder="Apa fungsi dari gambar di atas?" class="bg-white text-neutral-800 border border-neutral-300 focus:outline-none p-2 text-sm rounded-md placeholder:text-neutral-500">
                                        </div>
                                        <x-form-error name="question{{$key}}"/>
                                    @endforeach
                                @endif  
                                <div class="flex flex-col gap-2">
                                    <label for="time" class="text-sm font-medium">Berapa menit yang di berikan ke siswa untuk menegerjakan tugas ini?</label>
                                    <div class="flex items-center gap-4 border border-neutral-300 p-2 rounded-md w-28">
                                        <img class="w-6" src="{{asset("image/time.png")}}" alt="">
                                        <input type="text" name="time" id="time" value="00:00" placeholder="00:00" pattern="[0-9]{2}:[0-9]{2}" class="bg-white text-neutral-800 focus:outline-none text-sm placeholder:text-neutral-500 w-full"> 
                                    </div>
                                </div>
                                <button type="submit" class="bg-indigo-600 text-sm font-semibold uppercase py-2 rounded-lg">Tambah Pertanyaan</button>
                            </form>
                        </div>
                    @endif
                    @if($memory->questions)
                        <div class="flex flex-col gap-3 justify-between">
                            {{-- <h1 class="font-medium text-sm"></h1> --}}
                            <div class="grid grid-cols-2 gap-6">
                                @if($memory)
                                    @foreach (array_slice($memory->images, 0, 6) as $key => $image)
                                        <div class="flex flex-col gap-2">
                                            <div class="w-[75%] mx-auto flex justify-center items-center bg-neutral-200 p-8 rounded-lg">
                                                <img class="w-[60%] rounded-lg" src="{{asset("$image")}}" alt="image memory game {{$key}}">
                                            </div>
                                            <p class="text-sm text-center font-medium text-neutral-800"><span class="font-semibold text-lime-500">Pertanyaan:</span> {{$memory->questions[$key]}}</p>
                                        </div>
                                    @endforeach
                                @endif  
                            </div>
                            <div class="flex flex-col gap-2 mt-6">
                                <h2 class="text-sm font-medium text-neutral-800">Waktu pengerjakan?</h2>
                                <div class="flex items-center gap-4 border border-neutral-300 p-2 rounded-md w-28">
                                    <img class="w-6" src="{{asset("image/time.png")}}" alt="">
                                    <P class="text-neutral-800">{{$memory->time}}</P>
                                </div>
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
                    @endif
                </div>
            @endif

            <div class="order-1 md:order-2 w-full md:w-[30%] lg:w-[25%] h-fit dark-green shadow-md rounded-2xl p-4">
                <h2 class="font-bold mb-2 text-4xl lg:text-5xl text-neutral-800">{{"0"}}</h2>
                <p class="text-sm mb-4 text-neutral-800">Siswa telah menyelesaikan game</p>
                <a href="/teacher/recap/{{$lesson->id}}/{{$task->id}}/game" class="uppercase text-center block text-xs px-4 py-3 rounded-lg font-bold bg-yellow-500 text-white">lihat hasil</a>
            </div>
        </div>
    </div>

    <div id="edit_challenge_overlay" class="fixed h-screen overflow-y-auto hidden z-50 bg-black bg-opacity-70 w-full top-0 left-0">
        <div id="modal_edit_challenge" class="flex justify-center items-center py-6">
            <form action="/game/images/edit/{{$task->id}}" method="POST" enctype="multipart/form-data" class="bg-main p-4 rounded-xl w-[80%] md:w-[60%]">
                @csrf
                @method("PATCH")
                <div class="flex justify-between">
                    <h2 class="text-sm md:text-base font-semibold text-neutral-800">Edit Soal</h2>
                    <img id="edit_challenge_close" class="cursor-pointer" src="{{asset("img/close.svg")}}" alt="close image">
                </div>
                <span class="block h-[0.0625rem] mx-auto w-full bg-gray-500 my-4"></span>
                <div class="flex flex-col gap-6">
                    <div class="flex flex-col gap-2 mb-1 lg:mb-0">
                        <lable for="image" class="text-xs lg:text-sm font-medium text-neutral-800">Ganti gambar</lable>
                        <input type="file" name="images[]" multiple id="image" class="py-2.5 px-3 text-neutral-800 border border-neutral-300 rounded-xl text-sm">
                        <x-form-error name="images"/>
                    </div>
                    @if($memory)
                       @foreach (array_slice($memory->images, 0, 6) as $key => $image)
                           <div class="flex flex-col gap-3">
                               <div class="w-[40%] flex justify-center items-center bg-neutral-200 p-8 rounded-lg">
                                   <img class="w-[60%] rounded-lg" src="{{asset("$image")}}" alt="image memory game {{$key}}">
                               </div>
                               <input type="text" name="question{{$key}}" id="question{{$key}}" value="{{$memory->questions[$key] ?? ''}}" placeholder="Apa fungsi dari gambar di atas?" class="bg-main text-neutral-800 border border-neutral-300 focus:outline-none p-2 text-sm rounded-md placeholder:text-neutral-500">
                           </div>
                           <x-form-error name="question{{$key}}"/>
                       @endforeach
                   @endif  
                   <div class="flex flex-col gap-2">
                       <label for="time" class="text-sm font-medium">Berapa menit yang di berikan ke siswa untuk menegerjakan tugas ini?</label>
                       <div class="flex items-center gap-4 border border-neutral-300 p-2 rounded-md w-28">
                           <img class="w-6" src="{{asset("image/time.png")}}" alt="">
                           <input type="text" name="time" id="time" value="{{$memory->time??"00:00"}}" placeholder="00:00" pattern="[0-9]{2}:[0-9]{2}" class="bg-main text-neutral-800 focus:outline-none text-sm placeholder:text-neutral-500 w-full"> 
                       </div>
                   </div>
                   <button type="submit" class="uppercase px-8 py-3.5 font-bold rounded-lg w-full lg:w-auto block text-xs bg-indigo-600">Edit Game</button>
                </div>
            </form>
        </div>
    </div>
</x-teacher-layout>