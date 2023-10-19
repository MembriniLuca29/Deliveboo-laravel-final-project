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
                                    <form method="POST" action="{{ route('register') }}" id="registerForm">
                                        @csrf

                                       
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="name@example.com" value="{{ old('name') }}" required>
                                            <label for="name">Nome</label>
                                            @error('name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                      
                                       <div class="form-floating mb-3">
                                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="name@example.com" value="{{ old('email') }}" required>
                                            <label for="email">Indirizzo Email</label>
                                            @error('email')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                   
                                        
                                        <div class="form-floating mb-3">
                                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Password" required>
                                            <label for="password">Password</label>
                                            @error('password')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                     
                                        <div class="form-floating mb-3">
                                            <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" name="password_confirmation" placeholder="Conferma Password" required>
                                            <label for="password_confirmation">Conferma Password</label>
                                            @error('password_confirmation')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div id="error-messages" class="alert alert-danger d-none"></div>
                                       
                                        <button id="btn-1" type="submit" class="btn btn-warning px-4 my-1 mt-4">
                                            <strong>Registrati</strong>
                                        </button>
                                        
                                        <div class="mt-1"><small><a href="{{ route('login') }}">Sei già registrato? Accedi</a></small></div>

                                        
                                    </form>
                                </div>
                            </div>

                            <div class="col">
                                
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
        <script>
    async function validateForm() {
    const name = document.getElementById('name').value;
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;
    const confirmPassword = document.getElementById('password_confirmation').value;
    const errorMessages = document.getElementById('error-messages');
    errorMessages.textContent = '';
    errorMessages.classList.add('d-none');

    if (name.trim() === '') {
        showError('Il campo Nome è obbligatorio.');
        return false;
    }

    if (!isValidEmail(email)) {
        showError('Inserisci un indirizzo email valido.');
        return false;
    }

    if (password.length < 8) {
        showError('La password deve contenere almeno 8 caratteri.');
        return false;
    }

    if (password !== confirmPassword) {
        showError('Le password non corrispondono.');
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

    if (!data.available) {
        showError("Questa email è già registrata. provare un'altra email");
        return false;
    }

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

const registerForm = document.getElementById('registerForm');
const errorMessages = document.getElementById('error-messages');

registerForm.addEventListener('submit', async function(event) {
    event.preventDefault();
    errorMessages.classList.add('d-none');

    if (await validateForm()) {
        try {
            const formData = new FormData(registerForm);
            const response = await fetch(registerForm.action, {
                method: 'POST',
                body: formData
            });

            const data = await response.json();

            if (data.success) {
                window.location.href = "{{ route('restaurants.create') }}";
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
    </body>
    </html>