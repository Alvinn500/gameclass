<x-teacher-layout title="Tambah Materi">
    <x-teacher-sub-nav 
        classPath="/teacher/class/{{$class->id}}" 
        activityPath="/teacher/class/{{$class->id}}/activity" 
        gradePath="/teacher/class/{{$class->id}}/grade" 
        studentPath="/teacher/class/{{$class->id}}/student" 
        settingPath="/teacher/class/{{$class->id}}/setting"
    />
    <div>
        <h2 class="my-4 px-2">Buat Materi</h2>
        <form id="formSubject" action="/teacher/class/{{$class->id}}/subject" method="POST" enctype=multipart/form-data>
            @csrf
            <div class="bg-main p-4 rounded-lg">
                <div class="flex flex-col mb-4">
                    <label class="mb-2 text-xs font-semibold" for="title">Judul Materi</label>
                    <input class="focus:outline-none bg-main rounded-lg text-sm py-2.5 px-3 border" type="text" name="title" id="title" placeholder="Judul Materi">
                    <x-form-error name="title"/>
                </div>
                <div class="flex flex-col">
                    <label class="mb-2 text-xs font-semibold" for="assigment">Tambahkan Lampiran (opsional)</label>
                    <input class="focus:outline-none bg-main rounded-lg text-sm py-2.5 px-3 border w-1/3" type="file" name="assigment" id="assigment">
                    <x-form-error name="assigment"/>
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
                    <div id="editor"></div>
                </div>
                <input type="hidden" value="" name="content" id="content">
                <x-form-error name="content"/>
                <button class="bg-violet-800 py-3 px-4 rounded-lg shadow-lg text-xs font-semibold uppercase w-full" type="submit">Simpan</button>
            </div>
        </form>
    </div>
</x-teacher-layout>