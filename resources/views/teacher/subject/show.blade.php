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
        <h1 class="px-4 text-sm font-semibold my-4 uppercase text-main">Materi</h1>
        <div class="flex flex-col sm:flex-row gap-4">
            <div class="w-full sm:w-[70%] lg:w-[75%]">
                <div class="bg-main shadow-md text-main px-4 py-6 rounded-2xl space-y-2 min-h-36">
                    <h2 class="font-semibold text-3xl mb-4">{{$subject->title}}</h2>
                    {!! $subject->content !!}
                </div>
            </div>
            <div class="w-full sm:w-[30%] lg:w-[25%] flex flex-col gap-3">
                <div class="{{$subject->assignment ? "block " : "hidden "}} bg-main shadow-md h-fit rounded-2xl p-4 space-y-3">
                    <h2 class="font-bold text-xl text-main">Berkas Lampiran</h2>
                    <p class="font-medium text-main">{{$subject->assignment}}</p>
                    <a href="/teacher/download/{{$subject->assignment}}" class="bg-button text-main py-2.5 px-5 text-sm font-semibold rounded-lg inline-block">Download</a>
                </div>
                <div class="h-fit bg-main shadow-md rounded-2xl p-4">
                    <h2 class="font-bold mb-2 text-4xl lg:text-5xl text-maain">{{$studentReaded}}</h2>
                    <p class="text-sm mb-4 text-main">Siswa telah membaca materi</p>
                    <a href="/teacher/recap/{{$lesson->id}}/{{$subject->id}}/subject" class="uppercase text-center block text-xs px-4 py-3 rounded-lg font-bold bg-button text-main">lihat hasil</a>
                </div>
                <div class="flex gap-2">
                    <a href="/teacher/lesson/{{$lesson->id}}/subject/edit/{{$subject->id}}" class="bg-main text-main py-2.5 px-5 text-sm font-semibold rounded-lg inline-block">Edit</a>
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