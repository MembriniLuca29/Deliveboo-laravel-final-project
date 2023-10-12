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

                        @auth
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <button type="submit" class="btn btn-outline-danger">
                                    Log Out
                                </button>
                            </form>
                        @endauth
        </header>

        <main class="py-4">

            <div class="container h-100">
                <div class=" h-100 w-100 d-flex justify-content-center align-items-center">
                    <div class="my-card bg-white py-4 rounded" style="">
                        <div class="row">

                            <div class="col">
                                {{-- Form di registrazione  --}}
                                <div id="registrer-form" class="box ms-5 me-2 text-center">
                                    <h3 class="fs-4 mt-1 mb-4">Registrazione Utente</h3>

                                    <form method="POST" action="{{ route('register') }}">
                                        @csrf

                                        {{-- name --}}
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="name" name="name" placeholder="name@example.com">
                                            <label for="name">Nome</label>
                                        </div>

                                        {{-- email address --}}
                                        <div class="form-floating mb-3">
                                            <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
                                            <label for="email">Indirizzo Email</label>
                                        </div>

                                        {{-- password --}}
                                        <div class="form-floating mb-3">
                                            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                                            <label for="password">Password</label>
                                        </div>

                                        {{-- password_confirmation --}}
                                        <div class="form-floating mb-3">
                                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Conferma Password">
                                            <label for="password_confirmation">Conferma Password</label>
                                        </div>

                                        {{-- submit button  --}}
                                        <button id="btn-1" type="submit" class="btn btn-warning px-4 my-1 mt-4">
                                            <strong>
                                                Registrati
                                            </strong>
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
                                        <div class="mb-3 ms-2">"È un modo semplice ed efficacie per gestire le ordinazioni ed avere tutto sotto controllo."</div>
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
    {{-- <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <label for="name">
                Name
            </label>
            <input type="text" id="name" name="name">
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <label for="email">
                Email
            </label>
            <input type="email" id="email" name="email">
        </div>

        <!-- Password -->
        <div class="mt-4">
            <label for="password">
                Password
            </label>
            <input type="password" id="password" name="password">
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <label for="password_confirmation">
                Conferma Password
            </label>
            <input type="password" id="password_confirmation" name="password_confirmation">
        </div>

        <div>
            <a href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <button type="submit">
                Register
            </button>
        </div>
    </form>  --}}
    
