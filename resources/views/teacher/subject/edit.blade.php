<x-teacher-layout title="Edit Materi">
    <x-breadcrumbs :breadcrumbs="$breadcrumbs"/>
    <x-teacher-sub-nav 
        classPath="/teacher/class/{{$class->id}}" 
        activityPath="/teacher/{{$class->id}}/activity" 
        gradePath="/teacher/{{$class->id}}/recap" 
        studentPath="/teacher/{{$class->id}}/list/student" 
        settingPath="/teacher/{{$class->id}}/setting"
    />
    <div>
        <h2 class="my-4 px-2 text-main font-semibold">Buat Materi</h2>
        <form id="formSubject" action="/teacher/lesson/{{$lesson->id}}/subject/edit/{{$subject->id}}" method="POST" enctype=multipart/form-data>
            @csrf
            @method("PATCH")
            <div class="bg-main shadow-md mb-4 p-4 rounded-lg">
                <div class="flex flex-col mb-4">
                    <label class="mb-2 text-xs font-semibold text-main" for="title">Judul Materi</label>
                    <input class="focus:outline-none bg-input rounded-lg text-sm py-2.5 px-3 text-input placeholder:text-placehodler" type="text" name="title" id="title" placeholder="Judul Materi" value="{{$subject->title}}">
                    <x-form-error name="title"/>
                </div>
                <div class="flex flex-col">
                    <label class="mb-2 text-xs font-semibold text-main" for="assignment">Tambahkan Lampiran (opsional)</label>
                    <input class="focus:outline-none text-input bg-input rounded-lg text-sm py-2.5 px-3 w-1/3" type="file" name="assignment" id="assignment">
                    <x-form-error name="assignment"/>
                </div>
                <div class="border border-main border-opacity-30 my-4 rounded-lg">
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
                    <div id="editor" class="text-main">{!! $subject->content !!}</div>
                </div>
                <input type="hidden" value="" name="content" id="content">
                <x-form-error name="content"/>
                <button class="bg-button py-3 px-4 rounded-lg shadow-lg text-xs font-semibold uppercase w-full" type="submit">Simpan</button>
            </div>
        </form>
    </div>
</x-teacher-layout>