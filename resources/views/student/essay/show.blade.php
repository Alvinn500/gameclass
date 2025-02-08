<x-student-layout title="soal {{$task->title}}">
    <x-breadcrumbs :breadcrumbs="$breadcrumbs"/>
    <x-student-sub-nav
        missionPath="/student/class/{{$class->id}}"
        leaderboardPath="/student/{{$class->id}}/leaderboard"
        activityPath="/student/{{$class->id}}/activity"
        informationPath="/student/{{$class->id}}/information"
    />
    <div class="my-8"> 
        <div class="bg-main shadow-md rounded-2xl py-4 px-8">
            <div id="start">
                <div class="bg-yellow-500 mx-auto w-[98%]">
                    <h2 class="text-main font-semibold text-sm p-2.5 -mt-6">Rewird Hingga 500 XP</h2>
                </div>
                <div class="flex flex-col sm:flex-row gap-3">
                    <div class="w-full sm:w-[49%]">
                        <img class="mx-auto w-[60%] sm:w-[80%]" src="{{asset("img/vector/Online test-pana.svg")}}" alt="image">
                    </div>
                    <div class="w-full sm:w-[49%] flex gap-3 justify-center flex-col items-center sm:items-start">
                        <h1 class="font-bold text-2xl md:text-3xl uppercase text-main">{{$task->title}}</h1>
                        @if($totalEssay === 0)
                            <p class="text-red-500 text-sm font-semibold">Belum ada soal</p>
                        @else
                        <p class="text-base font-semibold text-main">Jumlah Soal {{$totalEssay}}</p>
                        @endif
                        <div>
                            <button {{$totalEssay === 0 ? 'disabled' : ''}} class="bg-button px-10 md:px-14 py-2.5 md:py-3 rounded-lg" onclick="hideshow('start','end')">Mulai quiz</button>
                        </div>
                    </div>
                </div>
            </div>
            
            <div>
                <form action="" method="POST">
                    @csrf
                    <div id="end" style="display: none" class="flex flex-col gap-10">
                        @foreach ($essays as $essay)  
                            @if($loop->iteration !== 1) 
                                <span class="block h-[0.0625rem] mx-auto w-full bg-line mb-2"></span>  
                            @endif 
                            <div class="{{$loop->iteration !== 1 ? "mt-6" : "mt-2"}} mb-8 flex flex-col gap-2 space-x-3">
                                <label for="essay{{$essay->id}}" class="font-semibold text-main">{{$loop->iteration}}. {{$essay->question}}</label>
                                <div>
                                    @if($essay->image)
                                        <img class="h-40 sm:h-48 md:h-56 py-2 rounded-xl" src="{{asset("essays/$essay->image")}}" alt="image">
                                    @endif
                                </div>
                                <textarea 
                                    name="user_answer{{$essay->id}}" 
                                    id="essay{{$essay->id}}" 
                                    cols="30" 
                                    rows="10"
                                    class="bg-input text-input placeholder:text-placehodler rounded-xl text-sm p-4"
                                    placeholder="Tulis Jawaban Nomor {{$loop->iteration}} di sini" 
                                ></textarea>    
                            </div> 
                        @endforeach
                        <button type="submit" class="bg-button text-sm font-semibold uppercase py-3 px-8 mb-2 rounded-lg shadow-lg">Kumpulkan jawaban</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-student-layout>