@extends('layouts.app')

@section('page-title', 'Crea Ristorante')

@section('main-content')
    <div id="my-style-dashboard-restaurant-create" class="h-100">
        <div class="px-5 h-100">
            <div class="px-4  h-100">

                {{-- intestazione main  --}}
                
                <div class="header d-inline">
                    <span>
                        <h1 class="lh-1 mb-0 fw-normal text-capitalize border-bottom border-warning border-3 pt-3 pb-5">
                            <span class="py-5">Ciao {{ auth()->user()->name }}</span>
                        </h1>
                    </span>
                </div>

                    
                
                <div id="main-content" class="mt-5 h-100">
                    
                    {{-- intestazione main --}}
                    <div id="main-top-cont" class="py-2 d-flex justify-content-between">
                        <div class="fs-2">
                            Aggiungi il tuo ristorante
                        </div>
                    </div>
                    
                    <div id="main-bot-cont" class="w-100">
                        <div class="px-4 pt-1 pb-3 h-100">
                            <div class="h-100 border-start border-end border-warning border-3 px-5">
                                <div class="mx-1 pt-5 h-100">
                                    <div>
                                        {{-- Form to create restaurant --}}
                                        <form id="res-create-form" action="{{ route('restaurants.store') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
    
                                            <div class="row">
                                                {{-- Restaurant Name --}}
                                                <div class="col-lg-6 col-12 px-4 mb-3">
                                                    <div class="form-floating mb-3">
                                                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="name@example.com" maxlength="50" required>
                                                        <label for="name">Nome</label>
                                                        @error('name')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                {{-- Restaurant Address --}}
                                                <div class="col-lg-6 col-12 px-4 mb-3">
                                                    <div class="form-floating mb-3">
                                                        <input  type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" placeholder="Indirizzo" maxlength="255" required>
                                                        <label for="address">Indirizzo completo</label>
                                                        @error('address')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                {{-- Restaurant Phone number --}}
                                                <div class="col-lg-6 col-12 px-4 mb-3">
                                                    <div class="form-floating mb-3">
                                                        <input type="text" class="form-control @error('phone_number') is-invalid @enderror" id="phone_number" name="phone_number" placeholder="Numero di telefono" maxlength="13" required>
                                                        <label for="phone_number">Telefono</label>
                                                        @error('phone_number')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                {{-- Restaurant P.Iva --}}
                                                <div class="col-lg-6 col-12 px-4 mb-3">
                                                    <div class="form-floating mb-3">
                                                        <input type="text" class="form-control @error('p_iva') is-invalid @enderror" id="p_iva" name="p_iva" placeholder="p_iva" maxlength="11" required>
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
                                            
                                            <div>
                                                @foreach ($types as $type)
                                                    <label for="{{ $type->name }}">
                                                        {{ $type->name }}
                                                    </label>
                                                    <input type="checkbox" id="{{ $type->name }}" name="type_id[]" value="{{ $type->id }}" class="me-3">
                                                @endforeach
                                            
                                            </div>
                                            <div class="text-center mt-5">
                                                <button type="submit">
                                                    Aggiungi
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