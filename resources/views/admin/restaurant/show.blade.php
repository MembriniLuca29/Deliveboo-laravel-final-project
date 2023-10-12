@extends('layouts.app')

@section('page-title', 'Dashboard')

@section('main-content')
    <div class="row">
        <h1 class="text-center text-success">
            <span class="text-capitalize">
                {{ $restaurant->name }}
            </span>
        </h1>

        <div class="add-link">
            <a href="{{ route('dishes.create') }}" class="btn btn-success my-4">+ Aggiungi</a>
        </div>

        {{-- Restaurants Cards --}}
        @foreach ($dishes as $dish)
            <div class="col-12 mb-3">
                <div class="card">
                    <div class="card-body text-capitalize d-flex justify-content-between align-item-center">
                        <div class="d-flex divider">
                            <div class="price-container d-flex">{{ $dish->name }} </div>
                            <div><h6 class="fix-error">{{ $dish->price }}€</h6></div>
                        </div>

                        {{-- Pulsante Nascondi/Mostra --}}
                    <form action="{{ route('dishes.update', ['dish' => $dish->id]) }}" method="POST" onsubmit="return confirm('Sei sicuro di voler modificare la visibilità del piatto?');" class="d-inline">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="name" value="{{ $dish->name }}">
                        <input type="hidden" name="price" value="{{ $dish->price }}">
                        <input type="hidden" name="restaurant_id" value="{{ $dish->restaurant_id }}">
                        <input type="hidden" name="visible" value="{{ $dish->visible ? '0' : '1' }}">
                        
                        <button type="submit" class="btn p-2 {{ $dish->visible ? 'btn-primary' : 'btn-danger' }}">
                            {{ $dish->visible ? 'Nascondi' : 'Mostra' }}
                        </button>
                    </form>
    
                        <a href="{{ route('dishes.edit', ['dish' => $dish->id]) }}" class="btn btn-warning ">
                            Modifica
                        </a>
                        
                        <form action="{{ route('dishes.destroy', ['dish' => $dish->id]) }}" method="POST" onsubmit="return confirm('Sei sicuro di voler eliminare questo piatto?');" class="d-inline">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger">
                                Elimina
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        
        @endforeach
   
    </div>
@endsection