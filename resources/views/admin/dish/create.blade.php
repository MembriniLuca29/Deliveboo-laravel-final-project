@extends('layouts.app')

@section('page-title', 'Crea Piatto')


@section('main-content')
    <div id="my-style-dashboard-dish-create" class="h-100">
        <div class="px-0 px-lg-3 px-xl-2 px-xxl-5 h-100">
            <div class="px-2 px-md-2 px-xl-3 px-xl-4 h-100">

                {{-- intestazione main  --}}
                
                <div class="header d-inline">
                    <span>
                        <h1 class="lh-1 mb-0 fw-normal border-bottom border-warning border-3 pb-2 pb-sm-3 pb-md-4 pt-xl-3 pb-xl-5">
                            <span class="py-5">Pietanze</span>
                        </h1>
                    </span>
                </div>

                    
                
                <div id="main-content" class="mt-1 mt-sm-2 mt-xl-3 mt-xxl-5 h-100">
                    
                    {{-- intestazione main --}}
                    <div id="main-top-cont" class="py-2 pb-3 d-flex justify-content-between">
                        <div class="fs-2 d-none d-md-inline">
                            Aggiungi una pietanza
                        </div>
                        <div class="fs-4 d-md-none">
                            Aggiungi una pietanza
                        </div>
                    </div>
                    
                    <div id="main-bot-cont" class="w-100">
                        <div class="px-1 px-md-2 px-lg-3 px-xl-4 pt-1 pb-3 h-100">
                            <div class="overflow-x-hidden overflow-y-auto h-100 border-start border-end border-warning border-3 px-1 px-md-2 px-lg-3 px-xl-5">
                                <div class="mx-1 pt-2 pt-md-4 pt-lg-4 px-md-3 pt-xl-5 h-100">
                                    <div>
                                        {{-- Form to create Dish --}}
                                        <form id="res-create-form" action="{{ route('dishes.store') }}" method="POST" enctype="multipart/form-data">
                                            @csrf

                                            <div class="row">
                                                {{-- Dish Name --}}
                                                <div class="col-lg-6 col-12 px-4 mb-3">
                                                    <div class="form-floating mb-3">
                                                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="name@example.com" maxlength="50" required>
                                                        <label for="name">Nome 
                                                            <span class="text-danger">
                                                                *
                                                            </span>
                                                        </label>
                                                        {{-- @error('name')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror --}}
                                                    </div>
                                                </div>

                                                {{-- Dish Description --}}
                                                <div class="col-lg-6 col-12 px-4 mb-3">
                                                    <div class="form-floating mb-3">
                                                        <textarea class="form-control" id="description" name="description" placeholder="descrizione" rows="3">{{ old('description', $dish->description ?? '') }}</textarea>
                                                        <label for="description">Descrizione
                                                        </label>
                                                    </div>
                                                </div>

                                                {{-- Dish Price --}}
                                                <div class="col-lg-6 col-12 px-4 mb-3">
                                                    <div class="form-floating mb-3">
                                                        <input type="number" name="price" step="0.01" min="0.00" max="499.99" id="price" class="form-control" placeholder="Inserisci il prezzo" required>
                                                        <label for="price">Prezzo
                                                            <span class="text-danger">
                                                                *
                                                            </span>
                                                        </label>
                                                    </div>
                                                </div>


                                                {{-- Dish Thumb --}}
                                                <div class="col-lg-6 col-12 px-4 mb-3">
                                                    <div class="input-group mb-3">
                                                        <input type="file" class="form-control border-top-0 border-end-0 border-start-0 mt-2" id="thumb" name="thumb" accept="image/*" style="border-radius: 0">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="text-center mt-5">
                                                <button id="btn-1" class="btn button" type="submit">
                                                    Aggiungi
                                                </button>
                                            </div>
                                        </form>
                                        @if($errors->any())
                                        <div class="alert alert-danger mt-3">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        @endif
                                    </div>


                                </div>
                            </div>
                        </div>

                    </div>
                </div>


            </div>
        </div>
    </div>
@endsection

{{-- @section('main-content')
    <h1>Aggiungi un piatto</h1>

    <form action="{{ route('dishes.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="name">Nome:</label>
            <input type="text" name="name" id="name" maxlength="50" class="form-control" placeholder="Inserisci il nome" required>
        </div>

        <div class="form-group">
            <label for="description">Descrizione:</label>
            <input type="text" name="description" id="description" class="form-control" placeholder="Inserisci la descrizione">
        </div>

        <div class="form-group">
            <label for="price">Prezzo:</label>
            <input type="number" name="price" step="0.01" min="0.00" max="499.99" id="price" class="form-control" placeholder="Inserisci il prezzo" required>
        </div>

        <div class="form-group">
            <label for="thumb">Immagine:</label>
            <input type="file" name="thumb" id="thumb" class="form-control" accept="image/*">
        </div>
        
        <input type="hidden" name="restaurant_id" value="{{ $restaurant->id }}">


        <div class="form-group mt-3">
            <button type="submit" class="btn btn-primary">Aggiungi</button>
        </div>
    </form>

    @if($errors->any())
        <div class="alert alert-danger mt-3">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
@endsection --}}
