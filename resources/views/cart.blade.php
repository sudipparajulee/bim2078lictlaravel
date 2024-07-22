@extends('layouts.master')
@section('content')
    <h1 class="text-blue-800 text-4xl text-center font-bold my-20">My Cart</h1>
    <div class="grid grid-cols-2">
        @foreach($carts as $cart)
        <div class="p-5 m-5 border shadow-lg flex justify-between gap-5">
            <img src="{{asset('images/'.$cart->product->photopath)}}" alt="" class="w-32 h-32 object-cover">
            <div class="flex-1">
                <h1 class="text-xl font-bold">{{$cart->product->name}}</h1>
                <p>Price: {{$cart->product->price}}</p>
                <p>Quantity: {{$cart->quantity}}</p>
                <p>Total: {{$cart->product->price * $cart->quantity}}</p>
            </div>
            <div class="grid">
                <a onclick="showmodal('{{$cart->id}}')" class="bg-red-500 h-10 text-center block text-white px-3 py-1 rounded-lg">Remove</a>
                <a href="" class="bg-green-500 h-10 text-center block text-white px-3 py-1 rounded-lg">Order Now</a>
            </div>
        </div>
        @endforeach
    </div>

    <div class="fixed inset-0 bg-blue-600 bg-opacity-45 backdrop-blur-md hidden items-center justify-center" id="deletemodal">
        <form action="{{route('cart.destroy')}}" method="POST" class="bg-white p-6 rounded-lg shadow-lg">
            @csrf
            @method('DELETE')
            <input type="hidden" name="dataid" id="dataid">
            <h1 class="text-2xl font-bold text-center text-blue-700">Are you sure to Delete?</h1>
            <div class="flex justify-center gap-5 mt-5">
                <button type="submit" class="bg-blue-600 text-white px-5 py-3 rounded-lg">Yes, Delete</button>
                <a onclick="hidemodal()" class="bg-red-600 text-white block px-12 py-3 rounded-lg">No</a>
            </div>
        </form>
    </div>

    <script>
        function hidemodal(){
            document.getElementById('deletemodal').classList.add('hidden');
            document.getElementById('deletemodal').classList.remove('flex');
        }

        function showmodal(id)
        {
            document.getElementById('dataid').value = id;
            document.getElementById('deletemodal').classList.add('flex');
            document.getElementById('deletemodal').classList.remove('hidden');
        }
    </script>
@endsection
