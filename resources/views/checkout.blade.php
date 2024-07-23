@extends('layouts.master')
@section('content')
    <h2 class="text-2xl font-semibold text-gray-800 text-center py-10">Checkout</h2>
    <div class="grid grid-cols-5 gap-10 px-24 py-10">
        <div class="col-span-2 flex gap-5 shadow-lg border rounded-lg">
            <img src="{{ asset('images/'.$cart->product->photopath) }}" alt="checkout" class="w-1/3">
            <div>
                <h2 class="text-2xl font-semibold text-gray-800">{{ $cart->product->name }}</h2>
                <p class="text-lg text-gray-600">Price: {{ $cart->product->price }}</p>
                <p class="text-lg text-gray-600">Quantity: {{ $cart->quantity }}</p>
                <p class="text-lg text-gray-600">Total: {{ $cart->product->price * $cart->quantity }}</p>
            </div>
        </div>
        <div class="border shadow-lg rounded-lg px-2 col-span-2">
            <input type="text" placeholder="Name" class="w-full border rounded-lg p-2">
            <input type="text" placeholder="Address" class="w-full border rounded-lg p-2 mt-2">
            <input type="text" placeholder="Phone" class="w-full border rounded-lg p-2 mt-2">

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
@endsection
