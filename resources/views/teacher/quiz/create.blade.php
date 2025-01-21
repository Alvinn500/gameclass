<x-teacher-layout title="{{$task->title}}">
    <x-breadcrumbs :breadcrumbs="$breadcrumbs"/>
    <x-teacher-sub-nav 
        classPath="/teacher/class/{{$class->id}}" 
        activityPath="/teacher/{{$class->id}}/activity" 
        gradePath="/teacher/recap/{{$lesson->id}}/{{$task->id}}/quiz" 
        studentPath="/teacher/{{$class->id}}/student" 
        settingPath="/teacher/{{$class->id}}/setting"
    />
    <div>
        <h1 class="px-4 text-sm font-semibold my-4 uppercase">{{$task->type === 1 ? "SOAL QUIZ" : "SOAL TEST"}} - {{$task->title}}</h1>
        <div class="dark-purple rounded-xl flex gap-2 px-3 py-4 mb-4">
            <button id="addQuiz" class="uppercase block text-xs px-4 py-3 rounded-lg font-bold text-secondary bg-yellow-400">tambah pertanyaan</button>
            <button id="editQuiz" class="uppercase block text-xs px-4 py-3 rounded-lg font-bold bg-violet-800">edit judul soal {{$task->type === 1 ? "quiz" : "test"}}</button>
            
            <x-form-error name="question"/>
            <x-form-error name="a"/>
            <x-form-error name="c"/>
            <x-form-error name="d"/>
            <x-form-error name="e"/>
            <x-form-error name="answare"/>
            <x-form-error name="imgae"/>
        </div>

        <div id="modalEdit" class="fixed hidden justify-center items-center w-full h-screen bg-black bg-opacity-70 top-0 left-0 ">
            <div class="bg-main rounded-xl w-2/3 sm:w-2/5 lg:w-1/3 inline-block">
                <form id="editForm" action="/quiz/edit/{{$task->id}}" method="POST" class="flex flex-col p-4 gap-4">
                    @csrf
                    @method("PATCH")
                    <label class="text-lg font-medium" for="inputTask">Judul {{$task->type === 1 ? "Quiz" : "Test"}}</label>
                    <input id="inputTask" class="bg-main focus:outline-none border border-white rounded-lg p-2.5 text-sm" type="text"  name="title" value="{{$task->title}}" placeholder="Masukan judul task">
                    <div class="flex justify-between">
                        <button type="submit" class="bg-violet-800 py-3 px-4 rounded-lg shadow-lg text-xs font-semibold">SIMPAN</button>
                        <button form="deleteForm" class="bg-red-600 py-3 px-4 rounded-lg shadow-lg text-xs font-semibold">HAPUS QUIZ</button>
                    </div>
                </form>
                <form action="/quiz/delete/{{$task->id}}" id="deleteForm" method="POST">
                    @csrf
                    @method("DELETE")
                </form>
            </div>
        </div>

        <div class="flex flex-col md:flex-row gap-4">
            <div class="order-2 md:order-1 w-full md:w-[70%] lg:w-[75%] space-y-2">
                @foreach ($quizzes as $quiz )
                <div>
                    <div id="quiz" data-quizId="{{$quiz->id}}" class="flex justify-between bg-main px-3 py-4 rounded-2xl hover:bg-violet-800">
                        <h2>{{$loop->iteration}}. {{$quiz->question}}</h2>
                        <img id="quizArrow" class="w-6 items-center" src="{{asset("img/arrow.png")}}" alt="arrow image">
                    </div>
                    <div id="quizOption{{$quiz->id}}" class="bg-semiblack hidden px-3 py-4 rounded-b-2xl">
                        @if($quiz->image)
                            <img class="aspect-video h-[50%] mx-auto mb-2" src="{{asset("mutiple_choices/$quiz->image")}}" alt="question image">
                        @endif

                        @foreach ($quiz->options as $key => $option )
                            <div class="flex gap-1.5">
                                <h3>{{$key}}.</h3>
                                <p>{{$option}}</p>
                            </div>
                        @endforeach
                        <div class="flex mt-2">  
                            {{-- <input type="text" id="">       --}}
                            <button id="buttonEditQuestion" data-quizId="{{$quiz->id}}" data-question="{{$quiz->question}}" data-options="{{json_encode($quiz->options)}}" data-answare="{{$quiz->answer}}" data-image="{{$quiz->image}}" class="buttonEditQuestion text-sky-400 font-semibold uppercase text-sm px-8 rounded-l-xl py-2 border border-r-0 border-sky-400">Edit</button>
                            <form action="/quiz/question/delete/{{$quiz->id}}" method="POST">
                                @csrf
                                @method("DELETE")
                                <button type="submit" class="font-semibold uppercase text-yellow-500 text-sm px-8 rounded-r-xl py-2 border border-yellow-500">Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="order-1 md:order-2 w-full md:w-[30%] lg:w-[25%] h-fit dark-green rounded-2xl p-4">
                <h2 class="font-bold mb-2 text-4xl lg:text-5xl">{{$studentAnswered}}</h2>
                <p class="text-sm mb-4">Siswa telah mengerjakan Soal {{$task->type === 1 ? "Quiz" : "Test"}}</p>
                <a href="/teacher/recap/{{$lesson->id}}/{{$task->id}}/quiz" class="uppercase text-center block text-xs px-4 py-3 rounded-lg font-bold bg-yellow-500 text-black">lihat hasil</a>
            </div>
        </div>
        
        {{-- Modal create Questions --}}
        <div id="parent_quiz_overlay" class="fixed hidden z-50 bg-black bg-opacity-70 w-full h-full top-0 left-0 overflow-scroll">
            <div id="quiz_overlay" class="flex justify-center items-center py-6">
                <form action="" method="POST" enctype="multipart/form-data" id="quiz_modal" class="bg-main p-4 rounded-xl w-[80%] md:w-[60%]">
                    @csrf
                    <div class="flex justify-between">
                        <h2 class="text-sm md:text-base font-semibold">Tambah Soal</h2>
                        <img id="quiz_close" class="cursor-pointer" src="{{asset("img/close.svg")}}" alt="close image">
                    </div>
                    <span class="block h-[0.0625rem] mx-auto w-full bg-gray-500 my-4"></span>
                    <div class="flex flex-col gap-2 mb-4">
                        <label for="question" class="text-xs md:text-sm font-semibold">Pertanyaan</label>
                        <textarea id="question" name="question" class="bg-main focus:outline-none border border-gray-400 rounded-lg p-2.5 text-sm"></textarea>
                    </div>
                    <div class="flex flex-col gap-2">
                        <h3 class="text-xs md:text-sm font-semibold">Pilihan Jawaban</h3>
                        <div class="rounded-xl border border-gray-400">
                            <label for="a" class="bg-yellow-500 text-secondary font-semibold rounded-l-xl text-sm md:text-base w-[15%] sm:w-[10%] py-3 inline-block text-center">A</label>
                            <input type="text" name="a" id="a" required placeholder="Pilihan Jawaban A" class="py-3 px-2 text-sm w-[80%] md:w-[89%] rounded-r-xl bg-main focus:outline-none">
                        </div>
                        <div class="rounded-xl border border-gray-400">
                            <label for="b" class="bg-yellow-500 text-secondary font-semibold rounded-l-xl text-sm md:text-base w-[15%] sm:w-[10%] py-3 inline-block text-center">B</label>
                            <input type="text" name="b" id="b" required placeholder="Pilihan Jawaban B" class="py-3 px-2 text-sm w-[80%] md:w-[89%] rounded-r-xl bg-main focus:outline-none">
                        </div>
                        <div class="rounded-xl border border-gray-400">
                            <label for="c" class="bg-yellow-500 text-secondary font-semibold rounded-l-xl text-sm md:text-base w-[15%] sm:w-[10%] py-3 inline-block text-center">C</label>
                            <input type="text" name="c" id="c" required placeholder="Pilihan Jawaban C" class="py-3 px-2 text-sm w-[80%] md:w-[89%] rounded-r-xl bg-main focus:outline-none">
                        </div>
                        <div class="rounded-xl border border-gray-400">
                            <label for="d" class="bg-yellow-500 text-secondary font-semibold rounded-l-xl text-sm md:text-base w-[15%] sm:w-[10%] py-3 inline-block text-center">D</label>
                            <input type="text" name="d" id="d" required placeholder="Pilihan Jawaban D" class="py-3 px-2 text-sm w-[80%] md:w-[89%] rounded-r-xl bg-main focus:outline-none">
                        </div>
                        <div class="rounded-xl border border-gray-400 mb-2">
                            <label for="e" class="bg-yellow-500 text-secondary font-semibold rounded-l-xl text-sm md:text-base w-[15%] sm:w-[10%] py-3 inline-block text-center">E</label>
                            <input type="text" name="e" id="e" required placeholder="Pilihan Jawaban E" class="py-3 px-2 text-sm w-[80%] md:w-[89%] rounded-r-xl bg-main focus:outline-none">
                        </div>
                        <div class="flex justify-center gap-2 lg:gap-6 flex-col lg:flex-row">
                            <div class="flex flex-col gap-2">
                                <label for="answare" class="text-xs lg:text-sm font-semibold">Jawaban Benar</label>
                                <select name="answare" id="answare" class="focus:outline-none text-center lg:text-left rounded-lg py-3 px-12 bg-violet-800 text-sm appearance-none">
                                    <option value="" selected disabled hidden>Pilih</option>
                                    <option value="a">A</option>
                                    <option value="b">B</option>
                                    <option value="c">C</option>
                                    <option value="d">D</option>
                                    <option value="e">E</option>
                                </select>
                            </div>
                            <div class="flex flex-col gap-2 mb-1 lg:mb-0">
                                <lable for="image" class="text-xs lg:text-sm font-semibold">Gambar (opsional)</lable>
                                <input type="file" name="image" id="image" class="py-2.5 px-3 border border-gray-500 rounded-xl text-sm">
                            </div>
                            <div class="flex items-end">
                                <button type="submit" class="uppercase px-8 py-3.5 font-semibold rounded-lg w-full lg:w-auto block text-xs bg-violet-800">Simpan</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        {{-- Modal Edit Questions --}}
        <div id="parent_edit_quiz_overlay" class="fixed hidden z-50 bg-black bg-opacity-70 w-full h-full top-0 left-0 overflow-scroll">
            <div id="edit_quiz_overlay" class="flex justify-center items-center py-6">
                <form id="formEditQuiz" action="" method="POST" enctype="multipart/form-data" id="quiz_modal" class="bg-main p-4 rounded-xl w-[80%] md:w-[60%]">
                    @csrf
                    @method("PATCH")
                    <div class="flex justify-between">
                        <h2 class="text-sm md:text-base font-semibold">Edit Soal</h2>
                        <img id="edit_quiz_close" class="cursor-pointer" src="{{asset("img/close.svg")}}" alt="close image">
                    </div>
                    <span class="block h-[0.0625rem] mx-auto w-full bg-gray-500 my-4"></span>
                    <div class="flex flex-col gap-2 mb-4">
                        <label for="editQuestion" class="text-xs md:text-sm font-semibold">Pertanyaan</label>
                        <textarea id="editQuestion" name="question" class="bg-main focus:outline-none border border-gray-400 rounded-lg p-2.5 text-sm"></textarea>
                    </div>
                    <div class="flex flex-col gap-2">
                        <h3 class="text-xs md:text-sm font-semibold">Pilihan Jawaban</h3>
                        <div class="rounded-xl border border-gray-400">
                            <label for="editA" class="bg-yellow-500 text-secondary font-semibold rounded-l-xl text-sm md:text-base w-[15%] sm:w-[10%] py-3 inline-block text-center">A</label>
                            <input type="text" name="a" id="editA" required placeholder="Pilihan Jawaban A" class="py-3 px-2 text-sm w-[80%] md:w-[89%] rounded-r-xl bg-main focus:outline-none">
                        </div>
                        <div class="rounded-xl border border-gray-400">
                            <label for="editB" class="bg-yellow-500 text-secondary font-semibold rounded-l-xl text-sm md:text-base w-[15%] sm:w-[10%] py-3 inline-block text-center">B</label>
                            <input type="text" name="b" id="editB" required placeholder="Pilihan Jawaban B" class="py-3 px-2 text-sm w-[80%] md:w-[89%] rounded-r-xl bg-main focus:outline-none">
                        </div>
                        <div class="rounded-xl border border-gray-400">
                            <label for="editC" class="bg-yellow-500 text-secondary font-semibold rounded-l-xl text-sm md:text-base w-[15%] sm:w-[10%] py-3 inline-block text-center">C</label>
                            <input type="text" name="c" id="editC" required placeholder="Pilihan Jawaban C" class="py-3 px-2 text-sm w-[80%] md:w-[89%] rounded-r-xl bg-main focus:outline-none">
                        </div>
                        <div class="rounded-xl border border-gray-400">
                            <label for="editD" class="bg-yellow-500 text-secondary font-semibold rounded-l-xl text-sm md:text-base w-[15%] sm:w-[10%] py-3 inline-block text-center">D</label>
                            <input type="text" name="d" id="editD" required placeholder="Pilihan Jawaban D" class="py-3 px-2 text-sm w-[80%] md:w-[89%] rounded-r-xl bg-main focus:outline-none">
                        </div>
                        <div class="rounded-xl border border-gray-400 mb-2">
                            <label for="editE" class="bg-yellow-500 text-secondary font-semibold rounded-l-xl text-sm md:text-base w-[15%] sm:w-[10%] py-3 inline-block text-center">E</label>
                            <input type="text" name="e" id="editE" required placeholder="Pilihan Jawaban E" class="py-3 px-2 text-sm w-[80%] md:w-[89%] rounded-r-xl bg-main focus:outline-none">
                        </div>
                        <div class="flex justify-center gap-2 lg:gap-6 flex-col lg:flex-row">
                            <div class="flex flex-col gap-2">
                                <label for="editAnsware" class="text-xs lg:text-sm font-semibold">Jawaban Benar</label>
                                <select name="answare" id="editAnsware" class="focus:outline-none text-center lg:text-left rounded-lg py-3 px-12 bg-violet-800 text-sm appearance-none">
                                    <option value="" selected disabled hidden>Pilih</option>
                                    <option value="a">A</option>
                                    <option value="b">B</option>
                                    <option value="c">C</option>
                                    <option value="d">D</option>
                                    <option value="e">E</option>
                                </select>
                            </div>
                            <div class="flex flex-col gap-2 mb-1 lg:mb-0">
                                <lable for="editImage" class="text-xs lg:text-sm font-semibold">Gambar (opsional)</lable>
                                <input type="file" name="image" id="editImage" class="py-2.5 px-3 border border-gray-500 rounded-xl text-sm">
                            </div>
                            <div class="flex items-end">
                                <button type="submit" class="uppercase px-8 py-3.5 font-semibold rounded-lg w-full lg:w-auto block text-xs bg-violet-800">Simpan</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-teacher-layout>