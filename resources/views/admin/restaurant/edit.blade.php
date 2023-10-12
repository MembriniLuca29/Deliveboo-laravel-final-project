@extends('layouts.app')

@section('page-title', 'Crea Ristorante')

@section('main-content')
    <h1>Modifica
        <span class="text-capitalize">
            {{ $restaurant->name }}
        </span>
    </h1>

    <form action="{{ route('restaurants.update', ['restaurant' => $restaurant]) }}" method="post" enctype="multipart/form-data">
        @method('PUT')
        @csrf

        <input type="text" name="name" placeholder="Name" maxlength="50" required value="{{ old('name', $restaurant->name) }}">
        <input type="text" name="address" placeholder="Address" maxlength="255" required value="{{ old('address', $restaurant->address) }}">
        <input type="text" name="phone_number" placeholder="Phone Number" maxlength="13" required value="{{ old('phone_number', $restaurant->phone_number) }}">
        <input type="file" name="thumb" placeholder="thumb" accept="image/*">

        @if ($restaurant->thumb)
            <div>
                <img src="{{ asset('storage/' . $restaurant->thumb) }}" class="w-50" alt="{{ $restaurant->name }}">
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="1" name="remove_thumb" id="remove_thumb">
                <label class="form-check-label" for="remove_thumb">
                    Rimuovi immagine
                </label>
            </div>
        @endif

        <input type="text" name="p_iva" placeholder="p_iva" maxlength="11" required value="{{ old('p_iva', $restaurant->p_iva) }}">
        
        
        <div>
            @foreach ($types as $index => $type)

                <label for="{{ $type->name }}">
                    {{ $type->name }}
                </label>

                <input type="checkbox" id="{{ $type->name }}" name="type_id[]" value="{{ $type->id }}" class="me-3"
                    @if ($restaurant->types->contains($type))
                        checked
                    @endif
                >

            @endforeach
        </div>
        
        <div>
            <button type="submit">
                Salva
            </button>
        </div>
    </form>
@endsection