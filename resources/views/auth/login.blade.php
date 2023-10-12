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
    <body class="my-style-login">
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
                            
                            <div class="mx-3">
                                {{-- logo  --}}
                                <img src="images/iconlogo.png" alt="Logo">
                            </div>
                                {{-- title  --}}
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

            <div class="container h-100">
                <div class=" h-100 w-100 d-flex justify-content-center align-items-center">
                    <div class="my-card bg-white py-4 rounded" style="">

                        {{-- Form di accesso  --}}
                        <div id="registrer-form" class="box ms-5 me-5 text-center">
                            <h3 class="fs-4 text-uppercase mt-1 mb-4">accesso utente</h3>

                            <form method="POST" action="{{ route('register') }}">
                                @csrf

                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
                                    <label for="email">Indirizzo Email</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                                    <label for="password">Password</label>
                                </div>

                                <div class="mt-4"><small><a href="{{ route('register') }}">Non hai un account? Registrati</a></small></div>
                                <button id="btn-1" type="submit" class="btn btn-warning px-4 my-1 mt-2">
                                    <strong>
                                        Accedi
                                    </strong>
                                </button>
                            </form>
                        </div>

                    </div>
                </div>
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
            </div>


            {{-- <form method="POST" action="{{ route('login') }}">
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
            </form> --}}
            <h1>
                {{ $errors->first('email') }}
            </h1>

        </main>
    </body>
</html>