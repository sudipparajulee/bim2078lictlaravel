<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <nav class="flex justify-between items-center px-20 py-5 shadow-md">
        <div>
            <img src="{{asset('logo.png')}}" alt="" class="h-16">
        </div>
        <div>
            <a href="{{route('home')}}" class="p-2">Home</a>
            <a href="{{route('about')}}" class="p-2">About</a>
            <a href="{{route('contact')}}" class="p-2">Contact</a>
            <a href="/login" class="p-2">Login</a>
        </div>
    </nav>

    @yield('content')

    <footer>
        <div class="grid grid-cols-4 px-20 gap-10 bg-gray-200 py-10">
            <div>
                <h2 class="text-2xl font-bold">LOGO</h2>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Porro quis, sapiente fugiat delectus ullam error culpa temporibus consequatur cum! Illo.</p>
            </div>

            <div>
                <h2 class="text-2xl font-bold">Quick Links</h2>
                <ul>
                    <li><a href="/">Home</a></li>
                    <li><a href="/about">About</a></li>
                    <li><a href="">Contact</a></li>
                    <li><a href="">Login</a></li>
                </ul>
            </div>

            <div>
                <h2 class="text-2xl font-bold">Contact Us</h2>
                <p>Email: test@gmail.com <br> Phone: 1234567890</p>
                <p>Address: 123, <br>
                    Chitwan <br>
                    Nepal
                </p>
            </div>

            <div>
                <h2 class="text-2xl font-bold">Social Links</h2>
                <ul>
                    <li><a href="">Facebook</a></li>
                    <li><a href="">Twitter</a></li>
                    <li><a href="">Instagram</a></li>
                    <li><a href="">LinkedIn</a></li>
                </ul>
            </div>
        </div>
        <div class="bg-blue-500 text-white text-center py-5">
            <p>&copy; 2024 All rights reserved</p>
        </div>
    </footer>
</body>
</html>
