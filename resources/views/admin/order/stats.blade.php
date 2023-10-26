@extends('layouts.app')

@section('page-title', 'Dashboard')

@section('main-content')

<div>
    <div>
        <label for="year-select">Seleziona Anno:</label>
        <select id="year-select"></select>
    </div>
    <canvas id="myChart"></canvas>
</div>

@vite('resources/js/chart.js')
<script>
    var userId = {{ Auth::id() }};
</script>

@endsection


