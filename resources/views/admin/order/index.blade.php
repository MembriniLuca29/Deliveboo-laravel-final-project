@extends('layouts.app')

@section('page-title', 'Dashboard')

@section('main-content')


    @foreach ($orders as $orderArray)
        @foreach ($orderArray as $order)
           

            <div class="card order-card ms-4 mb-2" >
                <div class="card-header">
                    {{ $order->name }} {{ $order->last_name }} <h6>data: {{ $order->updated_at }} </h6>
                </div>
                <ul class="list-group list-group-flush">
                  <li class="list-group-item">numero: {{ $order->phone_number }} </li>
                  <li class="list-group-item">email: {{ $order->email }}</li>
                  <li class="list-group-item">stato: {{ $order->status}}</li>
                  <li class="list-group-item">piatti: {{ $order->dishes}}</li>
                </ul>
              </div>
        @endforeach
    @endforeach

@endsection
{{-- 
<li class="list-group-item">piatti: {{ json_decode($order->dishes)[0]->name }}
</li> --}}