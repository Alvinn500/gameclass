@if($user->role == 'student')
    <x-student-layout title="Profil">
        <div class="w-full mx-auto">
            <x-breadcrumbs :breadcrumbs="$breadcrumbs"/>
        </div>
        <div class="w-full mx-auto bg-white shadow-md mb-4 py-4 rounded-lg">
            <div class="text-center mb-8">
                <img class="rounded-full w-36 mx-auto mb-2" src="{{asset($user->photo)}}" alt="Photo profile">
                <p class="text-xl font-semibold text-neutral-800">{{$user->name}}</p>    
            </div>
            <div class="mb-4 w-[60%] mx-auto">
                <x-form-error name="avatar"/>
                <h1 class="font-semibold text-neutral-800">Pilih Avatar</h1>
            </div>
            <div class="grid grid-cols-4 md:grid-cols-5 gap-4 w-[60%] mx-auto">
                <form action="" method="POST">
                    @csrf
                    <input type="hidden" name="avatar" value="image/avatar/ava1.png">
                    <button type="submit"><img class="w-20" src="{{asset("image/avatar/ava1.png")}}" alt="avatar image"></button>
                </form>
                <form action="" method="POST">
                    @csrf
                    <input type="hidden" name="avatar" value="image/avatar/ava2.png">
                    <button type="submit"><img class="w-20" src="{{asset("image/avatar/ava2.png")}}" alt="avatar image"></button>
                </form>
                <form action="" method="POST">
                    @csrf
                    <input type="hidden" name="avatar" value="image/avatar/ava3.png">
                    <button type="submit"><img class="w-20" src="{{asset("image/avatar/ava3.png")}}" alt="avatar image"></button>
                </form>
                <form action="" method="POST">
                    @csrf
                    <input type="hidden" name="avatar" value="image/avatar/ava4.png">
                    <button type="submit"><img class="w-20" src="{{asset("image/avatar/ava4.png")}}" alt="avatar image"></button>
                </form>
                <form action="" method="POST">
                    @csrf
                    <input type="hidden" name="avatar" value="image/avatar/ava5.png">
                    <button type="submit"><img class="w-20" src="{{asset("image/avatar/ava5.png")}}" alt="avatar image"></button>
                </form>
                <form action="" method="POST">
                    @csrf
                    <input type="hidden" name="avatar" value="image/avatar/ava6.png">
                    <button type="submit"><img class="w-20" src="{{asset("image/avatar/ava6.png")}}" alt="avatar image"></button>
                </form>
                <form action="" method="POST">
                    @csrf
                    <input type="hidden" name="avatar" value="image/avatar/ava7.png">
                    <button type="submit"><img class="w-20" src="{{asset("image/avatar/ava7.png")}}" alt="avatar image"></button>
                </form>
                <form action="" method="POST">
                    @csrf
                    <input type="hidden" name="avatar" value="image/avatar/ava8.png">
                    <button type="submit"><img class="w-20" src="{{asset("image/avatar/ava8.png")}}" alt="avatar image"></button>
                </form>
                <form action="" method="POST">
                    @csrf
                    <input type="hidden" name="avatar" value="image/avatar/ava9.png">
                    <button type="submit"><img class="w-20" src="{{asset("image/avatar/ava9.png")}}" alt="avatar image"></button>
                </form>
                <form action="" method="POST">
                    @csrf
                    <input type="hidden" name="avatar" value="image/avatar/ava10.png">
                    <button type="submit"><img class="w-20" src="{{asset("image/avatar/ava10.png")}}" alt="avatar image"></button>
                </form>
            </div>
        </div>
    </x-student-layout>
@else
    <x-teacher-layout title="Profil">
        <div class="w-full mx-auto">
            <x-breadcrumbs :breadcrumbs="$breadcrumbs"/>
        </div>
        <div class="w-full mx-auto bg-white shadow-md mb-4 py-4 rounded-lg">
            <div class="text-center mb-8">
                <img class="rounded-full w-36 mx-auto mb-2" src="{{asset($user->photo)}}" alt="Photo profile">
                <p class="text-xl font-semibold text-neutral-800">{{$user->name}}</p>    
            </div>
            <div class="mx-48">
                <x-form-error name="avatar"/>
                <h1 class="font-semibold text-neutral-800">Pilih Avatar</h1>
            </div>
            <div class="grid grid-cols-5 gap-4 w-[60%] mx-auto">
                <form action="" method="POST">
                    @csrf
                    <input type="hidden" name="avatar" value="image/avatar/ava1.png">
                    <button type="submit"><img class="w-20" src="{{asset("image/avatar/ava1.png")}}" alt="avatar image"></button>
                </form>
                <form action="" method="POST">
                    @csrf
                    <input type="hidden" name="avatar" value="image/avatar/ava2.png">
                    <button type="submit"><img class="w-20" src="{{asset("image/avatar/ava2.png")}}" alt="avatar image"></button>
                </form>
                <form action="" method="POST">
                    @csrf
                    <input type="hidden" name="avatar" value="image/avatar/ava3.png">
                    <button type="submit"><img class="w-20" src="{{asset("image/avatar/ava3.png")}}" alt="avatar image"></button>
                </form>
                <form action="" method="POST">
                    @csrf
                    <input type="hidden" name="avatar" value="image/avatar/ava4.png">
                    <button type="submit"><img class="w-20" src="{{asset("image/avatar/ava4.png")}}" alt="avatar image"></button>
                </form>
                <form action="" method="POST">
                    @csrf
                    <input type="hidden" name="avatar" value="image/avatar/ava5.png">
                    <button type="submit"><img class="w-20" src="{{asset("image/avatar/ava5.png")}}" alt="avatar image"></button>
                </form>
                <form action="" method="POST">
                    @csrf
                    <input type="hidden" name="avatar" value="image/avatar/ava6.png">
                    <button type="submit"><img class="w-20" src="{{asset("image/avatar/ava6.png")}}" alt="avatar image"></button>
                </form>
                <form action="" method="POST">
                    @csrf
                    <input type="hidden" name="avatar" value="image/avatar/ava7.png">
                    <button type="submit"><img class="w-20" src="{{asset("image/avatar/ava7.png")}}" alt="avatar image"></button>
                </form>
                <form action="" method="POST">
                    @csrf
                    <input type="hidden" name="avatar" value="image/avatar/ava8.png">
                    <button type="submit"><img class="w-20" src="{{asset("image/avatar/ava8.png")}}" alt="avatar image"></button>
                </form>
                <form action="" method="POST">
                    @csrf
                    <input type="hidden" name="avatar" value="image/avatar/ava9.png">
                    <button type="submit"><img class="w-20" src="{{asset("image/avatar/ava9.png")}}" alt="avatar image"></button>
                </form>
                <form action="" method="POST">
                    @csrf
                    <input type="hidden" name="avatar" value="image/avatar/ava10.png">
                    <button type="submit"><img class="w-20" src="{{asset("image/avatar/ava10.png")}}" alt="avatar image"></button>
                </form>
            </div>
        </div>
    </x-teacher-layout>
@endif    
