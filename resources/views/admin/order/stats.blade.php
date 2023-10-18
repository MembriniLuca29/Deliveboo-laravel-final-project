@extends('layouts.app')

@section('page-title', 'Dashboard')

@section('main-content')

<div>
    <canvas id="myChart"></canvas>
</div>

<script>
    var userId = {{ Auth::id() }};
</script>
@endsection


