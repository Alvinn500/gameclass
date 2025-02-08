@if($user->role == 'student')
    <x-student-layout title="Profil">
        <div class="w-full mx-auto">
            <x-breadcrumbs :breadcrumbs="$breadcrumbs"/>
        </div>
        <div class="w-full mx-auto bg-main shadow-md mb-4 rounded-lg p-4">
            <form action="" method="POST">
                @csrf  
                <div class="text-center mb-8">
                    <img class="rounded-full w-40 mx-auto mb-2" src="{{asset($user->photo)}}" alt="Photo profile">
                    <p class="text-xl text-main">{{$user->name}}</p>    
                </div>
                <div class="flex flex-col gap-2 mb-6">
                    <label class="text-xs font-semibold text-main" for="oldPassword">Password Lama</label>
                        <input class="passwordInput rounded-md focus:outline-none bg-input px-2 py-2.5 text-input" type="password" id="oldPassword" name="oldPassword">
                        <x-form-error name="oldPassword"/>
                </div>
                <div class="flex flex-col gap-2 mb-6">
                    <label class="text-xs font-semibold text-main" for="password">Buat Password Baru</label>
                        <input class="passwordInput rounded-md focus:outline-none bg-input px-2 py-2.5 text-input" type="password" id="password" name="password">
                        <x-form-error name="password"/>
                </div>
                <div class="flex flex-col gap-2 mb-6">
                    <label class="text-xs font-semibold text-main" for="password_confirmation">Konfirmasi Password Baru</label>
                        <input class="passwordInput rounded-md focus:outline-none bg-input px-2 py-2.5 text-input" type="password" id="password_confirmation" name="password_confirmation">
                        <x-form-error name="password_confirmation"/>
                    </div>
                <button class="w-full uppercase bg-button text-white rounded-md px-4 py-3 font-semibold text-xs mb-6">Simpan</button>
            </form>
        </div>
    </x-student-layout>
@else
    <x-teacher-layout title="Profil">
        <div class="w-full mx-auto">
            <x-breadcrumbs :breadcrumbs="$breadcrumbs"/>
        </div>
        <div class="w-full mx-auto bg-main shadow-md mb-4 rounded-lg p-4">
            <form action="" method="POST">
                @csrf  
                <div class="text-center mb-8">
                    <img class="rounded-full w-40 mx-auto mb-2" src="{{asset($user->photo)}}" alt="Photo profile">
                    <p class="text-xl text-main">{{$user->name}}</p>    
                </div>
                <div class="flex flex-col gap-2 mb-6">
                    <label class="text-xs font-semibold text-main" for="oldPassword">Password Lama</label>
                        <input class="passwordInput rounded-md focus:outline-none bg-input px-2 py-2.5 text-input" type="password" id="oldPassword" name="oldPassword">
                        <x-form-error name="oldPassword"/>
                </div>
                <div class="flex flex-col gap-2 mb-6">
                    <label class="text-xs font-semibold text-main" for="password">Buat Password Baru</label>
                        <input class="passwordInput rounded-md focus:outline-none bg-input px-2 py-2.5 text-input" type="password" id="password" name="password">
                        <x-form-error name="password"/>
                </div>
                <div class="flex flex-col gap-2 mb-6">
                    <label class="text-xs font-semibold text-main" for="password_confirmation">Konfirmasi Password Baru</label>
                        <input class="passwordInput rounded-md focus:outline-none bg-input px-2 py-2.5 text-input" type="password" id="password_confirmation" name="password_confirmation">
                        <x-form-error name="password_confirmation"/>
                    </div>
                <button class="w-full uppercase bg-button text-white rounded-md px-4 py-3 font-semibold text-xs mb-6">Simpan</button>
            </form>
        </div>
    </x-teacher-layout>
@endif    
