<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ asset('img/favicon.png') }}" type="image/x-icon">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('icons/font/bootstrap-icons.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark fixed-top" style="background-color: #191E26">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ URL::asset('img/logo_bg_black.png') }}" class="img-fluid" alt="Responsive image" style="width: 150px">
                    {{-- {{ config('app.name') }} --}}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        <li class="nav-item"><a class="nav-link" href="#">Contacto</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Productos</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">About</a></li>
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">Iniciar sesión</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">Registrate</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('home') }}">Página principal</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Cerrar sesión
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        
        <main role="main">
            @yield('content')
        </main>
        
        <footer class="bg-dark text-light text-left text-lg-start">

            <!-- Grid container -->
            <div class="container" style="height: 18rem;padding-top: 5rem;">

                <!--Grid row-->
                <div class="row justify-content-around">

                    <!--Grid column-->
                    <div class="col-lg-4 col-md-12 mb-4 mb-md-0">
                        <h5 class="text-uppercase"><b>Jobsok</b></h5>
                        <p>
                            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iste atque ea quis
                            molestias. Fugiat pariatur maxime quis culpa corporis vitae repudiandae aliquam
                            voluptatem veniam, est atque cumque eum delectus sint!
                        </p>
                        <i class="bi bi-twitter"></i>
                        <i class="bi bi-facebook"></i>
                        <i class="bi bi-instagram"></i>
                    </div>

                    <!--Grid column-->
                    <div class="col-lg-2 col-md-6 mb-4 mb-md-0">
                        <h5 class="text-uppercase">Links útiles</h5>
        
                        <ul class="list-unstyled mb-0">
                            <li>
                                <a href="#!" class="text-light">Login</a>
                            </li>
                            <li>
                                <a href="#!" class="text-light">Registrarse</a>
                            </li>
                            <li>
                                <a href="#!" class="text-light">Productos</a>
                            </li>
                            <li>
                                <a href="#!" class="text-light">Contacto</a>
                            </li>
                        </ul>
                    </div>

                    <!--Grid column-->
                    <div class="col-lg-2 col-md-6 mb-4 mb-md-0">
                        <h5 class="text-uppercase mb-0">Servicios</h5>
        
                        <ul class="list-unstyled">
                            <li>
                                <a href="#!" class="text-light">Contratar un técnico</a>
                            </li>
                            <li>
                                <a href="#!" class="text-light">Ser parte de Jobsok</a>
                            </li>
                        </ul>
                    </div>

                </div>

            </div>
        
            <!-- Copyright -->
            <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
                © 2020 Copyright:
                <a class="text-light" href="#">Jobsok.com</a>
            </div>

        </footer>

    </div>
</body>
</html>
