@extends('layouts.app')

@section('page-title', 'Dashboard')

{{-- MAIN CONTENT SECTION  --}}
@section('main-content')
    <div class="my-style-home-dashboard-main  h-100">

        <div class="px-0 px-lg-3 px-xl-2 px-xxl-5 h-100">
            <div id="cont-2" class="px-2 px-md-2 px-xl-3 px-xl-4 h-100">

                
                {{-- intestazione main  --}}
                
                <div class="header d-inline">
                    {{-- IF RESTAURANT EXIST --}}
                    @if($restaurant)
                        <h1 class="lh-1 mb-0 fw-normal text-capitalize">
                            Ciao {{ auth()->user()->name }},
                        </h1>
                        {{-- situation on small screen devices  --}}
                        <span class="fs-5 d-block d-md-none border-bottom border-warning border-3">
                            <span>
                                il tuo ristorante
                            </span>
                            <span class="fs-4">
                                "{{ $restaurant->name }}"
                            </span>
                        </span>
                        {{-- situation on mid screen devices  --}}
                        <span class="d-none d-md-block d-xl-none fs-4 border-bottom border-warning border-3">
                            qui puoi gestire e monitorare il tuo ristorante
                                <span class="fs-3">
                                    "{{ $restaurant->name }}"
                                </span>
                        </span>
                        {{-- situation on large screen devices  --}}
                        <span class="d-none d-xl-block fs-3 border-bottom border-warning border-3">
                            qui puoi gestire e monitorare il tuo ristorante
                                <span class="fs-2">
                                    "{{ $restaurant->name }}"
                                </span>
                        </span>

                    @else
                        <div class="px-0 px-md-2 px-lg-4 px-xl-5 pt-0 pt-lg-3">
                            <h1 class="lh-1 mb-0 mt-0 mt-md-2 mt-lg-3 mt-xl-5 fw-normal text-capitalize">
                                Ciao {{ auth()->user()->name }},
                            </h1>

                            {{-- situation on small screen devices  --}}
                            <span class="fs-5 d-block d-md-none border-bottom border-warning border-3">
                                non ci sono ancora ristoranti, aggiungine uno!
                            </span>
                            {{-- situation on mid screen devices  --}}
                            <span class="d-none d-md-block d-xl-none fs-4 border-bottom border-warning border-3">
                                non ci sono ancora ristoranti, aggiungine uno!
                            </span>
                            {{-- situation on large screen devices  --}}
                            <span class="d-none d-xl-block fs-3 border-bottom border-warning border-3">
                                non ci sono ancora ristoranti, aggiungine uno!
                            </span>
                        </div>
                    @endif

                </div>
                
                <div id="main-content" class="mt-md-2 mt-lg-3 mt-xl-4 h-100">
                        
                    {{-- IF RESTAURANT DOESNT EXIST --}}
                    @if (!$restaurant)
                        
                        {{-- bottone aggiunta ristorante  --}}
                        <div class="add-button pt-3 pt-lg-0 px-lg-3 px-xl-5">
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
                            {{-- situation on small screen devices  --}}
                            <div class="fs-5 d-block d-md-none mt-2">
                                Le tue pietanze
                            </div>
                            {{-- situation on mid screen devices  --}}
                            <div class="fs-4 d-none d-md-block d-xl-none">
                                Le tue pietanze
                            </div>
                            {{-- situation on large screen devices  --}}
                            <div class="fs-3 d-none d-xl-block">
                                Le tue pietanze
                            </div>
                            

                            {{-- bottone aggiunta Pietanze  --}}
                            <div class="add-button">
                                <div type="submit" class="btn btn-1 btn-green py-0 py-md-1 px-md-3 mb-1 mb-md-3 fw-semibold">
                                        <a class="text-decoration-none" href="{{ route('dishes.create') }}">
                                            <span class=" fs-2 d-md-none">+</span>
                                            <span class="d-none d-md-inline">+ Aggiungi</span>
                                        </a>
                                </div>
                            </div>
                        </div>
                        
                        <div id="main-bot-cont" class="w-100">
                            <div class="px-1 px-md-2 px-lg-3 px-xl-4 pt-1 pb-3 h-100">
                                <div class="h-100 border-start border-end border-warning border-3 px-1 px-md-2 px-lg-3 px-xxl-5">
                                    <div class="mx-1 pt-1 h-100">

                                        {{-- Dishes searchbar  --}}
                                        <input id="search-input" class="form-control border-1 border-dark py-2" type="search" placeholder="Cerca una pietanza..." aria-label="Search">

                                        {{-- Dishes list section --}}
                                        <div class="res-list mt-3 px-1 px-lg-4 overflow-auto overflow-x-hidden">

                                            @foreach ($dishes as $dish)
                                            <div class="items-container">
                                                {{-- my single dishes item DESKTOP --}}
                                                <div id="single-item" class="bg-secondary bg-opacity-50 my-2 p-2 row d-none d-lg-flex">

                                                    {{-- dishes thumb --}}
                                                    <div class="col-12 col-sm-6 col-md-4">
                                                        <div class="img-box bg-white rounded">
                                                            <img src="{{ asset('storage/'.$dish->thumb) }}" alt="">
                                                        </div>
                                                    </div>
                                                    {{-- dishes Name --}}
                                                    <div class="col-12 col-sm-6 col-md-4">
                                                        <div class="d-flex flex-column justify-content-center h-100 ms-4 mb-2">
                                                            <h2 class="fw-semibold fs-5 dish-name">                                                    
                                                                Nome : <span id="item-name">{{ $dish->name }}</span>
                                                            </h2>
                                                            <h2 class="fw-semibold fs-5">      
                                                                Prezzo : {{ $dish->price }} €
                                                            </h2>
                                                        </div>
                                                    </div>

                                                    {{-- dishes interaction buttons --}}
                                                    <div class=" col-12 col-sm-12 col-md-4">
                                                        <div id="res-int-buttons" class="d-flex flex-column justify-content-center h-100 align-items-center">
                                                            {{-- dishes visibility button --}}
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
                                                            {{-- <div class="details-button">
                                                                <div type="submit" class="btn btn-1 btn-blue px-3 mb-3 fw-semibold">
                                                                        <a class="text-decoration-none" href="{{ route('restaurants.show', ['restaurant' => $restaurant]) }}">a</a>
                                                                </div>
                                                            </div> --}}
                                                            
                                                            {{-- Dish edit button --}}
                                                            <div class="edit-button">
                                                                <div type="submit" class="btn btn-1 btn-yellow px-3 fw-semibold">
                                                                        <a class="text-decoration-none" href="{{ route('dishes.edit', ['dish' => $dish->id]) }}">Modifica</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> 
                                            </div>
                                            @endforeach
                                            

                                            @foreach ($dishes as $dish)
                                                <div class="items-container d-lg-none">
                                                    {{-- my single dishes item MOBILE --}}
                                                    <div id="single-item-mobile" class="bg-secondary bg-opacity-50 d-flex flex-column align-items-center h-100 py-1 px-1 rounded-3 mb-3">
    
                                                        {{-- dishes thumb MOBILE --}}
                                                        <div class="img-box-mobile bg-white rounded-3 mb-2">
                                                            @if ($dish->thumb)
                                                                <img src="{{ asset('storage/'.$dish->thumb) }}" alt="">
                                                            @else
                                                                <div class="text-center px-4 py-4 mt-2 fw-semibold">Immagine non presente</div>
                                                            @endif
                                                        </div>
    
                                                        {{-- dishes name MOBILE --}}
                                                        <div class="px-3">
                                                            <div class="fw-semibold dish-name">                                                    
                                                                Nome : <span id="item-name">{{ $dish->name }}</span>
                                                            </div>
                                                            <div class="fw-semibold">                                                    
                                                                Prezzo : {{ $dish->price }} €
                                                            </div>
                                                        </div>
                                                        
                                                        {{-- dishes buttons MOBILE  --}}
                                                        <form class="my-2" action="{{ route('dishes.update', ['dish' => $dish->id]) }}" method="POST" onsubmit="return confirm('Sei sicuro di voler modificare la visibilità del piatto?');" class="d-inline">
                                                            @csrf
                                                            @method('PUT')
                                                            <input type="hidden" name="name" value="{{ $dish->name }}">
                                                            <input type="hidden" name="price" value="{{ $dish->price }}">
                                                            <input type="hidden" name="restaurant_id" value="{{ $dish->restaurant_id }}">
                                                            <input type="hidden" name="visible" value="{{ $dish->visible ? '0' : '1' }}">
                                                            
                                                            <button type="submit" class="btn py-1 {{ $dish->visible ?  'btn-danger' : 'btn-primary'}}">
                                                                {{ $dish->visible ? 'Nascondi' : 'Mostra' }}
                                                            </button>
                                                        </form>
                                                        <div class="edit-button">
                                                            <div type="submit" class="btn btn-1 btn-yellow py-0 fw-semibold">
                                                                    <a class="text-decoration-none" href="{{ route('dishes.edit', ['dish' => $dish->id]) }}">Modifica</a>
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
