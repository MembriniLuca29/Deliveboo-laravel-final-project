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
    <body>
        <header>

                    {{-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button> --}}
                    {{-- <div class="" id="navbarText"> --}}
                        {{-- <ul class="navbar-nav me-auto mb-2 mb-lg-0 w-100">
                            @auth
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('admin.dashboard') }}">Dashboard</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Link 2</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Link 3</a>
                                </li>
                            @else
                                {{-- <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">Register</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">login</a>
                                </li> --}}
                                
                            {{-- @endauth --}}
                        {{-- </ul>  --}}
                        
                        <nav class="d-flex justify-content-center align-items-center w-100">
                            {{-- immagine logo  --}}
                            <div class="mx-3">
                                LOGO
                            </div>
                            <h1 class="mx-3 fs-1">
                                
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
                    {{-- </div> --}}

        </header>

        <main class="py-4">

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

        </main>
    </body>
</html>