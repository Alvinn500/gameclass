<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>register</title>
    @vite('resources/css/app.css')
    <link rel="icon" href="{{asset("img/favicon.ico")}}" type="image/x-icon">
</head>
<body class="bg-secondary">
    
    <x-navbar/>

    <section class="container md:px-12 lg:px-24 mx-auto">
        <div class="grid grid-cols-2 text-white">
            <!-- <span class="subheading">Classmate</span> -->
            <div class="">
                <h4 class="mt-3 mb-2 text-white text-2xl font-bold"><span>Daftar</span> </h4>
                <h6 class="mb-4 small text-gray-500 text-sm font-light">Sudah memiliki akun? <a href="/login" class="text-primary font-semibold">Login</a></h6>

                @error('email')
                    <div class="text-sm font-light text-red-600">{{$message}}</div>
                @enderror

                @error('password')
                    <div class="text-sm font-light text-red-600">{{$message}}</div>
                @enderror

                <form method="POST" class="mb-5" action="/register">
                    @csrf
                    <div class="">
                        <label class="text-gray-300 text-sm">Nama Lengkap</label>
                        <div class="mb-6 mt-3">
                            <input value="{{old("name")}}" type="text" name="name" class="bg-secondary border-b-primary border-b w-96 p-2 placeholder:text-sm placeholder:text-gray-500 focus:outline-none text-white" placeholder="Masukkan Nama" aria-describedby="username-addon" required>
                        </div>
                        <label class="text-gray-300 text-sm">Email Kamu</label>
                        <div class="mb-6 mt-3">
                            <input value="{{old("email")}}" type="email" name="email" class="bg-secondary border-b-primary border-b w-96 p-2 placeholder:text-sm placeholder:text-gray-500 focus:outline-none text-white" placeholder="Masukkan alamat e-mail" aria-label="username" aria-describedby="username-addon" required>
                        </div>
                        <label class="text-gray-300 text-sm">Nomor Telepon Kamu</label>
                        <div class="mb-6 mt-3">
                            <input value="{{old("phone")}}" type="number" name="phone" class="bg-secondary border-b-primary border-b w-96 p-2 placeholder:text-sm placeholder:text-gray-500 focus:outline-none text-white" placeholder="Masukkan Nomor Telp" aria-label="username" aria-describedby="username-addon" required>
                        </div>
                        <label class="text-gray-300 text-sm">Buat Password</label>
                        <div class="mb-6 mt-3">
                            <input  type="password" name="password" class="bg-secondary border-b-primary border-b w-96 p-2 placeholder:text-sm placeholder:text-gray-500 focus:outline-none text-white" placeholder="Password" aria-label="Buat Password" aria-describedby="password-addon" required autocomplete="off">
                        </div>
                        <label class="text-gray-300 text-sm">Konfirmasi Password</label>
                        <div class="mb-6 mt-3">
                            <input type="password" name='password_confirmation' class="bg-secondary border-b-primary border-b w-96 p-2 placeholder:text-sm placeholder:text-gray-500 focus:outline-none text-white" placeholder="Konfirmasi Password" aria-describedby="password-addon" required autocomplete="off">
                        </div>
                        <label class="text-gray-300 text-sm">Daftar Sebagai</label>
                        <div class="mb-5 mt-3 flex gap-x-4">
                            <div class="flex justify-center gap-x-2">
                                <input class=""  type="radio" name="role" id="flexRadioDefault2" value="student" required>
                                <label class="" for="flexRadioDefault2">
                                    Siswa
                                </label>
                            </div>
                            <div class="flex justify-center gap-x-2">
                                <input class=""  type="radio" name="role" id="flexRadioDefault1" value="teacher" required>
                                <label class="" for="flexRadioDefault1">
                                    Guru
                                </label>
                            </div>

                        </div>
                    </div>
                    <div class=" w-100 mt-5">
                        <button type="submit" class="uppercase bg-gradient-to-r hover:bg-gradient-to-l from-primary to-violet-950 text-sm py-3.5 px-6 font-medium text-white">Daftar Sekarang</button>
                    </div>



                </form>
            </div>
            <div class="col-md-7">
                <img src="{{asset("img/vector/Mobile login-bro.svg")}}" class="w-full" alt="register-img">

            </div>

        </div>
    </section>

</body>
</html>