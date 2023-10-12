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
    <body class="my-style-login">
        <header>        
                        <nav class="d-flex justify-content-center align-items-center w-100">
                            
                            <div class="mx-3">
                                {{-- logo  --}}
                                <img src="images/iconlogo.png" alt="Logo">
                            </div>
                                {{-- title  --}}
                            <h1 class="mx-3 fw-bold">
                                D E L I V E B O O
                            </h1>
                        </nav>

                        {{-- @auth
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                logout button 
                                <button type="submit" class="btn btn-outline-danger">
                                    Log Out
                                </button>
                            </form>
                        @endauth --}}

        </header>

        <main class="py-4">

            <div class="container h-100">
                <div class=" h-100 w-100 d-flex justify-content-center align-items-center">

                    <div class="my-card bg-white pt-4 pb-3 rounded" style="">

                        {{-- Form di accesso  --}}
                        <div id="registrer-form" class="box ms-5 me-5 text-center">
                            <h3 class="fs-4 mt-1 mb-4">Accesso Utente</h3>

                            <div class="mt-2 mb-2">
                                {{ $errors->first('email') }}
                            </div>

                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                {{-- Email  --}}
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
                                    <label for="email">Indirizzo Email</label>
                                </div>

                                {{-- Password --}}
                                <div class="form-floating mb-1">
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                                    <label for="password">Password</label>
                                </div>

                                
                                <div class="d-flex justify-content-end">

                                    @if (Route::has('password.request'))
                                        <a id="pass_recovery" href="{{ route('password.request') }}" class="text-dark text-decoration-none">
                                            {{ __('Forgot your password?') }}
                                        </a>
                                    @endif
                                </div>

                                {{-- Remember Me --}}
                                <div class="mt-4">
                                    <label for="remember_me">
                                        <div id="rememb_me">
                                            <input  class="" id="remember_me" type="checkbox" name="remember">
                                            <span class="ms-1">Ricordami</span>
                                        </div>
                                    </label>
                                </div>
                                
                                {{-- submit button  --}}
                                <button id="btn-1" type="submit" class="btn btn-warning px-4 my-1 mt-2">
                                    <strong>
                                        Accedi
                                    </strong>
                                </button>

                                {{-- register redirect --}}
                                <div id="register_redirect" class="mt-4">
                                    <small><a class="text-decoration-none" href="{{ route('register') }}">Non hai un account? Registrati</a></small>
                                </div>


                            </form>
                        </div>

                    </div>
                </div>
            </div>

        </main>
    </body>
</html>

{{-- @extends('layouts.guest')

@section('main-content')
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
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

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me">
                <input id="remember_me" type="checkbox" name="remember">
                <span>Remember me</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <button type="submit">
                Log in
            </button>
        </div>
    </form>
    <h1>
        {{ $errors->first('email') }}
    </h1>
    
@endsection --}}