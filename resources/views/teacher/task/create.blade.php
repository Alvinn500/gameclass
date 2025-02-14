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
        <h2 class="font-semibold text-sm my-4 pl-4 text-main">BUAT SOAL</h2>
        <div class="flex flex-col md:flex-row gap-4">
            <form action="" method="POST" class="order-2 md:order-1 w-full md:w-[59%] bg-main shadow-md px-4 py-6 rounded-xl">
                @csrf
                <div class="flex flex-col gap-2 mb-4">
                    <label for="title" class="text-sm font-semibold text-main">Judul Soal</label>
                    <input class="focus:outline-none py-2 px-3 text-sm bg-input text-input placeholder:text-placehodler rounded-lg" type="text" name="title" placeholder="judul soal" id="title" required>
                </div>
                <div class="flex flex-col gap-2 mb-4">
                    <label for="type" class="text-sm font-semibold text-main">Tipe Soal</label>
                    <select name="type" id="type" class="bg-input text-input font-medium py-2 px-3 text-sm rounded-lg appearance-none">
                        <option value="" selected disabled hidden>------ PILIH -----</option>
                        <option value="1">Quiz (Pilihan Ganda)</option>
                        <option value="2">Test (Pilihan Ganda)</option>
                        <option value="3">Essay</option>
                        <option value="4">Tugas Upload</option>
                        <option value="5">Memory Game</option>
                    </select>
                </div>
                <button type="submit" class="text-xs font-semibold bg-button py-3 px-5 rounded-lg shadow-lg">BUAT SOAL</button>
            </form>
             <div class="order-1 md:order-2 w-full md:w-[39%] bg-main shadow-md px-4 py-6 rounded-xl">
                <h2 class="font-semibold text-sm mb-2 text-main">KETERANGAN</h2>
                <ol class="pl-2 text-sm">
                    <li class="mb-1 text-main font-medium">1. <span class="text-link font-semibold">Quiz:</span> Siswa dapat mengetahui nilai dan kunci jawaban setelah mengerjakan</li>
                    <li class="mb-1 text-main font-medium">2. <span class="text-link font-semibold">Test:</span> Siswa tidak dapat mengetahui nilai dan kunci jawaban</li>
                    <li class="mb-1 text-main font-medium">3. <span class="text-link font-semibold">Essay:</span> Soal uraian</li>
                    <li class="mb-1 text-main font-medium">4. <span class="text-link font-semibold">Tugas Upload:</span> Jenis soal yang mengharuskan siswa mengunggah file tertentu</li>
                    <li class="mb-1 text-main font-medium">5. <span class="text-link font-semibold">Memory Game:</span> Pembalajaran yang di kombinasikan dengan game</li>
                </ol>
            </div>   
        </div>
    </div>
</x-teacher-layout>