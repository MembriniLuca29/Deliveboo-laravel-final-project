@extends('layouts.app')

@section('page-title', 'Crea Piatto')

@section('main-content')
    <h1>Aggiungi un piatto</h1>

    <form action="{{ route('dishes.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="name">Nome:</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="Inserisci il nome" required>
        </div>

        <div class="form-group">
            <label for="description">Descrizione:</label>
            <input type="text" name="description" id="description" class="form-control" placeholder="Inserisci la descrizione">
        </div>

        <div class="form-group">
            <label for="price">Prezzo:</label>
            <input type="number" name="price" step="0.01" min="0.00" max="999.99" id="price" class="form-control" placeholder="Inserisci il prezzo" required>
        </div>

        <div class="form-group">
            <label for="thumb">Immagine:</label>
            <input type="file" name="thumb" id="thumb" class="form-control" accept="image/*">
        </div>
        
        <input type="hidden" name="restaurant_id" value="{{ $restaurant->id }}">


        <div class="form-group mt-3">
            <button type="submit" class="btn btn-primary">Aggiungi</button>
        </div>
    </form>

    @if($errors->any())
        <div class="alert alert-danger mt-3">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
@endsection
