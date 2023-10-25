@extends('layouts.app')

@section('page-title', 'Modifica '.$dish->name)

@section('main-content')
    <div id="my-style-dashboard-dish-edit" class="h-100">
        <div class="px-0 px-lg-3 px-xl-2 px-xxl-5 h-100">
            <div class="px-2 px-md-2 px-xl-3 px-xl-4 h-100">

                {{-- intestazione main  --}}
                <div class="header d-inline">
                    <span>
                        <h1 class="lh-1 mb-0 fw-normal border-bottom border-warning border-3 pb-2 pb-sm-3 pb-md-4 pt-xl-3 pb-xl-5">
                            <span class="py-5">{{ $dish->name }}</span>
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
                                        <form id="res-create-form" action="{{ route('dishes.update', ['dish' => $dish->id]) }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')


                                            <div class="row">
                                                {{-- Dish Name --}}
                                                <div class="col-lg-6 col-12 px-4 mb-3">
                                                    <div class="form-floating mb-3">
                                                        <input type="text" class="form-control" id="name" name="name" placeholder="name" value="{{ old('name', $dish->name) }}" maxlength="50" required>
                                                        <label for="name">Nome 
                                                            <span class="text-danger">
                                                                *
                                                            </span>
                                                        </label>
                                                    </div>
                                                </div>

                                                {{-- Dish Description --}}
                                                <div class="col-lg-6 col-12 px-4 mb-3">
                                                    <div class="form-floating mb-3">
                                                        <textarea class="form-control" id="description" name="description" placeholder="descrizione" rows="3">{{ old('description', $dish->description) }}</textarea>
                                                        <label for="description">Descrizione
                                                        </label>
                                                    </div>
                                                </div>

                                                {{-- Dish Price --}}
                                                <div class="col-lg-6 col-12 px-4 mb-3">
                                                    <div class="form-floating mb-3">
                                                        <input type="number" name="price" step="0.01" min="0.00" max="499.99" id="price" class="form-control" placeholder="Inserisci il prezzo" value="{{ old('price', $dish->price) }}" required>
                                                        <label for="price">Prezzo
                                                            <span class="text-danger">
                                                                *
                                                            </span>
                                                        </label>
                                                    </div>
                                                </div>


                                                {{-- Dish Thumb --}}
                                                <div class="col-lg-6 col-12 px-4 mb-3">
                                                    <div class="mb-3">
                                                        <input type="file" class="form-control border-top-0 border-end-0 border-start-0 mt-2" id="thumb" name="thumb" accept="image/*" style="border-radius: 0">
                                    
                                                        @if ($dish->thumb)
                                                            <div>
                                                                <img src="{{ asset('storage/' . $dish->thumb) }}" class="w-50" alt="{{ $dish->title }}">
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" value="1" name="remove_thumb" id="remove_thumb">
                                                                <label class="form-check-label" for="remove_thumb">
                                                                    Rimuovi immagine
                                                                </label>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="text-center mt-5">
                                                <button id="btn-1" class="btn" type="submit">
                                                    Aggiorna
                                                </button>
                                            </div>
                                            
                                            <input type="hidden" name="visible" value="{{ old('visible', $dish->visible) }}">
                                            <input type="hidden" name="restaurant_id" value="{{ $restaurant->id }}">
                                            </form>
                                            
                                            {{-- NON METTERE IL FORM DENTRO L'ALTRO FORM SE VUOI SPOSTARLO USA RELATIVE O ABSOLUTE --}}
                                            <form id="dish-del-form" method="POST" action="{{ route('dishes.destroy', $dish->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button id="btn-2" type="submit" class="btn text-white">Delete</button>
                                            </form>


                                            @if ($errors->any())
                                                <div class="alert alert-danger">
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
    <div class="row">
        <div class="col bg-info-subtle">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('dishes.update', ['dish' => $dish->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="name" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="name" name="name" required maxlength="255" value="{{ old('name', $dish->name) }}">
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Descrizione</label>
                    <textarea class="form-control" id="description" name="description" rows="3">{{ old('description', $dish->description) }}</textarea>
                </div>
                
                <div class="mb-3">
                    <label for="price" class="form-label">Prezzo</label>
                    <input type="text" class="form-control" id="price" name="price" required maxlength="255" value="{{ old('price', $dish->price) }}">
                </div>
                <input type="hidden" name="visible" value="{{ old('visible', $dish->visible) }}">
                <input type="hidden" name="restaurant_id" value="{{ $restaurant->id }}">
                <div class="mb-3">
                    <label for="thumb" class="form-label">Immagine</label>
                    <input class="form-control" type="file" name="thumb" id="thumb" accept="image/*">

                    @if ($dish->thumb)
                        <div>
                           
                            <img src="{{ asset('storage/' . $dish->thumb) }}" class="w-50" alt="{{ $dish->title }}">
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" name="remove_thumb" id="remove_thumb">
                            <label class="form-check-label" for="remove_thumb">
                                Rimuovi immagine
                            </label>
                        </div>
                    @endif
                </div>



                <div>
                    <button type="submit" class="btn btn-warning">
                        Aggiorna
                    </button>

                 

                </div>
            </form>
            NON METTERE IL FORM DENTRO L'ALTRO FORM SE VUOI SPOSTARLO USA RELATIVE O ABSOLUTE
            <form method="POST" action="{{ route('dishes.destroy', $dish->id) }}">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>
    </div>
@endsection --}}
