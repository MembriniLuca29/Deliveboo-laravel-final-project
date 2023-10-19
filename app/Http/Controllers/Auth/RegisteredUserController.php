<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Http\JsonResponse;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): JsonResponse
{
    $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
        'password' => ['required', 'confirmed', Rules\Password::defaults()],
    ]);

    // Creazione dell'utente
    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ]);
    event(new Registered($user));
Auth::login($user); // Assicurati di autenticare l'utente
return response()->json(['success' => true, 'redirect' => route('restaurants.create')]);

    if ($user) {
        // Se l'utente è stato creato con successo, invia una risposta JSON di successo
        return response()->json(['success' => true, 'redirect' => route('restaurants.create')]);
    } else {
        // Se c'è stato un errore durante la creazione dell'utente, invia una risposta JSON con errore
        return response()->json(['success' => false, 'errors' => ['Errore durante la registrazione']]);
    }
}

}