@if($user->role == 'student')
    <x-student-layout title="Profil">
        <div class="w-full mx-auto bg-main shadow-md rounded-lg p-4 my-6">
            <form action="" method="POST">
                @csrf  
                <div class="text-center mb-8">
                    <img class="rounded-full w-40 mx-auto mb-2" src="{{asset($user->photo)}}" alt="Photo profile">
                    <a href="/profile/avatar" class="text-sm font-medium text-link mb-2">Ubah Avatar</a>
                    <p class="text-xl text-main">{{$user->name}}</p>    
                </div>
                <div class="flex flex-col gap-2 mb-6">
                    <label class="text-xs font-semibold text-main" for="name">Nama Lengkap</label>
                    <input class="rounded-lg text-sm focus:outline-none bg-input px-2 py-2.5 text-input placeholder:text-placehodler border" value="{{$user->name}}" type="text" id="name" name="name" placeholder="jhon doe">
                </div>
                <div class="flex flex-col gap-2 mb-6">
                    <label class="text-xs font-semibold text-main" for="email">Alamat Email</label>
                    <input class="rounded-lg text-sm focus:outline-none bg-input px-2 py-2.5 text-input placeholder:text-placehodler border" value="{{$user->email}}" type="email" id="email" name="jhondoe@gmail.comil" placeholder="********">
                </div>
                <div class="flex flex-col gap-2 mb-3">
                    <label class="text-xs font-semibold text-main" for="phone">Nomor Telepon</label>
                    <input class="rounded-lg text-sm focus:outline-none bg-input px-2 py-2.5 text-input placeholder:text-placehodler border" value="{{$user->phone}}" type="tel" id="phone" name="phone" placeholder="08887776665">
                </div>
                <a href="/profile/password" class="text-link block font-semibold text-sm mb-8">Ubah Password</a>
                <button class="w-full uppercase bg-button text-white rounded-md px-4 py-3 font-bold text-xs mb-6">Simpan</button>
            </form>
        </div>
    </x-student-layout>
@else
    <x-teacher-layout title="Profil">
        <div class="w-full mx-auto bg-main shadow-md rounded-lg p-4 my-6">
            <form action="" method="POST">
                @csrf  
                <div class="text-center mb-8">
                    <img class="rounded-full w-40 mx-auto mb-2" src="{{asset($user->photo)}}" alt="Photo profile">
                    <a href="/profile/avatar" class="text-sm font-medium text-link mb-2">Ubah Avatar</a>
                    <p class="text-xl text-main">{{$user->name}}</p>    
                </div>
                <div class="flex flex-col gap-2 mb-6">
                    <label class="text-xs font-semibold text-main" for="name">Nama Lengkap</label>
                    <input class="rounded-lg text-sm focus:outline-none bg-input px-2 py-2.5 text-input placeholder:text-placehodler border" value="{{$user->name}}" type="text" id="name" name="name" placeholder="jhon doe">
                </div>
                <div class="flex flex-col gap-2 mb-6">
                    <label class="text-xs font-semibold text-main" for="email">Alamat Email</label>
                    <input class="rounded-lg text-sm focus:outline-none bg-input px-2 py-2.5 text-input placeholder:text-placehodler border" value="{{$user->email}}" type="email" id="email" name="jhondoe@gmail.comil" placeholder="********">
                </div>
                <div class="flex flex-col gap-2 mb-3">
                    <label class="text-xs font-semibold text-main" for="phone">Nomor Telepon</label>
                    <input class="rounded-lg text-sm focus:outline-none bg-input px-2 py-2.5 text-input placeholder:text-placehodler border" value="{{$user->phone}}" type="tel" id="phone" name="phone" placeholder="08887776665">
                </div>
                <a href="/profile/password" class="text-link block font-semibold text-sm mb-8">Ubah Password</a>
                <button class="w-full uppercase bg-button text-white rounded-md px-4 py-3 font-bold text-xs mb-6">Simpan</button>
            </form>
        </div>
    </x-teacher-layout>
@endif    
