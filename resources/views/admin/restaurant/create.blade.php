@extends('layouts.app')

@section('page-title', 'Crea Ristorante')

@section('main-content')
    <h1>Aggiungi un ristorante</h1>

    <form action="{{ route('restaurants.store') }}" method="POST">
        @csrf
        <input type="text" name="name" placeholder="Name">
        <input type="text" name="address" placeholder="Address">
        <input type="text" name="phone_number" placeholder="Phone Number">
        <input type="text" name="thumb" placeholder="thumb">
        <input type="text" name="p_iva" placeholder="p_iva">
        <div>
            <button type="submit">
                Aggiungi
            </button>
        </div>
    </form>
@endsection