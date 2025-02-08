<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>register</title>
        @vite('resources/css/app.css')
        <link rel="icon" href="{{asset("image/logo.png")}}" type="image/x-icon">
    </head>
    <body class="bg-secondary">
        <x-navbar/>

        <section class="container mx-auto flex justify-center items-center mt-8">
            <div class=" text-white w-[70%]">
                <h4 class="mt-3 mb-2 text-title text-2xl font-bold text-center">Buat Akun</h4>
                <h6 class="mb-4 text-neutral-600 text-sm font-semibold text-center">Sudah memiliki akun? <a href="/login" class="text-link font-semibold">Login</a></h6>

                @error('email')
                    <div class="text-sm font-light text-red-600">{{$message}}</div>
                @enderror

                @error('password')
                    <div class="text-sm font-light text-red-600">{{$message}}</div>
                @enderror

                <form method="POST" class="mb-5" action="/register">
                    @csrf
                    <div>
                        <div class="mb-6 mt-3 flex flex-col gap-3">
                            <label class="text-main text-sm font-semibold">Nama Lengkap</label>
                            <input value="{{old("name")}}" type="text" name="name" class="bg-input text-input border border-neutral-300 rounded-md w-full p-3 text-sm placeholder:text-placehodler focus:outline-none" placeholder="Masukkan Nama" required>
                        </div>
                        <div class="mb-6 mt-3 flex flex-col gap-3">
                            <label class="text-main text-sm font-semibold">Email Kamu</label>
                            <input value="{{old("email")}}" type="email" name="email" class="bg-input text-input border border-neutral-300 rounded-md w-full p-3 text-sm placeholder:text-placehodler focus:outline-none" placeholder="Masukkan alamat e-mail" required>
                        </div>
                        <div class="mb-6 mt-3 flex flex-col gap-3">
                            <label class="text-main text-sm font-semibold">Nomor Telepon Kamu</label>
                            <input value="{{old("phone")}}" type="number" name="phone" class="bg-input text-input border border-neutral-300 rounded-md w-full p-3 text-sm placeholder:text-placehodler focus:outline-none" placeholder="Masukkan Nomor Telp" required>
                        </div>
                        <div class="mb-6 mt-3 flex flex-col gap-3">
                            <label class="text-main text-sm font-semibold">Buat Password</label>
                            <input  type="password" name="password" class="bg-input text-input border border-neutral-300 rounded-md w-full p-3 text-sm placeholder:text-placehodler focus:outline-none" placeholder="Password" required autocomplete="off">
                        </div>
                        <div class="mb-6 mt-3 flex flex-col gap-3">
                            <label class="text-main text-sm font-semibold">Konfirmasi Password</label>
                            <input type="password" name='password_confirmation' class="bg-input text-input border border-neutral-300 rounded-md w-full p-3 text-sm placeholder:text-placehodler focus:outline-none" placeholder="Konfirmasi Password" required autocomplete="off">
                        </div>
                        <div class="mb-5 mt-3 flex gap-x-4">
                            <div class="flex justify-center gap-x-2">
                                <label class="text-main text-sm font-semibold">Daftar Sebagai</label>
                                <input type="radio" name="role" id="flexRadioDefault2" value="student" required>
                                <label class="text-main font-medium uppercase text-sm" for="flexRadioDefault2">
                                    Siswa
                                </label>
                            </div>
                            <div class="flex justify-center gap-x-2">
                                <input type="radio" name="role" id="flexRadioDefault1" value="teacher" required>
                                <label class="text-main font-medium uppercase text-sm" for="flexRadioDefault1">
                                    Guru
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class=" w-100 mt-5">
                        <button type="submit" class="uppercase bg-button shadow-sm w-full text-sm py-3.5 px-6 font-medium text-main">Daftar Sekarang</button>
                    </div>
                </form>
            </div>
        </section>
    </body>
</html>