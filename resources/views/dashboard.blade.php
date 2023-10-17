@extends('layouts.app')

@section('page-title', 'Dashboard')

{{-- ASIDE NAV SECTION  --}}
@section('aside-nav-content')
    <div class="my-style-home-dashboard-aside">

    </div>
@endsection

{{-- MAIN CONTENT SECTION  --}}
@section('main-content')
    <div class="my-style-home-dashboard-main  h-100">

        <div class="px-5 h-100">
            <div class="px-4  h-100">

                {{-- intestazione main  --}}
                <div class="header d-inline">
                    <h1 class="lh-1 mb-0 fw-normal">Ciao {{ auth()->user()->name }},</h1>
                    <span class="fs-3 border-bottom border-warning border-3">qui puoi gestire e monitorare i tuoi ristoranti!</span>
                </div>

                <div id="main-content" class="mt-5 h-100">

                    {{-- main top content  --}}
                    <div id="main-top-cont" class="pt-4 d-flex justify-content-between">
                        <div class="fs-3">
                            I Tuoi Ristoranti
                        </div>

                        {{-- bottone aggiunta ristorante  --}}
                        <div class="add-button">
                            <div type="submit" class="btn btn-1 btn-green px-3 mb-3 fw-semibold">
                                    <a class="text-decoration-none" href="{{ route('restaurants.create') }}">+ Aggiungi</a>
                            </div>
                        </div>

                    </div>

                    {{-- main bottom content  --}}
                    <div id="main-bot-cont" class="w-100">
                        <div class="px-4 pt-1 pb-3 h-100">
                            <div class="h-100 border-start border-end border-warning border-3 px-5">
                                <div class="mx-1 pt-1 h-100">

                                    {{-- Restaurants searchbar  --}}
                                    <form id="res-search" class="d-flex" role="search">
                                        <input class="form-control border-1 border-dark py-2" type="search" placeholder="Cerca il ristorante di cui hai bisogno..." aria-label="Search">
                                    </form>

                                    {{-- restaurants list section --}}
                                    <div id="res-list" class="pt-3 px-4 overflow-auto overflow-x-hidden">

                                        @foreach ($restaurants as $restaurant)
                                        {{-- my single restaurant item  --}}
                                        <div id="single-item" class="bg-secondary bg-opacity-50 mb-3 p-2 row">

                                            {{-- Restaurant thumb --}}
                                            <div class="col-4">
                                                <div class="img-box bg-white rounded h-100">
                                                    <img src="{{ asset('storage/'.$restaurant->thumb) }}" alt="">
                                                </div>
                                            </div>
                                            {{-- Restaurant Name --}}
                                            <div class="col-4">
                                                <div class="d-flex flex-column justify-content-center h-100 align-items-center">
                                                    <h2 class="fw-semibold fs-5">                                                    
                                                        {{ $restaurant->name }}
                                                    </h2>
                                                </div>
                                            </div>

                                            {{-- restaurant interaction buttons --}}
                                            <div class="col-4">
                                                <div id="res-int-buttons" class="d-flex flex-column justify-content-center h-100 align-items-center">
                                                    {{-- Restaurant show button --}}
                                                    <div class="details-button">
                                                        <div type="submit" class="btn btn-1 btn-blue px-3 mb-3 fw-semibold">
                                                                <a class="text-decoration-none" href="{{ route('restaurants.show', ['restaurant' => $restaurant]) }}">Dettagli</a>
                                                        </div>
                                                    </div>
                                                    {{-- Restaurant edit button --}}
                                                    <div class="edit-button">
                                                        <div type="submit" class="btn btn-1 btn-yellow px-3 fw-semibold">
                                                                <a class="text-decoration-none" href="{{ route('restaurants.edit', ['restaurant' => $restaurant]) }}">Modifica</a>
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