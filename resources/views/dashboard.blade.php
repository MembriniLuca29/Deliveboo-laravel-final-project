@extends('layouts.app')

@section('page-title', 'Dashboard')


{{-- MAIN CONTENT SECTION  --}}
@section('main-content')
    <div class="my-style-home-dashboard-main  h-100">

        <div class="px-5 h-100">
            <div class="px-4  h-100">

                {{-- intestazione main  --}}
                <div class="header d-inline">
                    <h1 class="lh-1 mb-0 fw-normal text-capitalize">
                        Ciao {{ auth()->user()->name }},
                    </h1>
                    <span class="fs-3 border-bottom border-warning border-3">
                        qui puoi gestire e monitorare il tuo ristorante
                    </span>
                </div>

                <div id="main-content" class="mt-5 h-100">

                    {{-- bottone aggiunta ristorante  --}}
                    @if (!$restaurant)
                        <div class="add-button">
                            <div type="submit" class="btn btn-1 btn-green px-3 mb-3 fw-semibold">
                                    <a class="text-decoration-none" href="{{ route('restaurants.create') }}">
                                        + Aggiungi Ristorante
                                    </a>
                            </div>
                        </div>
                    

                    {{-- main bottom content  --}}
                    @else
                    <div class="row">
                        <h1 class="text-center text-success">
                            <span class="text-capitalize">
                                {{ $restaurant->name }}
                            </span>
                        </h1>
                
                        <div class="add-link">
                            <a href="{{ route('dishes.create') }}" class="btn btn-success my-4">
                                + Aggiungi Piatto
                            </a>
                        </div>
                
                        {{-- Restaurants Cards --}}
                        @foreach ($dishes as $dish)

                            <div class="col-12 mb-3">
                                <div class="card">
                                    <div class="card-body text-capitalize d-flex justify-content-between align-item-center">
                                        <div class="d-flex divider">
                                            <div class="price-container d-flex">
                                                {{ $dish->name }} 
                                            </div>
                                            <div>
                                                <h6 class="fix-error">
                                                    {{ $dish->price }}€
                                                </h6>
                                            </div>
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
                    @endif
                </div>


            </div>
        </div>
        {{-- <div class="row">
            <h1 class="text-center text-success">
                Bentornato 
                <span class="text-capitalize">
                    {{ auth()->user()->name }}
                </span>
            </h1>           
            </a>
            <div class="text-center px-5"><a href="{{ route('restaurants.create') }}" class="btn btn-success my-4 px-5">+  Aggiungi Ristorante</a></div>
            Restaurants Cards
            
            @foreach ($restaurants as $restaurant)
            <div class="col-12 mb-3">
                <div class="card">
                    <div class="card-body text-capitalize d-flex justify-content-between">
                        <div>
                            {{ $restaurant->name }}
                        </div>
                        STILE IN LINEA ORRRIBBBBILE!
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
        </div> --}}
    </div>
@endsection