@extends('layouts.guest')

@section('main-content')
<div class="container h-100 my-style-register">
    <div class=" h-100 w-100 d-flex justify-content-center align-items-center">
        <div class="my-card bg-white px-5 py-4 rounded">
            <div class="row">
                <div class="col">
                    <div class="box">
                        form
                    </div>
                </div>
                <div class="col">
                    <div class="box">
                        info
                    </div>
                </div>
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
@endsection