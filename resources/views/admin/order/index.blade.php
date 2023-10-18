@extends('layouts.app')

@section('page-title', 'Dashboard')

@section('main-content')


    @foreach ($orders as $order)
        @foreach ($order as $dish)
            {{ $dish->name }}
        @endforeach
    @endforeach

@endsection