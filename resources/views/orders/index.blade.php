@extends('layouts.app')
@section('title')
    Orders
@endsection
@section('content')
    <table class="w-full">
        <tr>
            <th>Product</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Total</th>
            <th>Payment Method</th>
            <th>Status</th>
        </tr>
        @foreach($orders as $order)
            <tr>
                <td>{{ $order->product->name }}</td>
                <td>{{ $order->quantity }}</td>
                <td>{{ $order->price }}</td>
                <td>{{ $order->total }}</td>
                <td>{{ $order->payment_method }}</td>
                <td>{{ $order->status }}</td>
            </tr>
        @endforeach
    </table>
@endsection
