@if($user->role == 'student')
    <x-student-layout title="Profil">
        <div class="w-11/12 mx-auto dark-blue rounded-lg p-4 my-6">
            <form action="" method="POST">
                @csrf  
                <div class="text-center mb-8">
                    <img class="rounded-full w-40 mx-auto mb-2" src="{{asset($user->photo)}}" alt="Photo profile">
                    <a href="/profile/avatar" class="text-sm font-medium text-lime-500 mb-2">Ubah Avatar</a>
                    <p class="text-xl">{{$user->name}}</p>    
                </div>
                <div class="flex flex-col gap-2 mb-6">
                    <label class="text-xs font-semibold" for="name">Nama Lengkap</label>
                    <input class="rounded-lg text-sm focus:outline-none bg-main px-2 py-2.5 border-gray-400 border" value="{{$user->name}}" type="text" id="name" name="name">
                </div>
                <div class="flex flex-col gap-2 mb-6">
                    <label class="text-xs font-semibold" for="email">Alamat Email</label>
                    <input class="rounded-lg text-sm focus:outline-none bg-main px-2 py-2.5 border-gray-400 border" value="{{$user->email}}" type="email" id="email" name="email">
                </div>
                <div class="flex flex-col gap-2 mb-3">
                    <label class="text-xs font-semibold" for="phone">Nomor Telepon</label>
                    <input class="rounded-lg text-sm focus:outline-none bg-main px-2 py-2.5 border-gray-400 border" value="{{$user->phone}}" type="tel" id="phone" name="phone">
                </div>
                <a href="/profile/password" class="text-lime-500 block font-semibold text-sm mb-8">Ubah Password</a>
                <button class="w-full uppercase bg-violet-800 text-white rounded-md px-4 py-3 font-bold text-xs mb-6">Simpan</button>
            </form>
        </div>
    </x-student-layout>
@else
    <x-teacher-layout title="Profil">
        <div class="w-11/12 mx-auto dark-blue rounded-lg p-4 my-6">
            <form action="" method="POST">
                @csrf  
                <div class="text-center mb-8">
                    <img class="rounded-full w-40 mx-auto mb-2" src="{{asset($user->photo)}}" alt="Photo profile">
                    <a href="/profile/avatar" class="text-sm font-medium text-lime-500 mb-2">Ubah Avatar</a>
                    <p class="text-xl">{{$user->name}}</p>    
                </div>
                <div class="flex flex-col gap-2 mb-6">
                    <label class="text-xs font-semibold" for="name">Nama Lengkap</label>
                    <input class="rounded-lg text-sm focus:outline-none bg-main px-2 py-2.5 border-gray-400 border" value="{{$user->name}}" type="text" id="name" name="name">
                </div>
                <div class="flex flex-col gap-2 mb-6">
                    <label class="text-xs font-semibold" for="email">Alamat Email</label>
                    <input class="rounded-lg text-sm focus:outline-none bg-main px-2 py-2.5 border-gray-400 border" value="{{$user->email}}" type="email" id="email" name="email">
                </div>
                <div class="flex flex-col gap-2 mb-3">
                    <label class="text-xs font-semibold" for="phone">Nomor Telepon</label>
                    <input class="rounded-lg text-sm focus:outline-none bg-main px-2 py-2.5 border-gray-400 border" value="{{$user->phone}}" type="tel" id="phone" name="phone">
                </div>
                <a href="/profile/password" class="text-lime-500 block font-semibold text-sm mb-8">Ubah Password</a>
                <button class="w-full uppercase bg-violet-800 text-white rounded-md px-4 py-3 font-bold text-xs mb-6">Simpan</button>
            </form>
        </div>
    </x-teacher-layout>
@endif    
