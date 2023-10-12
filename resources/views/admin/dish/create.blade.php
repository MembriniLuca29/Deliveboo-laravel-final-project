@extends('layouts.app')

@section('page-title', 'Crea Piatto')

@section('main-content')
    <h1>Aggiungi un piatto</h1>

    <form action="{{ route('dishes.store') }}" method="POST">
        @csrf
        <input type="text" name="name" placeholder="Name">
        <input type="text" name="description" placeholder="Description">
        <input type="number" name="price" placeholder="Price">
        <div>
            <button type="submit">
                Aggiungi
            </button>
        </div>
    </form>

    {{ $errors }}
@endsection