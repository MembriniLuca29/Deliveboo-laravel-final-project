@extends('layouts.app')

@section('page-title', 'Tutti i piatti')

@section('main-content')
    <div class="row ">
        <div class="container ">
            {{-- <a href="{{ route('admin.dish.create') }}" class="btn w-100 btn-success mb-5"> --}}
            <div class="add-link"><a href="" class="btn btn-success">+ Aggiungi</a></div>

            <div class="dish-container d-flex flex-wrap">
                @foreach ($dishes as $dish)
                    <div class="card " style="width: 18rem;">
                        <img src="{{ $dish->thumb }}" class="card-img-top" alt="...">
                        <div class="card-body">
                        <div class="d-flex justify-content-between"><h5 class="card-title">{{ $dish->name }}</h5><h3>{{ $dish->price }}€</h3></div>
                        <p class="card-text">{{ $dish->description }}</p>
                        </div>
                        <div class="button ">
                        
                            <button class="btn btn-primary toggle-visibility" data-dish-id="{{ $dish->id }}" data-visible="{{ $dish->visible ? 'true' : 'false' }}">
                                {{ $dish->visible ? 'Nascondi' : 'Mostra' }}
                            </button>
                                
                          
                        <a href="{{ route('dishes.edit', ['dish' => $dish->id]) }}" class="btn btn-warning ">
                            Modifica
                        </a>
                        <form action="{{ route('dishes.destroy', ['dish' => $dish->id]) }}" method="POST" onsubmit="return confirm('Sei sicuro di voler eliminare questo piatto?');">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger">
                                Elimina
                            </button>
                        </form>
                    </div>
                  </div>
     

                @endforeach
            </div>
            @endsection







