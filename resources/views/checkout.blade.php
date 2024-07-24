@extends('layouts.master')
@section('content')
    <h2 class="text-2xl font-semibold text-gray-800 text-center py-10">Checkout</h2>
    <form action="{{route('order.store')}}" method="POST">
        @csrf
        <div class="grid grid-cols-5 gap-10 px-24 py-10">
            <div class="col-span-2 flex gap-5 shadow-lg border rounded-lg">
                <img src="{{ asset('images/'.$cart->product->photopath) }}" alt="checkout" class="w-1/3">
                <div>
                    <h2 class="text-2xl font-semibold text-gray-800">{{ $cart->product->name }}</h2>
                    <p class="text-lg text-gray-600">Price: {{ $cart->product->price }}</p>
                    <p class="text-lg text-gray-600">Quantity: {{ $cart->quantity }}</p>
                    <p class="text-lg text-gray-600">Total: {{ $cart->product->price * $cart->quantity }}</p>
                    <input type="hidden" name="product_id" value="{{$cart->product_id}}">
                    <input type="hidden" name="quantity" value="{{$cart->quantity}}">
                    <input type="hidden" name="price" value="{{$cart->product->price}}">
                    <input type="hidden" name="cart_id" value="{{$cart->id}}">
                </div>
            </div>
            <div class="border shadow-lg rounded-lg px-2 col-span-2">
                <input type="text" placeholder="Name" name="name" class="w-full border rounded-lg p-2" value="{{auth()->user()->name}}">
                <input type="text" placeholder="Address" name="address" class="w-full border rounded-lg p-2 mt-2">
                <input type="text" placeholder="Phone" name="phone" class="w-full border rounded-lg p-2 mt-2">

            </div>
            <div class="col-span-1 border shadow-lg rounded-lg px-2">
                <h2 class="text-2xl font-semibold text-gray-800">Total: {{ $cart->product->price * $cart->quantity }}</h2>
                <select name="payment_method" class="w-full border rounded-lg p-2 mt-2">
                    <option value="COD">Cash On Delivery</option>
                    <option value="Esewa">Esewa</option>
                </select>
                <button class="bg-blue-500 text-white p-2 rounded-lg mt-5">Checkout</button>
            </div>
        </div>
    </form>
@endsection
