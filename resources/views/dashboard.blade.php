@extends('layouts.app')

@section('page-title', 'Dashboard')

@section('main-content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h1 class="text-center text-success">
                        Bentornato {{ auth()->user()->name }}
                    </h1>
                    <br>
                    
                </div>
            </div>
        </div>
    </div>
@endsection