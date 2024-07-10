@extends('layouts.app')
@section('title')
    Edit Brand
@endsection
@section('content')
    <form action="{{route('brands.update',$brand->id)}}" method="POST" class="mt-5">
        @csrf
        <div class="mb-5">
            <input type="text" placeholder="Enter Brand Name" class="p-3 w-full rounded-lg" name="name" value="{{$brand->name}}">
            @error('name')
                <div class="text-red-500 mt-2 text-sm">
                    * {{ $message }}
                </div>
            @enderror
        </div>
        <div class="flex justify-center">
            <button type="submit" class="bg-indigo-800 text-white py-3 px-5 rounded font-bold">Update Brand</button>
            <a href="{{ route('brands.index') }}" class="bg-red-500 text-white py-3 px-5 rounded font-bold ml-3">Cancel</a>
        </div>
    </form>
@endsection
