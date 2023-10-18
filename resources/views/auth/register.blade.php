<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Scripts -->
        @vite('resources/js/app.js')
    </head>
    <body class="my-style-register">
        
        <header>        
                        <nav class="d-flex justify-content-center align-items-center w-100">
                            {{-- immagine logo  --}}
                            <div class="mx-3">
                                <img src="images/iconlogo.png" alt="Logo">
                            </div>
                            <h1 class="mx-3 fw-bold">
                                D E L I V E B O O
                            </h1>
                        </nav>
        </header>

        <main class="py-4">

            <div class="container h-100">
                <div class=" h-100 w-100 d-flex justify-content-center align-items-center">
                    <div class="my-card bg-white py-4 rounded" style="">
                        <div class="row">

                            <div class="col">
                                {{-- Form di registrazione  --}}
                                <div id="register-form-div" class="box ms-5 me-2 text-center">
                                    <h3 class="fs-4 mt-1 mb-4">Registrazione Utente</h3>
                                         @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                    <form method="POST" action="{{ route('register') }}">
                                        @csrf

                                        {{-- name --}}
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="name@example.com" value="{{ old('name') }}" required>
                                            <label for="name">Nome</label>
                                            @error('name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        {{-- email address --}}
                                       <div class="form-floating mb-3">
                                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="name@example.com" value="{{ old('email') }}" required>
                                            <label for="email">Indirizzo Email</label>
                                            @error('email')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        {{-- password --}}
                                        
                                        <div class="form-floating mb-3">
                                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Password" required>
                                            <label for="password">Password</label>
                                            @error('password')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        {{-- password_confirmation --}}
                                        <div class="form-floating mb-3">
                                            <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" name="password_confirmation" placeholder="Conferma Password" required>
                                            <label for="password_confirmation">Conferma Password</label>
                                            @error('password_confirmation')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        {{-- submit button  --}}
                                        <button id="btn-1" type="submit" class="btn btn-warning px-4 my-1 mt-4">
                                            <strong>Registrati</strong>
                                        </button>
                                        {{-- Already registered? --}}
                                        <div class="mt-1"><small><a href="{{ route('login') }}">Sei già registrato? Accedi</a></small></div>


                                    </form>
                                </div>
                            </div>

                            <div class="col">
                                {{-- "Quali sono i benefici di essere partner?" Box di info  --}}
                                <div id="benefits-info" class="box ms-2 me-5 mt-2">
                                    <div class="infobox ms-3 mt-4 d-xxl-block">
                                        <h3 class="fs-5 mb-3">Cosa vuol dire essere partner Deliveboo?</h4>
                                        <div class="mb-3 ms-2">"Con Deliveboo espandi la tua attività, raggiungendo nuovi clienti ogni giorno."</div>
                                        <div class="mb-3 ms-2">"È un modo semplice ed efficace per gestire le ordinazioni ed avere tutto sotto controllo."</div>
                                        <div class="mb-3 ms-2 d-none d-lg-block">"Da Partner vedrai aumentare la visibilità online del tuo ristorante come mai prima d'ora."</div>
                                        <div class="mb-3 ms-2 d-none d-xxl-block">"Deliveboo ha il sistema di consegne più ottimizzato sul mercato, i tuoi clienti saranno sempre soddisfatti."</div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            
        </main>
    </body>
    </html>
  