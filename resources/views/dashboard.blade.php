@extends('layouts.app')
@section('title') Dashboard @endsection
@section('content')
    <div class="grid grid-cols-3 gap-10 p-4">
        <div class="px-5 py-8 bg-blue-500 text-white flex justify-between items-center rounded-lg">
            <h2 class="text-2xl font-bold">Total Categories</h2>
            <p class="text-3xl font-bold">{{$totalcategories}}</p>
        </div>

        <div class="px-5 py-8 bg-green-500 text-white flex justify-between items-center rounded-lg">
            <h2 class="text-2xl font-bold">Total Orders</h2>
            <p class="text-3xl font-bold">{{$totalorders}}</p>
        </div>

        <div class="px-5 py-8 bg-yellow-500 text-white flex justify-between items-center rounded-lg">
            <h2 class="text-2xl font-bold">Total Products</h2>
            <p class="text-3xl font-bold">{{$totalproducts}}</p>
        </div>

        <div class="px-5 py-8 bg-red-500 text-white flex justify-between items-center rounded-lg">
            <h2 class="text-2xl font-bold">Pending Orders</h2>
            <p class="text-3xl font-bold">{{$pendingorders}}</p>
        </div>

        <div class="px-5 py-8 bg-purple-500 text-white flex justify-between items-center rounded-lg">
            <h2 class="text-2xl font-bold">Processing Orders</h2>
            <p class="text-3xl font-bold">{{$processingorders}}</p>
        </div>

        <div class="px-5 py-8 bg-indigo-500 text-white flex justify-between items-center rounded-lg">
            <h2 class="text-2xl font-bold">Delivered Orders</h2>
            <p class="text-3xl font-bold">{{$deliveredorders}}</p>
        </div>


        <div>
            <canvas id="myChart"></canvas>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
      const ctx = document.getElementById('myChart');

      new Chart(ctx, {
        type: 'pie',
        data: {
          labels: {!! json_encode($allcategories) !!},
          datasets: [{
            label: '# of Votes',
            data: {!! json_encode($categoryproduct) !!},
            borderWidth: 1
          }]
        },
        options: {
          scales: {
            // y: {
            //   beginAtZero: true
            // }
          }
        }
      });
    </script>
@endsection
