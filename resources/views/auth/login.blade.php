<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <link rel="icon" href="{{asset("image/logo.png")}}" type="image/x-icon">
    <title>login</title>
</head>
<body class="bg-secondary">
    <x-navbar/>

    <main class="container md:px-12 lg:px-24 mx-auto">
        <section>
            <div class="flex justify-center items-center h-[90vh] w-full px-4 sm:px-0">
                <div class="space-y-4"> 
                    <div class="space-y-2">
                        <h4 class="text-center text-title text-2xl font-bold">Selamat Datang</h4>
                        <p class="text-center text-secondary text-sm font-light">Masukan email dan panssword untuk mengakses akun kamu</p>                       
                    </div>
                    
                    @error('email')
                        <div class="text-sm font-light text-red-600">{{$message}}</div>
                    @enderror
    
                    <form method="POST" action="login" class="space-y-6">
                        @csrf
                        <div class="flex flex-col gap-2">
                            <label class="text-main font-semibold text-sm">Email</label>
                            <input type="email" name="email" value="{{old('email')}}" class="bg-input border rounded-md w-full p-3 text-sm placeholder:text-placehodler focus:outline-none text-input" placeholder="Masukkan Email" required>
                        </div>
                        <div class="flex flex-col gap-2"> 
                            <label class="text-main font-semibold text-sm">Password</label>
                            <input type="password" name="password" class="bg-input border rounded-md w-full p-3 text-sm placeholder:text-placehodler focus:outline-none text-input" placeholder="Masukkan Password" required>
                        </div>
    
                        <div class="text-left">
                            <button type="submit" class="uppercase w-full bg-button text-sm rounded-md py-3.5 px-6 font-medium text-main">Masuk</button>
                        </div>
                    </form>
                    <p class="text-center text-main text-sm font-light">Belum memiliki akun? <a href="register" class="text-link font-semibold">Daftar</a></p>
                </div>
            </div>
        </section>
    </main>
</body>
</html>