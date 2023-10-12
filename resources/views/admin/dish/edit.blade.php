@extends('layouts.app')

@section('page-title', 'Modifica '.$dish->name)

@section('main-content')
    <div class="row">
        <div class="col bg-info-subtle">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('dishes.update', ['dish' => $dish->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="name" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="name" name="name" required maxlength="255" value="{{ old('name', $dish->name) }}">
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Descrizione</label>
                    <textarea class="form-control" id="description" name="description" rows="3">{{ old('description', $dish->description) }}</textarea>
                </div>
                
                <div class="mb-3">
                    <label for="price" class="form-label">Prezzo</label>
                    <input type="text" class="form-control" id="price" name="price" required maxlength="255" value="{{ old('price', $dish->price) }}">
                </div>
                
                <input type="hidden" name="restaurant_id" value="{{ $restaurantId }}">
                <div class="mb-3">
                    <label for="thumb" class="form-label">Immagine</label>
                    <input class="form-control" type="file" name="thumb" id="thumb" accept="image/*">

                    @if ($dish->thumb)
                        <div>
                           
                            <img src="{{ asset('storage/' . $dish->thumb) }}" class="w-50" alt="{{ $dish->title }}">
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" name="remove_thumb" id="remove_thumb">
                            <label class="form-check-label" for="remove_thumb">
                                Rimuovi immagine
                            </label>
                        </div>
                    @endif
                </div>



                <div>
                    <button type="submit" class="btn btn-warning">
                        Aggiorna
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
