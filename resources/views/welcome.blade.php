<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>NightRaid</title>
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link rel="shortcut icon" href="{{ asset('images/icono.png') }}" type="image/x-icon">
    </head>
    <body>
        <div id="app">
            <nav id="menu" class="navbar nav-bar-transition navbar-expand-lg fixed-top navbar-expand-md shadow-sm">
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img src="{{ asset('images/icono.png') }}" class="img-fluid logo-brand">
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
                            <li class="nav-item">
                                <a class="nav-link" href="#" id="Inicio">Inicio</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" id="nosotros">Nosotros</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" id="nosotros">Servicios</a>
                            </li>
                            <!-- Authentication Links -->
                            @guest
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }}
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
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
            <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active" data-interval="5000">
                        <img src="{{ asset('images/carousel2.jpg') }}" class="d-block w-100" alt="hola">
                        <div class="carousel-caption">
                            <h5 class="animate__animated animate__fadeInDownBig" style="animation-delay: 0.5s;">El mejor calzado deportivo que podras encontrar</h5>
                            <boton-comprar></boton-comprar>
                        </div>
                    </div>
                </div>
            </div>
            <div id="nosotros-id" class="nosotros">
            <div class="container run-project text-center">
                <h1>PROYECTO: RUN FEARLES</h1>
                <h4>NightRaid te mantiene en actividad. No importa si es tu primera vez corriendo o si eres un corredor avanzado,
                    durante las próximas 8 semanas te acompañeros a redescubrir tu potencial como atleta y como
                    persona a través de corridas guiadas.
                </h4>
                <boton-unete></boton-unete>
                </div>
            </div>
            <div class="container oferta-zapatos text-center">
                <h1>Disfruta de nuestras mejores ofertas!</h1>
                <h4>NightRaid piensa en ti, revisa nuestras ofertas y encuentra tu calzado ideal!</h4>
                <div class="row row-zapatos row-cols-1 row-cols-md-2 g-4">
                    @foreach ($zapato as $shoes)
                        <div class="col col-zapatos">
                            <div class="card">
                            <h5 class="card-title">{{$shoes->marcaZapato->name_brand}} {{$shoes->name_shoes}}</h5>
                            <img src="/storage/{{$shoes->image}}">
                            <div class="card-body">
                                <p class="card-text">Calzado tipo {{$shoes->categoriaZapato->name_category}} disponibles en talla {{$shoes->size_shoes}}</p>
                                <p class="card-text">$ {{$shoes->price_shoes}}</p>
                                <boton-comprar-zapato id-zapato={{$shoes->marcaZapato->name_brand}}
                                                      nombre-zapato={{$shoes->name_shoes}}
                                                      precio-zapato={{$shoes->price_shoes}}  ></boton-comprar-zapato>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <footer class="footer">
            <div class="footer-copyright container-footer text-center py-3">
                <p>&copy; Copyright <b><a id="fecha" href="#"> </a></p></b>
                </p>
                <p>Designed and Developed by <b><a href="https://www.facebook.com/steven.ledesma.965" target="blank">Steven Ledesma</a></b></p>
            </div>
        </footer>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
        <script>
            $(window).scroll(function() {
                var ventana_ancho = $(window).width();
                if (ventana_ancho < 620 && ventana_ancho > 300) {
                    if ($("#menu").offset().top > 80) {
                        $("#menu").addClass("nav-scroll");
                    } else {
                        $("#menu").removeClass("nav-scroll");
                    }
                } else {
                    if ($("#menu").offset().top > 200) {
                        $("#menu").addClass("nav-scroll");
                    } else {
                        $("#menu").removeClass("nav-scroll");
                    }
                }
            });
        </script>
        <script>
            var date = (new Date).getFullYear();
            $(document).ready(function() {
                $("#fecha").text("NightRaid " + date);
            });
        </script>
    </body>
</html>
