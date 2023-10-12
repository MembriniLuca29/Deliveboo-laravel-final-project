@extends('layouts.app')

@section('page-title', 'Dashboard')

@section('main-content')
    <div class="row">
        <h1 class="text-center text-success">
            Bentornato 
            <span class="text-capitalize">
                {{ auth()->user()->name }}
            </span>
        </h1>

        <a href="{{ route('restaurants.create') }}">
            Aggiungi Ristorante
        </a>

        {{-- Restaurants Cards --}}
        
        @foreach ($restaurants as $restaurant)
        <div class="col-12 mb-3">
            <div class="card">
                <div class="card-body text-capitalize d-flex justify-content-between">
                    <div>
                        {{ $restaurant->name }}
                    </div>
                    <div>
                        <a href="{{ route('restaurants.show', ['restaurant' => $restaurant]) }}" class="btn btn-primary">
                            Vedi
                        </a>

                        <form action="{{ route('restaurants.destroy', ['restaurant' => $restaurant->id]) }}" method="POST" onsubmit="return confirm('Sei sicuro di voler eliminare questo piatto?');" class="d-inline">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger">
                                Elimina
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endsection