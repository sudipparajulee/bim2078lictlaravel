@extends('layouts.app')
@section('title')
    Create Category
@endsection
@section('content')
    <form action="{{route('categories.store')}}" method="POST" class="mt-5">
        @csrf
        <div class="mb-5">
            <input type="text" placeholder="Enter Priority" class="p-3 w-full rounded-lg" name="priority" value="{{old('priority')}}">
            @error('priority')
                <div class="text-red-500 mt-2 text-sm">
                    * {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-5">
            <input type="text" placeholder="Enter Category Name" class="p-3 w-full rounded-lg" name="name" value="{{old('name')}}">
            @error('name')
                <div class="text-red-500 mt-2 text-sm">
                    * {{ $message }}
                </div>
            @enderror
        </div>
        <div class="flex justify-center">
            <button type="submit" class="bg-indigo-800 text-white py-3 px-5 rounded font-bold">Add Category</button>
            <a href="{{ route('categories.index') }}" class="bg-red-500 text-white py-3 px-5 rounded font-bold ml-3">Cancel</a>
        </div>
    </form>
@endsection
