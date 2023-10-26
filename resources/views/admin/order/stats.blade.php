@extends('layouts.app')

@section('page-title', 'Dashboard')

@section('main-content')
    <div id="my-style-dashboard-dish-edit" class="h-100">
        <div class="px-0 px-lg-3 px-xl-2 px-xxl-5 h-100">
            <div class="px-2 px-md-2 px-xl-3 px-xl-4 h-100">

                {{-- intestazione main  --}}
                <div class="header d-inline">
                    <span>
                        <h1 class="lh-1 mb-0 fw-normal border-bottom border-warning border-3 pb-2 pb-sm-3 pb-md-4 pt-xl-3 pb-xl-5">
                            <span class="py-5 d-none d-md-inline">Ecco l'andamento della tua attività</span>
                            <span class="py-5 d-md-none fs-2">Ecco l'andamento della tua attività</span>
                        </h1>
                    </span>
                </div>

                    
                
                <div id="main-content" class="mt-1 mt-sm-2 mt-xl-3 mt-xxl-5 h-100">
                    
                    {{-- intestazione main --}}
                    <div id="main-top-cont" class="py-2 pb-3 d-flex justify-content-between">
                        <div class="fs-2 d-none d-md-inline">
                            Statistiche
                        </div>
                        <div class="fs-4 d-md-none">
                            Statistiche
                        </div>
                    </div>
                    
                    <div id="main-bot-cont" class="w-100">
                        <div class="px-1 px-md-2 px-lg-3 px-xl-4 pt-1 pb-3 h-100">
                            <div class="overflow-x-hidden overflow-y-auto h-100 border-start border-end border-warning border-3 px-1 px-md-2 px-lg-3 px-xl-5">
                                <div class="mx-1 pt-2 pt-md-4 pt-lg-4 px-md-3 pt-xl-5 h-100">
                                    <div>
                                        {{-- Stats section --}}
                                        <div>
                                            <canvas id="myChart"></canvas>
                                        </div>
                                        
                                        @vite('resources/js/chart.js')
                                        <script>
                                            var userId = {{ Auth::id() }};
                                        </script>
                                    </div>


                                </div>
                            </div>
                        </div>

                    </div>
                </div>


            </div>
        </div>
    </div>
@endsection



