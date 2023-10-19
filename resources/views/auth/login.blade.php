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

        </header>

        <main class="py-4">

            <div class="container h-100">
                <div class=" h-100 w-100 d-flex justify-content-center align-items-center">

                    <div class="my-card bg-white pt-4 pb-3 rounded" style="">

                        {{-- Form di accesso  --}}
                        <div id="registrer-form" class="box ms-5 me-5 text-center">
                            <h3 class="fs-4 mt-1 mb-4">Accesso Utente</h3>

                            {{-- <div class="mt-2 mb-2">
                                {{ $errors->first('email') }}
                            </div>
                            @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif --}}
                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                {{-- Email  --}}
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="name@example.com" value="{{ old('email') }}" required>
                                    <label for="email">Indirizzo Email</label>
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="form-floating mb-1">
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Password" required>
                                    <label for="password">Password</label>
                                    @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                
                                <div class="d-flex justify-content-end">
                                    @if (Route::has('password.request'))
                                        <a id="pass_recovery" href="{{ route('password.request') }}" class="text-dark text-decoration-none">
                                            {{ __('Forgot your password?') }}
                                        </a>
                                    @endif
                                </div>
                                
                                <div class="mt-4">
                                    <label for="remember_me">
                                        <div id="rememb_me">
                                            <input class="" id="remember_me" type="checkbox" name="remember">
                                            <span class="ms-1">Ricordami</span>
                                        </div>
                                    </label>
                                </div>
                                
                                <button id="btn-1" type="submit" class="btn btn-warning px-4 my-1 mt-2">
                                    <strong>
                                        Accedi
                                    </strong>
                                </button>
                                
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

