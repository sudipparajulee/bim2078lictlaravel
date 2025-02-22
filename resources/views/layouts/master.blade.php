<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link
    href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css"
    rel="stylesheet"
/>
</head>
<body>
    @include('layouts.alert')
    <div class="flex justify-between px-20 bg-blue-500 text-white py-2">
        <div>
            <a href="" class="sm:block hidden"><i class="ri-phone-fill"></i> 0234324234324</a>
        </div>
        <div>
            @auth
            <a href="">Hi, {{auth()->user()->name}}</a>
            <a href="{{route('mycart')}}" class="p-2">My Cart</a>
            <form action="{{route('logout')}}" method="POST" class="inline">
                @csrf
                <button type="submit" class="p-2">Logout</button>
            </form>
            @else
            <a href="/login" class="p-2">Login</a>
            @endauth
        </div>
    </div>
    <nav class="lg:flex hidden justify-between items-center px-20 py-5 shadow-md sticky top-0 bg-white">
        <div>
            <img src="{{asset('logo.png')}}" alt="" class="h-16">
        </div>
        <div>
            <a href="{{route('home')}}" class="p-2">Home</a>
            @php
                $categories = App\Models\Category::orderBy('priority')->get();
            @endphp
            @foreach($categories as $category)
            <a href="{{route('categoryproduct',$category->id)}}" class="p-2">{{$category->name}}</a>
            @endforeach

        </div>
        <form action="{{route('search')}}" method="GET">
            <input type="search" placeholder="Search" class="p-2 border rounded-lg" name="qry" value="{{request()->qry}}" minlength="2" required>
            <button type="submit" class="p-2 bg-blue-500 text-white rounded-lg">Search</button>
        </form>
    </nav>

    <nav class="lg:hidden block px-20 py-5 shadow-md sticky top-0 bg-white">
        <div class="flex justify-between items-center">
            <img src="{{asset('logo.png')}}" alt="" class="h-16">
            <i class="ri-menu-3-line text-2xl border p-4 rounded-lg" onclick="toggleMenu()"></i>
        </div>
        <div class="hidden mt-4" id="mob-menu">
            <a href="{{route('home')}}" class="p-2">Home</a>
            @php
                $categories = App\Models\Category::orderBy('priority')->get();
            @endphp
            @foreach($categories as $category)
            <a href="{{route('categoryproduct',$category->id)}}" class="p-2">{{$category->name}}</a>
            @endforeach

        </div>
    </nav>

    @yield('content')

    <footer>
        <div class="grid md:grid-cols-4 sm:grid-cols-2 px-20 gap-10 bg-gray-200 py-10">
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

    <script>
        function toggleMenu()
        {
            let menu = document.getElementById('mob-menu');
            if(menu.classList.contains('hidden'))
            {
                menu.classList.remove('hidden');
                menu.classList.add('grid');
            }else{
                menu.classList.add('hidden');
                menu.classList.remove('grid');
            }
        }
    </script>
</body>
</html>
