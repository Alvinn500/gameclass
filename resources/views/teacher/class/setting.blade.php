<x-teacher-layout title="{{$class->study_name }} - {{$class->class}}">
    <x-breadcrumbs :breadcrumbs="$breadcrumbs"/>
    <x-teacher-sub-nav 
        classPath="/teacher/class/{{$class->id}}" 
        activityPath="/teacher/{{$class->id}}/activity" 
        gradePath="/teacher/{{$class->id}}/recap" 
        studentPath="/teacher/{{$class->id}}/list/student" 
        settingPath="/teacher/{{$class->id}}/setting"
    />
    <div class="bg-main shadow-md my-6 px-6 pt-2 pb-6 rounded-xl">
        <form action="" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            @method("PATCH")
            <div class="flex flex-col gap-2">
                <label for="study_name" class="text-sm text-main font-semibold">Nama Mata Pelajaran</label>
                <input type="text" name="study_name" id="study_name" value="{{$class->study_name}}" class="bg-input text-input text-sm p-2.5 rounded-lg">
                <x-form-error name="study_name"/>
            </div>
            <div class="flex flex-col gap-2">
                <label for="school_name" class="text-sm text-main font-semibold">Nama Sekolah</label>
                <input type="text" name="school_name" id="school_name" value="{{$class->school_name}}" class="bg-input text-input text-sm p-2.5 rounded-lg">
                <x-form-error name="school_name"/>
            </div>
            <div class="flex flex-col gap-2">
                <label for="class" class="text-sm text-main font-semibold">Kelas</label>
                <input type="text" name="class" id="class" value="{{$class->class}}" class="bg-input text-input text-sm p-2.5 rounded-lg">
                <x-form-error name="class"/>
            </div>
            <div class="flex flex-col gap-2">
                <label for="logo_class" class="text-sm text-main font-semibold">Logo Kelas (.jpg/.png)</label>
                @if($class->logo_class)
                    <img class="w-16 rounded-lg" src="{{asset("logo_class/" . $class->logo_class)}}" alt="logo_class">
                @endif
                <input type="file" name="logo_class" id="logo_class" class="bg-input text-input text-sm p-2.5 rounded-lg">
            </div>
            <div class="flex gap-4">
                <button type="submit" class="bg-button py-3 px-4 rounded-lg shadow-lg text-xs font-semibold uppercase">edit kelas</button>
                <button id="deleteClass" type="button" class="bg-red-600 py-3 px-4 rounded-lg shadow-lg text-xs font-semibold uppercase">hapus kelas</button>
            </div>
        </form>
    </div>
    <div id="confirm_overlay" class="fixed hidden top-0 left-0 w-full h-full z-50 bg-black bg-opacity-50">
        <div id="confirm_modal" class="flex justify-center items-center h-full">
            <form action="" method="POST" id="deleteForm" class="bg-main rounded-lg p-4 w-96 flex flex-col gap-4">
                @csrf
                @method("DELETE")
                <div>
                    <h2 class="font-semibold text-lg text-center mb-1 text-main">Hapus Kelas</h2>
                    <p class="text-center text-sm text-secondary">Anda yakin ingin menghapus kelas ini?</p>
                </div>
                <div class="flex gap-2 justify-center">
                    <button id="unconfirm" type="button" class="bg-button text-white py-2.5 px-14 rounded-lg shadow-lg text-xs font-semibold uppercase">batal</button>
                    <button class="bg-red-600 py-2.5 px-16 rounded-lg shadow-lg text-xs font-semibold uppercase">iya</button>
                </div>
            </form>
        </div>
    </div>
</x-teacher-layout>