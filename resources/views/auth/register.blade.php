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

        <section class="container md:px-12 lg:px-24 mx-auto flex justify-center items-center">
            <div class=" text-white w-[70%]">
                <h4 class="mt-3 mb-2 text-indigo-800 text-2xl font-bold text-center">Buat Akun</h4>
                <h6 class="mb-4 text-neutral-600 text-sm font-semibold text-center">Sudah memiliki akun? <a href="/login" class="text-lime-500 font-semibold">Login</a></h6>

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
                            <label class="text-neutral-800 text-sm font-semibold">Nama Lengkap</label>
                            <input value="{{old("name")}}" type="text" name="name" class="bg-white border border-neutral-300 rounded-md w-full p-3 text-sm placeholder:text-gray-500 focus:outline-none text-white" placeholder="Masukkan Nama" aria-describedby="username-addon" required>
                        </div>
                        <div class="mb-6 mt-3 flex flex-col gap-3">
                            <label class="text-neutral-800 text-sm font-semibold">Email Kamu</label>
                            <input value="{{old("email")}}" type="email" name="email" class="bg-white border border-neutral-300 rounded-md w-full p-3 text-sm placeholder:text-gray-500 focus:outline-none text-white" placeholder="Masukkan alamat e-mail" aria-label="username" aria-describedby="username-addon" required>
                        </div>
                        <div class="mb-6 mt-3 flex flex-col gap-3">
                            <label class="text-neutral-800 text-sm font-semibold">Nomor Telepon Kamu</label>
                            <input value="{{old("phone")}}" type="number" name="phone" class="bg-white border border-neutral-300 rounded-md w-full p-3 text-sm placeholder:text-gray-500 focus:outline-none text-white" placeholder="Masukkan Nomor Telp" aria-label="username" aria-describedby="username-addon" required>
                        </div>
                        <div class="mb-6 mt-3 flex flex-col gap-3">
                            <label class="text-neutral-800 text-sm font-semibold">Buat Password</label>
                            <input  type="password" name="password" class="bg-white border border-neutral-300 rounded-md w-full p-3 text-sm placeholder:text-gray-500 focus:outline-none text-white" placeholder="Password" aria-label="Buat Password" aria-describedby="password-addon" required autocomplete="off">
                        </div>
                        <div class="mb-6 mt-3 flex flex-col gap-3">
                            <label class="text-neutral-800 text-sm font-semibold">Konfirmasi Password</label>
                            <input type="password" name='password_confirmation' class="bg-white border border-neutral-300 rounded-md w-full p-3 text-sm placeholder:text-gray-500 focus:outline-none text-white" placeholder="Konfirmasi Password" aria-describedby="password-addon" required autocomplete="off">
                        </div>
                        <div class="mb-5 mt-3 flex gap-x-4">
                            <div class="flex justify-center gap-x-2">
                                <label class="text-neutral-800 text-sm font-semibold">Daftar Sebagai</label>
                                <input type="radio" name="role" id="flexRadioDefault2" value="student" required>
                                <label class="text-neutral-800 font-medium uppercase text-sm" for="flexRadioDefault2">
                                    Siswa
                                </label>
                            </div>
                            <div class="flex justify-center gap-x-2">
                                <input type="radio" name="role" id="flexRadioDefault1" value="teacher" required>
                                <label class="text-neutral-800 font-medium uppercase text-sm" for="flexRadioDefault1">
                                    Guru
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class=" w-100 mt-5">
                        <button type="submit" class="uppercase bg-indigo-600 w-full text-sm py-3.5 px-6 font-medium text-white">Daftar Sekarang</button>
                    </div>
                </form>
            </div>
        </section>
    </body>
</html>