<x-teacher-layout title="Tambah Materi">
    <x-breadcrumbs :breadcrumbs="$breadcrumbs"/>
    <x-teacher-sub-nav 
        classPath="/teacher/class/{{$class->id}}" 
        activityPath="/teacher/{{$class->id}}/activity" 
        gradePath="/teacher/{{$class->id}}/recap" 
        studentPath="/teacher/{{$class->id}}/list/student" 
        settingPath="/teacher/{{$class->id}}/setting"
    />
    <div class="mb-4">
        <h2 class="my-4 font-semibold px-2 text-neutral-800">Buat Materi</h2>
        <form id="formSubject" action="/teacher/lesson/{{$lesson->id}}/subject" method="POST" enctype=multipart/form-data>
            @csrf
            <div class="bg-main p-4 rounded-lg">
                <div class="flex flex-col mb-4">
                    <label class="mb-2 text-xs font-semibold text-neutral-800" for="title">Judul Materi</label>
                    <input class="focus:outline-none bg-main rounded-lg text-sm py-2.5 px-3 border border-neutral-300 placeholder:text-neutral-500 text-neutral-800" type="text" name="title" id="title" placeholder="Judul Materi" value="{{old('title')}}">
                    <x-form-error name="title"/>
                </div>
                <div class="flex flex-col">
                    <label class="mb-2 text-xs font-semibold text-neutral-800" for="assignment">Tambahkan Lampiran (opsional)</label>
                    <input class="focus:outline-nonebg-main rounded-lg text-sm py-2.5 px-3 border border-neutral-300 text-neutral-800 w-1/3" type="file" name="assignment" id="assignment">
                    <x-form-error name="assignment"/>
                </div>
                <div class="border border-black border-opacity-30 my-4 rounded-lg">
                    <div id="toolbar">
                        <select class="ql-size"></select>
                        <button class="ql-bold"></button>
                        <button class="ql-italic"></button>
                        <button class="ql-underline"></button>
                        <button class="ql-strike"></button>
                        <select class="ql-color"></select>
                        <select class="ql-background"></select>
                        <button class="ql-link"></button>
                        <button class="ql-image"></button>
                        <button class="ql-video"></button>
                        <button class="ql-list">
                            <img src="{{asset('img/list.png')}}" alt="">
                        </button>
                        <select class="ql-align">
                            <option selected></option>
                            <option value="center"></option>
                            <option value="right"></option>
                            <option value="justify"></option> 
                        </select>
                    </div>
                    <div id="editor" class="text-neutral-800">{!! old('content') !!}</div>
                </div>
                <input type="hidden" value="" name="content" id="content">
                <x-form-error name="content"/>
                <button class="bg-violet-800 py-3 px-4 rounded-lg shadow-lg text-xs font-semibold uppercase w-full" type="submit">Simpan</button>
            </div>
        </form>
    </div>
</x-teacher-layout>