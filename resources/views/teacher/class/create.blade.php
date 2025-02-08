<x-teacher-layout title="Buat Kelas">
    <div class="h-full flex">
        <div class="w-full">
            <form action="" method="POST" enctype="multipart/form-data" class="bg-main shadow-md px-6 py-8 rounded-xl inline-block w-full">
                @csrf
                <div class="flex flex-col mb-3 gap-2">
                    <label for="study_name" class="text-sm text-main font-medium">Nama Mata Pelajaran</label>
                    <input class="focus:outline-none py-2.5 px-3 text-sm text-input bg-input placeholder:text-placehodler rounded-lg" type="text" name="study_name" id="study_name" placeholder="Masukkan Nama Mata Pelajaran">
                    <x-form-error name="study_name"/>
                </div>
                <div class="flex flex-col mb-3 gap-2">
                    <label for="school_name" class="text-sm text-main font-medium">Nama Sekolah</label>
                    <input class="focus:outline-none py-2.5 px-3 text-sm text-input bg-input placeholder:text-placehodler rounded-lg" type="text" name="school_name" id="school_name" placeholder="Masukkan Nama Sekolah">
                    <x-form-error name="school_name"/>
                </div>
                <div class="flex flex-col mb-3 gap-2">
                    <label for="class" class="text-sm text-main font-medium">Kelas</label>
                    <input class="focus:outline-none py-2.5 px-3 text-sm text-input bg-input placeholder:text-placehodler rounded-lg" type="text" name="class" id="class" placeholder="Masukkan Nama Kelas (contoh: XII RPL D)">
                    <x-form-error name="class"/>
                </div>
                <div class="flex flex-col mb-3 gap-2">
                    <label for="logo_class" class="text-sm text-main font-medium">Logo Kelas</label>
                    <input class="focus:outline-none py-2.5 px-3 text-sm text-input bg-input placeholder:text-placehodler rounded-lg" type="file" name="logo_class" id="logo_class">
                    <x-form-error name="logo_class"/>
                </div>
                <button class="uppercase font-semibold py-3 px-4 text-xs rounded-lg bg-button">Buat kelas</button>
            </form>
        </div>
    </div>
</x-teacher-layout>