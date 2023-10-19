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
                <div class="h-100 w-100 d-flex justify-content-center align-items-center">
                    <div class="my-card bg-white pt-4 pb-3 rounded">
                        <!-- Form di accesso -->
                        <div id="login-form" class="box ms-5 me-5 text-center">
                            <h3 class="fs-4 mt-1 mb-4">Accesso Utente</h3>
                            <form method="POST" action="{{ route('login') }}" id="loginForm">
                                @csrf
                                <!-- Email -->
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="name@example.com" value="{{ old('email') }}" required>
                                    <label for="email">Indirizzo email</label>
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <!-- Password -->
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
                                
                                <div id="error-messages" class="alert alert-danger d-none"></div>
                                <button id="btn-1" type="submit" class="btn btn-warning px-4 my-1 mt-2">
                                    <strong>Accedi</strong>
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

        <script>
    async function validateForm() {
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;
    const errorMessages = document.getElementById('error-messages');
    errorMessages.textContent = '';
    errorMessages.classList.add('d-none');

    if (!isValidEmail(email)) {
        showError('Inserisci un indirizzo email valido.');
        return false;
    }

    if (password.length < 8) {
        showError('La password deve contenere almeno 8 caratteri.');
        return false;
    }

    const response = await fetch('/check-email', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({ email: email })
    });

    const data = await response.json();

    

    return true;
}

function isValidEmail(email) {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
}

function showError(message) {
    const errorMessages = document.getElementById('error-messages');
    errorMessages.textContent = message;
    errorMessages.classList.remove('d-none');
}

const loginForm = document.getElementById('loginForm');
const errorMessages = document.getElementById('error-messages');

loginForm.addEventListener('submit', async function(event) {
    event.preventDefault();
    errorMessages.classList.add('d-none');

    if (await validateForm()) {
        try {
            const formData = new FormData(loginForm);
            const response = await fetch(loginForm.action, {
                method: 'POST',
                body: formData
            });

            const data = await response.json();

            if (data.success) {
                window.location.href = "{{ route('dashboard') }}";
            } else {
                if (data.error) {
                    showError(data.error);
                } else {
                    showError('Si è verificato un errore durante la registrazione.');
                }
            }
        } catch (error) {
            console.error('Errore durante l\'invio del form:', error);
        }
    }
});
        </script>
        {{-- <script>
            function showError(message) {
    const errorMessages = document.getElementById('error-messages');
    errorMessages.textContent = message;
    errorMessages.classList.remove('d-none');
}
        document.addEventListener('DOMContentLoaded', function() {
    const loginForm = document.querySelector('form');
    const errorMessages = document.getElementById('error-messages');

    loginForm.addEventListener('submit', async function(event) {
        event.preventDefault();
        errorMessages.classList.add('d-none');

        try {
            const formData = new FormData(loginForm);
            const response = await fetch(loginForm.action, {
                method: 'POST',
                body: formData
            });

            if (response.ok) {
                const contentType = response.headers.get('content-type');
                if (contentType && contentType.includes('application/json')) {
                    // Se la risposta è un JSON valido
                    const data = await response.json();

                    if (data.success) {
                        window.location.href = "{{ route('dashboard') }}"; // Reindirizza alla dashboard dopo il login riuscito
                    } else {
                        if (data.error) {
                            showError(data.error);
                        } else {
                            showError('Credenziali non valide. Si prega di riprovare.');
                        }
                    }
                } else {
                    // Se la risposta non è un JSON valido
                    console.error('Risposta non valida:', response);
                    showError('Si è verificato un errore durante l\'autenticazione. Si prega di riprovare più tardi.');
                }
            } else {
                // Gestisci altri stati di risposta come 404 Not Found, 500 Internal Server Error, ecc.
                console.error('Errore nella risposta del server:', response);
                showError('Si è verificato un errore durante l\'autenticazione. Si prega di riprovare più tardi.');
            }
        } catch (error) {
            console.error('Errore durante l\'invio del form:', error);
            showError('Si è verificato un errore durante l\'autenticazione. Si prega di riprovare più tardi.');
        }
    });
});

        </script> --}}
    </body>
</html>

