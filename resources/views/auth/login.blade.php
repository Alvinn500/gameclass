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
                        <h4 class="text-center text-white text-2xl font-bold">Selamat Datang</h4>
                        <p class="text-center text-gray-500 text-sm font-light">Masukan email dan panssword untuk mengakses akun kamu</p>                       
                    </div>
                    
                    @error('email')
                        <div class="text-sm font-light text-red-600">{{$message}}</div>
                    @enderror
    
                    <form method="POST" action="login" class="space-y-6">
                        @csrf
                        <div class="flex flex-col gap-2">
                            <label class="text-white">Email</label>
                            <input type="email" name="email" value="{{old('email')}}" class="bg-neutral-900 rounded-md w-full p-3 text-sm placeholder:text-gray-500 focus:outline-none text-white" placeholder="Masukkan Email" required>
                        </div>
                        <div class="flex flex-col gap-2"> 
                            <label class="text-white">Password</label>
                            <input type="password" name="password" class="bg-neutral-900 rounded-md w-full p-3 text-sm placeholder:text-gray-500 focus:outline-none text-white" placeholder="Masukkan Password" required>
                        </div>
    
                        <div class="text-left">
                            <button type="submit" class="uppercase w-full bg-indigo-600 text-sm rounded-md py-3.5 px-6 font-medium text-white">Masuk</button>
                        </div>
                    </form>
                    <p class="text-center text-gray-500 text-sm font-light">Belum memiliki akun? <a href="register" class="text-lime-500 font-semibold">Daftar</a></p>
                </div>
            </div>
        </section>
    </main>
</body>
</html>