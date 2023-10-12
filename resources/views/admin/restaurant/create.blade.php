@extends('layouts.app')

@section('page-title', 'Crea Ristorante')

@section('main-content')
    <h1>Aggiungi un ristorante</h1>

    <form action="{{ route('restaurants.store') }}" method="POST">
        @csrf

        <input type="text" name="name" placeholder="Name" maxlength="50" required>
        <input type="text" name="address" placeholder="Address" maxlength="255" required>
        <input type="text" name="phone_number" placeholder="Phone Number" maxlength="13" required>
        <input type="file" name="thumb" placeholder="thumb" accept=".jpg, .png, .svg">
        <input type="text" name="p_iva" placeholder="p_iva" maxlength="11" required>
        
        <div>
            @foreach ($types as $type)
            <label for="{{ $type->name }}">
                {{ $type->name }}
            </label>
            <input type="checkbox" id="{{ $type->name }}" name="type_id[]" value="{{ $type->id }}" class="me-3">
        @endforeach
        
        </div>
        <div>
            <button type="submit">
                Aggiungi
            </button>
        </div>
    </form>
@endsection