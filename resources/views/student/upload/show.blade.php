<x-student-layout title="materi">
    <x-breadcrumbs :breadcrumbs="$breadcrumbs"/>
    <div class="space-y-6 mb-4">
        @if(!$task->upload)
            <div class="dark-purple rounded-2xl pt-4 pb-6 px-8">
                <h1 class="text-xl font-bold text-neutral-800">Tugas essay belum tersedia</h1>
            </div>
        @else
            <div class="dark-purple shadow-md rounded-2xl pt-4 pb-6 px-8">
                <div class="bg-yellow-500 mx-auto w-[98%]">
                    <h2 class="text-white font-semibold text-sm p-2.5 -mt-6">Rewird Hingga 500 XP</h2>
                </div>
                <div class="flex flex-col gap-3 mt-5">
                    <h1 class="text-4xl font-bold text-neutral-800">{{ $task->title }}</h1>
                    <p class="font-semibold text-neutral-800">{{$task->upload->question}}</p>
                    @if($task->upload->file)
                    <div>
                        <img class="h-64 sm:h-80 rounded-lg" src="{{asset("uploads/" . $task->upload->file)}}" alt="">
                    </div>
                    @endif
                </div>
            </div>
            <div class="dark-purple shadow-md rounded-2xl pt-4 pb-6 px-8">
                <div class="bg-yellow-500 mx-auto w-[98%]">
                    <h2 class="text-white font-semibold text-sm p-2.5 -mt-6">Upload Tugas</h2>
                </div>
                <form action="" method="POST" enctype="multipart/form-data" class="flex flex-col gap-3 mt-5">
                    @csrf
                    <h3 class="text-sm font-bold text-neutral-800">Pilih File</h3>
                    <input type="file" name="file" class="py-2.5 px-3 border border-neutral-300 text-neutral-800 rounded-xl text-sm bg-main">
                    <x-form-error name="file"/>
                    <div>
                        <button type="submit" class="bg-indigo-600 w-full sm:w-auto text-sm font-semibold uppercase py-3.5 px-16 mb-2 rounded-lg shadow-lg">Kirim Jawaban</button>
                    </div>
                </form>
            </div>
        @endif
    </div>
</x-student-layout> 