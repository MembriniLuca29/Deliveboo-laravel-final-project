@extends('layouts.app')

@section('page-title', 'Dashboard')


{{-- MAIN CONTENT SECTION  --}}
@section('main-content')
    <div class="my-style-home-dashboard-main h-100">

        <div class="px-5 h-100">
            <div class="px-4  h-100">

                {{-- intestazione main  --}}
                
                <div class="header d-inline col-12">
                    {{-- IF RESTAURANT EXIST --}}
                    @if($restaurant)
                        <h1 class="lh-1 mb-0 fw-normal text-capitalize">
                            Ciao {{ auth()->user()->name }},
                        </h1>
                        <span class="fs-md-3 border-bottom border-warning border-3">
                            qui puoi gestire e monitorare il tuo ristorante
                                <span class="fs-2 text-capitalize">
                                    "{{ $restaurant->name }}"
                                </span>
                        </span>
                    @else
                        <div class="px-5 pt-3">
                            <h1 class="lh-1 mb-0 mt-5 fw-normal text-capitalize">
                                Ciao {{ auth()->user()->name }},
                            </h1>
                        
                            <span class="fs-3 border-bottom border-warning border-3">
                                non ci sono ancora ristoranti, aggiungine uno!
                            </span>
                        </div>
                    @endif

                </div>

                    
                
                    <div id="main-content" class="mt-5 h-100 col-md-12">
                        
                        {{-- IF RESTAURANT DOESNT EXIST --}}
                        @if (!$restaurant)
                        
                        {{-- bottone aggiunta ristorante  --}}
                        <div class="add-button px-lg-3 px-xl-5">
                            <div type="submit" class="btn btn-1 btn-green px-3 mb-3 fw-semibold">
                                <a class="text-decoration-none" href="{{ route('restaurants.create') }}">
                                        + Aggiungi Ristorante
                                </a>
                            </div>
                        </div>
                        

                        {{-- IF RESTAURANT EXISTS --}}
                        @else
                        
                        {{-- DISHES --}}
                        <div id="main-top-cont" class="pt-4 d-flex justify-content-between">
                            <div class="fs-3">
                                Le tue pietanze
                            </div>

                            {{-- bottone aggiunta Pietanze  --}}

                            <div class="add-button">
                                <div type="submit" class="btn btn-1 btn-green px-3 mb-3 fw-semibold">
                                        <a class="text-decoration-none" href="{{ route('dishes.create') }}">+ Aggiungi</a>
                                </div>
                            </div>
                        </div>
                        
                        <div id="main-bot-cont" class="w-100">
                            <div class="px-4 pt-1 pb-3 h-100">
                                <div class="h-100 border-start border-end border-warning border-3 px-5">
                                    <div class="mx-1 pt-1 h-100">

                                        {{-- Dishes searchbar  --}}
                                        <form id="res-search" class="d-flex" role="search">
                                            <input class="form-control border-1 border-dark py-2" type="search" placeholder="Cerca la pietanza di cui hai bisogno..." aria-label="Search">
                                        </form>

                                        {{-- Dishes list section --}}
                                        <div id="res-list" class="mt-3 px-4 overflow-auto overflow-x-hidden">

                                            @foreach ($dishes as $dish)
                                            {{-- my single dishes item  --}}
                                            <div id="single-item" class="bg-secondary bg-opacity-50 mb-3 p-2 row">

                                                {{-- dishes thumb --}}
                                                <div class="col-md-4 col-sm-12">
                                                    <div class="img-box bg-white rounded h-100">
                                                        @if ($dish->thumb)
                                                            <img src="{{ asset('storage/'.$dish->thumb) }}" alt="" class="img-fluid">
                                                        @endif
                                                    </div>
                                                </div>
                                                {{-- dishes Name --}}
                                                <div class="col-md-4 col-sm-12">
                                                    <div class="d-flex flex-column justify-content-center h-100 ms-4 mb-2">
                                                        <h2 class="fw-semibold fs-5">                                                    
                                                            Nome : {{ $dish->name }}
                                                        </h2>
                                                        <h2 class="fw-semibold fs-5">                                                    
                                                            Prezzo : {{ $dish->price }} €
                                                        </h2>
                                                    </div>
                                                </div>

                                                {{-- dishes interaction buttons --}}
                                                <div class="col-md-4 col-sm-12">
                                                    <div id="res-int-buttons" class="d-flex flex-column justify-content-center h-100 align-items-center">
                                                        {{-- dieses visibility button --}}
                                                        <form action="{{ route('dishes.update', ['dish' => $dish->id]) }}" method="POST" onsubmit="return confirm('Sei sicuro di voler modificare la visibilità del piatto?');" class="d-inline">
                                                            @csrf
                                                            @method('PUT')
                                                            <input type="hidden" name="name" value="{{ $dish->name }}">
                                                            <input type="hidden" name="price" value="{{ $dish->price }}">
                                                            <input type="hidden" name="restaurant_id" value="{{ $dish->restaurant_id }}">
                                                            <input type="hidden" name="visible" value="{{ $dish->visible ? '0' : '1' }}">
                                                            
                                                            <button type="submit" class="btn p-2 mb-2 {{ $dish->visible ?  'btn-danger' : 'btn-primary'}}">
                                                                {{ $dish->visible ? 'Nascondi' : 'Mostra' }}
                                                            </button>
                                                        </form>
                                                        
                                                        {{-- Dish edit button --}}
                                                        <div class="edit-button">
                                                            <div type="submit" class="btn btn-1 btn-yellow px-3 fw-semibold">
                                                                    <a class="text-decoration-none" href="{{ route('dishes.edit', ['dish' => $dish->id]) }}">Modifica</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div> 
                                            @endforeach
                                            
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                    @endif
                </div>


            </div>
        </div>
    </div>
@endsection

<style>

.my-style-home-dashboard-main {
    overflow: auto; 
    max-height: 100vh; 
    max-width: 100vw; 
}

</style>