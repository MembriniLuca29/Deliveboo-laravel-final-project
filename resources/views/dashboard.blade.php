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
        </a>
        <div class="text-center px-5"><a href="{{ route('restaurants.create') }}" class="btn btn-success my-4 px-5">+  Aggiungi Ristorante</a></div>
        {{-- Restaurants Cards --}}
        
        @foreach ($restaurants as $restaurant)
        <div class="col-12 mb-3">
            <div class="card">
                <div class="card-body text-capitalize d-flex justify-content-between">
                    <div>
                        {{ $restaurant->name }}
                    </div>
                    {{-- STILE IN LINEA ORRRIBBBBILE! --}}
                    <div style="width:200px; height:100px;">
                        <img src="{{ asset('storage/'.$restaurant->thumb) }}" alt="" class="w-100">
                    </div>
                    <div>
                        <a href="{{ route('restaurants.show', ['restaurant' => $restaurant]) }}" class="btn btn-primary">
                            Vedi
                        </a>
                        <a href="{{ route('restaurants.edit', ['restaurant' => $restaurant]) }}" class="btn btn-warning">
                            Modifica
                        </a>
                        <form action="{{ route('restaurants.destroy', ['restaurant' => $restaurant->id]) }}" method="POST" onsubmit="return confirm('Sei sicuro di voler eliminare questo ristorante?');" class="d-inline">
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