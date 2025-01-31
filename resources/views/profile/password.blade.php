@if($user->role == 'student')
    <x-student-layout title="Profil">
        <div class="w-11/12 mx-auto">
            <x-breadcrumbs :breadcrumbs="$breadcrumbs"/>
        </div>
        <div class="w-11/12 mx-auto dark-blue rounded-lg p-4">
            <form action="" method="POST">
                @csrf  
                <div class="text-center mb-8">
                    <img class="rounded-full w-40 mx-auto mb-2" src="{{asset($user->photo)}}" alt="Photo profile">
                    <p class="text-xl">qwerty</p>    
                </div>
                <div class="flex flex-col gap-2 mb-6">
                    <label class="text-xs font-semibold" for="oldPassword">Password Lama</label>
                        <input class="passwordInput rounded-md focus:outline-none bg-main px-2 py-2.5 border-white border" type="password" id="oldPassword" name="oldPassword">
                        <x-form-error name="oldPassword"/>
                </div>
                <div class="flex flex-col gap-2 mb-6">
                    <label class="text-xs font-semibold" for="password">Buat Password Baru</label>
                        <input class="passwordInput rounded-md focus:outline-none bg-main px-2 py-2.5 border-white border" type="password" id="password" name="password">
                        <x-form-error name="password"/>
                </div>
                <div class="flex flex-col gap-2 mb-6">
                    <label class="text-xs font-semibold" for="password_confirmation">Konfirmasi Password Baru</label>
                        <input class="passwordInput rounded-md focus:outline-none bg-main px-2 py-2.5 border-white border" type="password" id="password_confirmation" name="password_confirmation">
                        <x-form-error name="password_confirmation"/>
                    </div>
                <button class="w-full uppercase bg-violet-800 text-white rounded-md px-4 py-3 font-semibold text-xs mb-6">Simpan</button>
            </form>
        </div>
    </x-student-layout>
@else
    <x-teacher-layout title="Profil">
        <div class="w-11/12 mx-auto">
            <x-breadcrumbs :breadcrumbs="$breadcrumbs"/>
        </div>
        <div class="w-11/12 mx-auto dark-blue rounded-lg p-4">
            <form action="" method="POST">
                @csrf  
                <div class="text-center mb-8">
                    <img class="rounded-full w-40 mx-auto mb-2" src="{{asset($user->photo)}}" alt="Photo profile">
                    <p class="text-xl">qwerty</p>    
                </div>
                <div class="flex flex-col gap-2 mb-6">
                    <label class="text-xs font-semibold" for="name">Password Lama</label>
                    <input class="rounded-md focus:outline-none bg-main px-2 py-2.5 border-white border" type="text" id="name" name="name">
                </div>
                <div class="flex flex-col gap-2 mb-6">
                    <label class="text-xs font-semibold" for="email">Buat Password Baru</label>
                    <input class="rounded-md focus:outline-none bg-main px-2 py-2.5 border-white border" type="email" id="email" name="email">
                </div>
                <div class="flex flex-col gap-2 mb-6">
                    <label class="text-xs font-semibold" for="phone">Konfirmasi Password Baru</label>
                    <input class="rounded-md focus:outline-none bg-main px-2 py-2.5 border-white border" type="tel" id="phone" name="phone">
                </div>
                <button class="w-full uppercase bg-violet-800 text-white rounded-md px-4 py-3 font-semibold text-xs mb-6">Simpan</button>
            </form>
        </div>
    </x-teacher-layout>
@endif    
