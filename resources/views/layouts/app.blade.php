<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('page-title') | {{ config('app.name', 'Laravel') }}</title>

        {{-- font  --}}
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite('resources/js/app.js')
    </head>
    <body>
        <div id="my-container" class="py-sm-3 py-lg-4 py-xxl-5 h-100">

            <div id="my-cont-2" class="container d-flex h-100 shadow-lg rounded-5 p-0">
                
                <aside class="col-2 col-lg-3 col-xl-3 col-xxl-2 pt-3 pb-4 d-flex flex-column position-relative">
                    {{-- da cambiare in base al localhost----------------------------------------------------------------------------------------------------------- --}}
                    <div id="aside-title" class="mb-5">
                        <a href="http://localhost:5173" class="my-link"><div class="mx-2 d-lg-none mx-md-4">
                            <img class="w-100 rever-color" src="/images/logo-black.png" alt="">
                        </div></a>
                        <a href="http://localhost:5173" class="my-link"><div class="ms-4 lh-1 d-none d-lg-block">Deliveboo<br>Dashboard</div></a>
                    </div>

                    
                    <div class="my-style-home-dashboard-aside">
                        {{-- Elemento Home Navbar  --}}
                        <a href="{{ route('dashboard') }}" class="ms-lg-4 text-decoration-none text-black parent">
                            <div class="lh-1 my-5 fs-4 underline-hover text-center text-lg-start">
                                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="33" height="33" viewBox="0 0 45 57">
                                    <path d="M 23.951172 4 A 1.50015 1.50015 0 0 0 23.072266 4.3222656 L 8.859375 15.519531 C 7.0554772 16.941163 6 19.113506 6 21.410156 L 6 40.5 C 6 41.863594 7.1364058 43 8.5 43 L 18.5 43 C 19.863594 43 21 41.863594 21 40.5 L 21 30.5 C 21 30.204955 21.204955 30 21.5 30 L 26.5 30 C 26.795045 30 27 30.204955 27 30.5 L 27 40.5 C 27 41.863594 28.136406 43 29.5 43 L 39.5 43 C 40.863594 43 42 41.863594 42 40.5 L 42 21.410156 C 42 19.113506 40.944523 16.941163 39.140625 15.519531 L 24.927734 4.3222656 A 1.50015 1.50015 0 0 0 23.951172 4 z M 24 7.4101562 L 37.285156 17.876953 C 38.369258 18.731322 39 20.030807 39 21.410156 L 39 40 L 30 40 L 30 30.5 C 30 28.585045 28.414955 27 26.5 27 L 21.5 27 C 19.585045 27 18 28.585045 18 30.5 L 18 40 L 9 40 L 9 21.410156 C 9 20.030807 9.6307412 18.731322 10.714844 17.876953 L 24 7.4101562 z"></path>
                                </svg>
                                <span class="text-capitalize d-none d-lg-inline">Home</span>
                            </div>
                        </a>

                        @if ($restaurant)
                            {{-- Elemento Edit Navbar  --}}
                            <a href="{{ route('restaurants.edit', ['restaurant' => $restaurant]) }}" class="ms-4 text-decoration-none text-black parent">
                                <div class="lh-1 my-1 fs-4 underline-hover text-center text-lg-start">
                                    <img class="ms-1 me-1 mb-1" width="28" height="28" src="https://img.icons8.com/ios/50/edit--v1.png" alt="edit--v1"/>
                                    <span class="text-capitalize d-none d-lg-inline">Modifica</span>
                                </div>
                            </a>
                            {{-- Elemento Orders Navbar  --}}
                            <a href="{{ route('orders') }}" class="ms-4 text-decoration-none text-black parent">
                                <div class="lh-1 my-1 fs-4 underline-hover text-center text-lg-start">
                                    <img class="ms-1 me-1 mb-1" width="28" height="28" src="https://img.icons8.com/material-outlined/24/invoice.png" alt="invoice"/>
                                    <span class="text-capitalize d-none d-lg-inline">Ordinazioni</span>
                                </div>
                            </a>

                            {{-- Elemento Chart Navbar  --}}
                            <a href="{{ route('orders.stats') }}" class="ms-4 text-decoration-none text-black parent">
                                <div class="lh-1 my-2 fs-4 underline-hover text-center text-lg-start">
                                    <img class="mb-2 mx-1" width="32" height="32" src="https://img.icons8.com/windows/32/statistics.png" alt="statistics"/>
                                    <span class="text-capitalize d-none d-lg-inline">Statistiche</span>
                                </div>
                            </a>
                        @endif
                    </div>

                    {{-- Logout button  --}}
                    <form id="login-button" class="flex-shrink-1 position-absolute w-100" method="POST" action="{{ route('logout') }}">
                        @csrf

                        <button class="bg-white text-danger p-1 text-center d-block w-100 border-0">
                            <div class="fs-4 text-center pe-lg-3">
                                <img class="mb-1 me-1" width="25" height="25" src="https://img.icons8.com/external-line-adri-ansyah/64/e2300b/external-interface-basic-ui-line-adri-ansyah-5.png" alt="external-interface-basic-ui-line-adri-ansyah-5"/>
                                <span class="text-capitalize d-none d-lg-inline">Esci</span>
                            </div>
                        </button>
                    </form>




                </aside>
        
                <main class="py-4 col-10 col-lg-9 col-xl-9 col-xxl-10 overflow-hidden">
                    {{-- <div class="container"> --}}
                        @yield('main-content')
                    {{-- </div> --}}
                </main>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            // funzione JavaScript per salvare gli hover nella navbar
            document.addEventListener("DOMContentLoaded", function() {
                var links = document.querySelectorAll('.parent');

                links.forEach(function(link) {
                    
                    const child = link.querySelector(':first-child');
                    const value = link.getAttribute("href");
                    
                    if (window.location.href.includes(value)) {
                        child.classList.add('attivo');
                    }
                    else {
                        child.classList.remove('attivo');
                    }
                    
                
                });
            });

            // Funzione filtraggio pietanze per nome 
            document.getElementById("search-input").addEventListener("input", function() {
                var searchTerm = this.value.toLowerCase();
                var items = document.getElementsByClassName("items-container");

                for (var i = 0; i < items.length; i++) {
                    var itemName = items[i].querySelector(".dish-name").innerText.toLowerCase();
                    if (itemName.includes(searchTerm)) {
                        items[i].style.display = "block";
                    } else {
                        items[i].style.display = "none";
                    }
                }
            });

        </script>
    </body>
</html>