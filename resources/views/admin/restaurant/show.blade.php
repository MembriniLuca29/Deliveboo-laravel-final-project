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

         {{-- <a href="{{ route('admin.dish.create') }}" class="btn w-100 btn-success mb-5"> --}}
            <div class="add-link"><a href="" class="btn btn-success my-4">+ Aggiungi</a></div>

        {{-- Restaurants Cards --}}
        
        @foreach ($dishes as $dish)
        <div class="col-12 mb-3">
            <div class="card">
                <div class="card-body text-capitalize d-flex justify-content-between align-item-center">
                    <div class="d-flex divider">
                        <div class="price-container d-flex">{{ $dish->name }} </div>
                        <div><h6 class="fix-error">{{ $dish->price }}€</h6></div>
                    </div>
                    
                    <div class="button ">

                        <button class="btn btn-primary toggle-visibility" data-dish-id="{{ $dish->id }}" data-visible="{{ $dish->visible ? 'true' : 'false' }}">
                            {{ $dish->visible ? 'Nascondi' : 'Mostra' }}
                        </button>

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
        </div>
        @endforeach
    </div>
@endsection