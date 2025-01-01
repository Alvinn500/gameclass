<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <link rel="icon" href="{{asset("img/favicon.ico")}}" type="image/x-icon">
    <title>login</title>
</head>
<body class="bg-secondary">
    <x-navbar/>

    <main class="container md:px-12 lg:px-24 mx-auto">
        <section>
            <div class="grid grid-cols-1 md:grid-cols-2">
                <div class="hidden lg:block">
                    <img src="{{asset("/img/vector/Mobile login-cuate.svg")}}" class="w-full mx-auto" alt="login-img" style="position:relative">
                </div>
                <div class="pb-5 mt-16">                    
                    <h4 class="mt-3 mb-2 text-white text-2xl font-bold"><span>Login</span> </h4>
                    <h6 class="mb-4 small text-gray-500 text-sm font-light">Belum memiliki akun? <a href="register" class="text-primary font-semibold">Daftar</a></h6>
                    
                    @error('email')
                        <div class="text-sm font-light text-red-600">{{$message}}</div>
                    @enderror
    
                    <form method="POST" action="login">
                        @csrf
                        <label class="text-white">Email</label>
                        <div class="mb-6 mt-3">
                            <input type="email" name="email" value="{{old('email')}}" class="bg-secondary border-b-primary border-b w-96 p-2 placeholder:text-sm placeholder:text-gray-500 focus:outline-none text-white" placeholder="Masukkan Email" required>
                        </div>
                        <label class="text-white">Password</label>
                        <div class="mb-6 mt-3"> 
                            <input type="password" name="password" class="bg-secondary border-b-primary border-b w-96 p-2 placeholder:text-sm placeholder:text-gray-500 focus:outline-none text-white" placeholder="Masukkan Password" required>
                        </div>
    
                        <div class="text-left">
                            <button type="submit" class="uppercase bg-gradient-to-r hover:bg-gradient-to-l from-primary to-violet-950 text-sm py-3.5 px-6 font-medium text-white">Masuk</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </main>
</body>
</html>