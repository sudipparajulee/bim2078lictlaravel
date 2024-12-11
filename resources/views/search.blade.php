@extends('layouts.master')
@section('content')

<h1 class="text-blue-800 text-4xl text-center font-bold mt-10">Search Results -- {{$qry}}</h1>

<div class="grid grid-cols-4 gap-10 px-20 py-12">
    @forelse($products as $product)
    <div class="rounded-lg shadow-md p-4">
        <img src="{{asset('images/'.$product->photopath)}}" alt="" class="h-44 w-full object-cover">
        <h1 class="text-xl font-bold mt-2">{{$product->name}}</h1>
        <p class="text-gray-500 line-clamp-3">{{$product->description}}</p>
        <div class="flex justify-between items-center mt-4">
            <h1 class="text-xl font-bold">Rs.{{$product->price}}</h1>
            <a href="{{route('viewproduct',$product->id)}}" class="bg-gradient-to-r from-red-600 via-yellow-400 to-gray-600 text-white px-3 py-1.5 rounded-lg">View Product</a>
        </div>
    </div>
    @empty
    <h1 class="text-gray-500 text-4xl text-center font-bold mt-10 col-span-4">No Product Found</h1>
    @endforelse

</div>

@endsection
