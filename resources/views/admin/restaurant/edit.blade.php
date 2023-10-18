@extends('layouts.app')

@section('page-title', 'Crea Ristorante')

@section('main-content')

    <div id="my-style-dashboard-restaurant-edit" class="h-100">
        <div class="px-5 h-100">
            <div class="px-4  h-100">

                {{-- intestazione main  --}}
                
                <div class="header d-inline">
                    <span>
                        <h1 class="lh-1 mb-0 fw-normal text-capitalize border-bottom border-warning border-3 pt-3 pb-5">
                            <span class="py-5">{{ $restaurant->name }}</span>
                        </h1>
                    </span>
                </div>

                    
                
                <div id="main-content" class="mt-5 h-100">
                    
                    {{-- intestazione main --}}
                    <div id="main-top-cont" class="py-2 d-flex justify-content-between">
                        <div class="fs-2">
                            Modifica il tuo ristorante
                        </div>
                    </div>
                    
                    <div id="main-bot-cont" class="w-100">
                        <div class="px-4 pt-1 pb-3 h-100">
                            <div class="h-100 border-start border-end border-warning border-3 px-5">
                                <div class="mx-1 pt-5 h-100">
                                    <div>
                                        {{-- Form to edit restaurant --}}
                                        <form id="res-edit-form" action="{{ route('restaurants.update', ['restaurant' => $restaurant]) }}" method="post" enctype="multipart/form-data">
                                            @method('PUT')
                                            @csrf

                                            <div class="row">
                                                {{-- Restaurant Name --}}
                                                <div class="col-lg-6 col-12 px-4 mb-3">
                                                    <div class="form-floating mb-3">
                                                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="name@example.com" value="{{ old('name', $restaurant->name) }}" maxlength="50" required>
                                                        <label for="name">Nome</label>
                                                        @error('name')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                {{-- Restaurant Address --}}
                                                <div class="col-lg-6 col-12 px-4 mb-3">
                                                    <div class="form-floating mb-3">
                                                        <input  type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" placeholder="Indirizzo" value="{{ old('address', $restaurant->address) }}" maxlength="255"  required>
                                                        <label for="address">Indirizzo completo</label>
                                                        @error('address')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                {{-- Restaurant Phone number --}}
                                                <div class="col-lg-6 col-12 px-4 mb-3">
                                                    <div class="form-floating mb-3">
                                                        <input type="text" class="form-control @error('phone_number') is-invalid @enderror" id="phone_number" name="phone_number" placeholder="Numero di telefono" value="{{ old('phone_number', $restaurant->phone_number) }}" maxlength="13" required>
                                                        <label for="phone_number">Telefono</label>
                                                        @error('phone_number')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                {{-- Restaurant P.Iva --}}
                                                <div class="col-lg-6 col-12 px-4 mb-3">
                                                    <div class="form-floating mb-3">
                                                        <input type="text" class="form-control @error('p_iva') is-invalid @enderror" id="p_iva" name="p_iva" placeholder="p_iva" value="{{ old('p_iva', $restaurant->p_iva) }}" maxlength="11" required>
                                                        <label for="p_iva">Partita Iva</label>
                                                        @error('p_iva')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                {{-- Restaurant Thumb --}}
                                                <div class="col-lg-6 col-12 px-4 mb-3">
                                                    <div class="input-group mb-3">
                                                        <input type="file" class="form-control border-top-0 border-end-0 border-start-0 mt-2" id="thumb" name="thumb" accept="image/*" style="border-radius: 0">
                                                    </div>
                                                </div>
                                            </div>

                                            @if ($restaurant->thumb)
                                                <div>
                                                    <img src="{{ asset('storage/' . $restaurant->thumb) }}" class="w-50" alt="{{ $restaurant->name }}">
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="1" name="remove_thumb" id="remove_thumb">
                                                    <label class="form-check-label" for="remove_thumb">
                                                        Rimuovi immagine
                                                    </label>
                                                </div>
                                            @endif
                                            
                                            <div>
                                                @foreach ($types as $index => $type)
                                    
                                                    <label for="{{ $type->name }}">
                                                        {{ $type->name }}
                                                    </label>
                                    
                                                    <input type="checkbox" id="{{ $type->name }}" name="type_id[]" value="{{ $type->id }}" class="me-3"
                                                        @if ($restaurant->types->contains($type))
                                                            checked
                                                        @endif
                                                    >
                                                @endforeach
                                            </div>

                                            <div class="text-center mt-5">
                                                <button type="submit">
                                                    Salva
                                                </button>
                                            </div>
                                        </form>
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