<x-student-layout title="Soal {{$task->title}}">
    <x-breadcrumbs :breadcrumbs="$breadcrumbs"/>

    <div> 
        <div class="dark-purple rounded-2xl py-4 px-8">
            <div id="start">
                <div class="bg-yellow-500 mx-auto w-[98%]">
                    <h2 class="text-black font-semibold text-sm p-2.5 -mt-6">Rewird Hingga {{$totalQuiz ? 50 * $totalQuiz : 0}} XP</h2>
                </div>
                <div class="flex flex-col sm:flex-row gap-3">
                    <div class="w-full sm:w-[49%]">
                        <img class="mx-auto w-[60%] sm:w-[80%]" src="{{asset("img/vector/Online test-pana.svg")}}" alt="image">
                    </div>
                    <div class="w-full sm:w-[49%] flex gap-3 justify-center flex-col items-center sm:items-start">
                        <h1 class="font-bold text-2xl md:text-3xl uppercase">quiz</h1>
                        <p class="text-base font-semibold">Jumlah Soal {{$totalQuiz}}</p>
                        <div>
                            <button class="bg-violet-800 px-10 md:px-14 py-2.5 md:py-3 rounded-lg" onclick="hideshow('start','Q1')">Mulai quiz</button>
                        </div>
                    </div>
                </div>
            </div>
            
            <div>
                @php
                    $i = 1;
                @endphp
                <form action="" method="POST">
                    @csrf
                    @foreach ($quizzes as $quiz)    
                        <div id="Q{{$i}}" style="display: none" class="flex-col items-center sm:flex-row">
                            <div class="w-full sm:w-[50%] h-32 flex justify-center items-center">
                                <h1 class="font-semibold">{{$quiz->question}}</h1>
                            </div>
                            <div class="w-full sm:w-[50%] flex flex-col gap-3">
                                <input type="hidden" name="choiceId" value="{{$quiz->id}}">
                                <input type="hidden" name="userId" value="{{$user->id}}">

                                <input class="appearance-none" type="radio" id="optA{{$quiz->id}}" name="user_answer{{$quiz->id}}" value="a" onclick="hideshow('Q{{$i}}','Q{{$i + 1}}')" required/>
                                <label for="optA{{$quiz->id}}" class="bg-indigoCustom hover:bg-yellow-500 py-4 rounded-lg text-center font-semibold shadow-md px-2">{{$quiz->options['a']}}</label>

                                <input class="appearance-none" type="radio" id="optB{{$quiz->id}}" name="user_answer{{$quiz->id}}" value="b" onclick="hideshow('Q{{$i}}','Q{{$i + 1}}')" required/>
                                <label for="optB{{$quiz->id}}" class="bg-indigoCustom hover:bg-yellow-500 py-4 rounded-lg text-center font-semibold shadow-md px-2">{{$quiz->options['b']}}</label>

                                <input class="appearance-none" type="radio" id="optC{{$quiz->id}}" name="user_answer{{$quiz->id}}" value="c" onclick="hideshow('Q{{$i}}','Q{{$i + 1}}')" required/>
                                <label for="optC{{$quiz->id}}" class="bg-indigoCustom hover:bg-yellow-500 py-4 rounded-lg text-center font-semibold shadow-md px-2">{{$quiz->options['c']}}</label>

                                <input class="appearance-none" type="radio" id="optD{{$quiz->id}}" name="user_answer{{$quiz->id}}" value="d" onclick="hideshow('Q{{$i}}','Q{{$i + 1}}')" required/>
                                <label for="optD{{$quiz->id}}" class="bg-indigoCustom hover:bg-yellow-500 py-4 rounded-lg text-center font-semibold shadow-md px-2">{{$quiz->options['d']}}</label>

                                <input class="appearance-none" type="radio" id="optE{{$quiz->id}}" name="user_answer{{$quiz->id}}" value="e" onclick="hideshow('Q{{$i}}','Q{{$i + 1}}')" required/>
                                <label for="optE{{$quiz->id}}" class="bg-indigoCustom hover:bg-yellow-500 py-4 rounded-lg text-center font-semibold shadow-md px-2">{{$quiz->options['e']}}</label>
                            </div>
                        </div>
                        @php
                            $i++;
                            @endphp
                    @endforeach
                    <div id="end" style="display: none" class="flex-col sm:flex-row">
                        <div class="w-full sm:w-[70%] flex order-2 sm:order-1 flex-col justify-center items-center sm:items-start gap-5 ">
                            <h2 class="text-xl sm:text-2xl md:text-3xl text-center sm:text-left font-bold">YEAY! kamu sudah menyelesaikan quiz</h2>
                            <div>
                                <button type="submit" class="bg-violet-800 text-sm font-semibold uppercase py-3 px-8 rounded-lg shadow-lg">simpan dan lihat hasilnya</button>
                            </div>
                        </div>
                        <div class="w-[80%] sm:w-[30%] mr-auto sm:mr-0 order-1 sm:order-2">
                            <img class="w-full mx-auto" src="{{asset("img/vector/Online test-amico (1).svg")}}" alt="image">
                        </div>
                    </div> 
                </form>
            </div>
        </div>
    </div>
</x-student-layout>