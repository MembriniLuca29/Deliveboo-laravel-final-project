@extends('layouts.app')

@section('page-title', 'Dashboard')

@php
    session(['restaurant_id' => $restaurant->id]);
@endphp

@section('main-content')

    <div class="row">
        <h1 class="text-center text-success">
            <span class="text-capitalize">
                {{ $restaurant->name }}
            </span>
        </h1>

        <a href="{{ route('dishes.create') }}">
            Aggiungi Piatto
        </a>

        {{-- Restaurants Cards --}}
        
        @foreach ($dishes as $dish)
        <div class="col-12 mb-3">
            <div class="card">
                <div class="card-body text-capitalize d-flex justify-content-between">
                    <div>
                        {{ $dish->name }}
                    </div>
                    <div>
                        <a href="{{ route('dishes.show', ['dish' => $dish]) }}" class="btn btn-primary">
                            Vedi
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
        </div>
        @endforeach
    </div>
@endsection