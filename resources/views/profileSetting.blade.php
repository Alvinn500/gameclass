@if($user->role == 'student')
    <x-student-layout title="Profil">
        <div class="w-11/12 mx-auto dark-blue rounded-lg p-4">
            <form>  
                <div class="text-center mb-8">
                    <img class="rounded-full w-40 mx-auto mb-2" src="{{asset("img/default.jpg")}}" alt="Photo profile">
                    <a class="text-sm text-yellow-400 mb-2" href="#">Ubah Avatar</a>
                    <p class="text-xl">qwerty</p>    
                </div>
                <div class="flex flex-col gap-2 mb-6">
                    <label class="text-xs font-semibold" for="name">Nama Lengkap</label>
                    <input class="rounded-md focus:outline-none bg-main p-1.5 border-white border" type="text" id="name" name="name">
                </div>
                <div class="flex flex-col gap-2 mb-6">
                    <label class="text-xs font-semibold" for="email">Alamat Email</label>
                    <input class="rounded-md focus:outline-none bg-main p-1.5 border-white border" type="email" id="email" name="email">
                </div>
                <div class="flex flex-col gap-2 mb-3">
                    <label class="text-xs font-semibold" for="phone">Nomor Telepon</label>
                    <input class="rounded-md focus:outline-none bg-main p-1.5 border-white border" type="tel" id="phone" name="phone">
                </div>
                <a class="text-yellow-400 block font-semibold text-sm mb-8" href="#">Ubah Password</a>
                <button class="w-full uppercase bg-yellow-500 text-black rounded-md px-4 py-3 font-semibold text-xs mb-6">Simpan</button>
            </form>
        </div>
    </x-student-layout>
@else
    <x-teacher-layout title="Profil">
        <div class="w-11/12 mx-auto dark-blue rounded-lg p-4">
            <form>  
                <div class="text-center mb-8">
                    <img class="rounded-full w-40 mx-auto mb-2" src="{{asset("img/default.jpg")}}" alt="Photo profile">
                    <a class="text-sm text-yellow-400 mb-2" href="#">Ubah Avatar</a>
                    <p class="text-xl">qwerty</p>    
                </div>
                <div class="flex flex-col gap-2 mb-6">
                    <label class="text-xs font-semibold" for="name">Nama Lengkap</label>
                    <input class="rounded-md focus:outline-none bg-main p-1.5 border-white border" type="text" id="name" name="name">
                </div>
                <div class="flex flex-col gap-2 mb-6">
                    <label class="text-xs font-semibold" for="email">Alamat Email</label>
                    <input class="rounded-md focus:outline-none bg-main p-1.5 border-white border" type="email" id="email" name="email">
                </div>
                <div class="flex flex-col gap-2 mb-3">
                    <label class="text-xs font-semibold" for="phone">Nomor Telepon</label>
                    <input class="rounded-md focus:outline-none bg-main p-1.5 border-white border" type="tel" id="phone" name="phone">
                </div>
                <a class="text-yellow-400 block font-semibold text-sm mb-8" href="#">Ubah Password</a>
                <button class="w-full uppercase bg-yellow-500 text-black rounded-md px-4 py-3 font-semibold text-xs mb-6">Simpan</button>
            </form>
        </div>
    </x-teacher-layout>
@endif    
