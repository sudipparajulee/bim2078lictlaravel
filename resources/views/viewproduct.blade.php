@extends('layouts.master')
@section('content')
    <div class="grid grid-cols-4 px-20 my-10 gap-10">
        <div class="col-span-1">
            <img src="{{asset('images/'.$product->photopath)}}" alt="" class="h-96 w-full object-cover">
        </div>
        <div class="col-span-2 px-4 border-x">
            <h1 class="text-4xl font-bold text-blue-800">{{$product->name}}</h1>
            <h1 class="text-2xl font-bold mt-4">Rs.{{$product->price}}</h1>
            <div class="flex items-center">
                <span class=" py-2 bg-blue-600 text-white px-4 text-xl cursor-pointer" onclick="decreaseqty()">-</span>
                <input type="text" class="w-12 py-5 h-10 text-center" value="1" readonly id="quantity">
                <span class=" py-2 bg-blue-600 text-white px-4 text-xl cursor-pointer" onclick="increaseqty()">+</span>
            </div>
            <p class="text-gray-500 mt-1">In stock: <span id="stock">{{$product->stock}}</span></p>
            <a href="" class="bg-gradient-to-r from-red-600 via-yellow-400 to-gray-600 text-white px-3 py-1.5 rounded-lg mt-4 inline-block">Add to Cart</a>
        </div>
        <div>
            <p>Free Delivery</p>
            <p>Delivery in 2-3 days</p>
            <p>7 days return policy</p>
        </div>
    </div>

    <script>
        function increaseqty()
        {
            var quantity = document.getElementById('quantity').value;
            var stock = document.getElementById('stock').innerHTML;
            if(quantity<stock)
            {
                quantity++;
                document.getElementById('quantity').value = quantity;
            }
        }

        function decreaseqty()
        {
            var quantity = document.getElementById('quantity').value;
            if(quantity>1)
            {
                quantity--;
                document.getElementById('quantity').value = quantity;
            }
        }
    </script>
@endsection
