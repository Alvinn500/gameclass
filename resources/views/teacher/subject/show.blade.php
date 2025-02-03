<x-teacher-layout title="Lihat Materi">
    <x-breadcrumbs :breadcrumbs="$breadcrumbs"/>
    <x-teacher-sub-nav
        classPath="/teacher/class/{{$class->id}}" 
        activityPath="/teacher/{{$class->id}}/activity" 
        gradePath="/teacher/recap/{{$lesson->id}}/{{$subject->id}}/subject" 
        studentPath="/teacher/{{$class->id}}/list/student" 
        settingPath="/teacher/{{$class->id}}/setting"
    />
    <div class="mb-4">
        <h1 class="px-4 text-sm font-semibold my-4 uppercase text-neutral-800">Materi</h1>
        <div class="flex flex-col sm:flex-row gap-4">
            <div class="order-2 sm:order-1 w-full sm:w-[70%] lg:w-[75%]">
                <div class="bg-main shadow-md text-neutral-800 px-4 py-6 rounded-2xl space-y-2 min-h-36">
                    <h2 class="font-semibold text-3xl mb-4">{{$subject->title}}</h2>
                    {!! $subject->content !!}
                </div>
            </div>
            <div class="order-1 sm:order-2 w-full sm:w-[30%] lg:w-[25%] flex flex-col gap-3">
                <div class="{{$subject->assignment ? "block " : "hidden "}} dark-purple shadow-md h-fit rounded-2xl p-4 space-y-3">
                    <h2 class="font-bold text-xl text-neutral-800">Berkas Lampiran</h2>
                    <p class="font-medium text-neutral-800">{{$subject->assignment}}</p>
                    <a href="/teacher/download/{{$subject->assignment}}" class="bg-indigo-600 text-white py-2.5 px-5 text-sm font-semibold rounded-lg inline-block">Download</a>
                </div>
                <div class="h-fit dark-green shadow-md rounded-2xl p-4">
                    <h2 class="font-bold mb-2 text-4xl lg:text-5xl text-neutral-800">{{$studentReaded}}</h2>
                    <p class="text-sm mb-4 text-neutral-800">Siswa telah membaca materi</p>
                    <a href="/teacher/recap/{{$lesson->id}}/{{$subject->id}}/subject" class="uppercase text-center block text-xs px-4 py-3 rounded-lg font-bold bg-yellow-500 text-white">lihat hasil</a>
                </div>
                <div class="flex gap-2">
                    <a href="/teacher/lesson/{{$lesson->id}}/subject/edit/{{$subject->id}}" class="bg-yellow-500 text-white py-2.5 px-5 text-sm font-semibold rounded-lg inline-block">Edit</a>
                    <form action="/teacher/lesson/{{$lesson->id}}/subject/delete/{{$subject->id}}" method="POST">
                        @csrf
                        @method("DELETE")
                    
                        <button type="submit" class="bg-red-600 text-white py-2.5 px-5 text-sm font-semibold rounded-lg inline-block">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-teacher-layout>