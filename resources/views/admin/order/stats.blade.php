@extends('layouts.app')

@section('page-title', 'Dashboard')

@section('main-content')

<div>
    <canvas id="myChart"></canvas>
</div>

@vite('resources/js/chart.js')
<script>
    var userId = {{ Auth::id() }};
</script>

@endsection


