@extends('layouts.app')

@section('page-title', 'Dashboard')

@section('main-content')


    @foreach ($orders as $orderArray)
        @foreach ($orderArray as $order)
            <div>
                {{ $order->name }}
            </div>
        @endforeach
    @endforeach

@endsection