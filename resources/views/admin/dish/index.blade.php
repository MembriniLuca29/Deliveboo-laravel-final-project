@extends('layouts.app')

@section('page-title', 'Tutti i piatti')

{{-- ASIDE NAV SECTION  --}}
@section('aside-nav-content')
    <div class="my-style-home-dashboard-aside">

    </div>
@endsection

@section('main-content')
    <div class="row ">
        <div class="container ">
            <div class="dish-container d-flex flex-wrap">
                @foreach ($dishes as $dish)
                    <div class="card " style="width: 18rem;">
                        <img src="{{ $dish->thumb }}" class="card-img-top" alt="...">
                        <div class="card-body">
                        <div class="d-flex justify-content-between"><h5 class="card-title">{{ $dish->name }}</h5><h3>{{ $dish->price }}€</h3></div>
                        <p class="card-text">{{ $dish->description }}</p>
                        </div>
                        <div class="button ">
                        
                            <button class="btn btn-primary toggle-visibility">
                                aggiungi al carrello
                            </button>
                                
                          
        
                    </div>
                  </div>
     

                @endforeach
            </div>
            @endsection







