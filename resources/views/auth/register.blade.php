@extends('layouts.guest')

@section('main-content')
    <form method="POST" action="{{ route('register') }}">
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

        {{-- indirizzo --}}
        <div class="mt-4">
            <label for="adress">
                Indirizzo
            </label>
            <input type="text" id="address" name="address">
        </div>
        
          {{-- n. civico --}}
          <div class="mt-4">
            <label for="adress_number">
                N. civico
            </label>
            <input type="text" id="address_number" name="address_number" maxlength="3">
        </div>

          {{-- p. iva --}}
          <div class="mt-4">
            <label for="p_iva">
                Partita iva
            </label>
            <input type="text" id="p_iva" name="p_iva" minlength="11" maxlength="11">
        </div>

                
            {{-- immagine profilo DA MODIFICARE ì--}}
          <div class="mt-4">
            <label for="thumb">
                immgaine aziendale
            </label>
            <input type="file" id="thumb" name="thumb" accept="image/*">
        </div>

        <div>
            <a href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <button type="submit">
                Register
            </button>
        </div>
    </form>
@endsection