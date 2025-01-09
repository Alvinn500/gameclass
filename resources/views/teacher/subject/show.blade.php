<x-teacher-layout title="Lihat Materi">
    <x-breadcrumbs :breadcrumbs="$breadcrumbs"/>
    <x-teacher-sub-nav
        classPath="/teacher/class/{{$class->id}}" 
        activityPath="/teacher/{{$class->id}}/activity" 
        gradePath="/teacher/{{$class->id}}/grade" 
        studentPath="/teacher/{{$class->id}}/student" 
        settingPath="/teacher/{{$class->id}}/setting"
    />
    <div>
        <h1 class="px-4 text-sm font-semibold my-4 uppercase">Materi</h1>
        <div class="flex flex-col md:flex-row gap-4">
            <div class="bg-main px-4 py-6 rounded-2xl order-2 md:order-1 w-full md:w-[70%] lg:w-[75%] space-y-2">
                <h2 class="font-semibold text-3xl mb-4">{{$subject->title}}</h2>
                {!! $subject->content !!}
            </div>
            <div class="order-1 md:order-2 w-full md:w-[30%] lg:w-[25%] h-fit dark-green rounded-2xl p-4">
                <h2 class="font-bold mb-2 text-4xl lg:text-5xl">{{$studentReaded}}</h2>
                <p class="text-sm mb-4">Siswa telah membaca materi</p>
                <a href="" class="uppercase text-center block text-xs px-4 py-3 rounded-lg font-bold bg-yellow-500 text-black">lihat hasil</a>
            </div>
        </div>
    </div>
</x-teacher-layout>