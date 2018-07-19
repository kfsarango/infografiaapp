<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>InstaInfo | @yield('title')</title>
    <link rel="icon" type="image/png" href="../../img/logos/in.png" />

    <!---title>{{ config('app.name', 'IntaInfo') }}</title-->

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="../../js/jquery3.3.1.min.js"></script>

    <!-- Fonts -->
    
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/stylesL.css') }}" rel="stylesheet">
    <link href="../../css/estilosk.css" rel="stylesheet">
    <link href="../../css/estilosp.css" rel="stylesheet">
    <link href="../../css/stylesL.css" rel="stylesheet">

</head>
<body>
    <nav class="encabezado navbar navbar-expand-md navbar-light navbar-laravel">
        <div class="container">
            <a class="navbar-brand" id="titlePag" href="{{ url('/') }}">
                InstaInfo
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul id="items_center">
                    <li>
                        <a href="">Home</a>
                    </li>
                    <li>
                        <a href="#estadisticas">Estadisticas</a>
                    </li>
                    <li>
                        <a href="#graficas">Graficas</a>
                    </li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link boton" href="{{ route('login') }}">{{ __('Entrar') }}</a>
                        </li>
                        
                    @else
                    <li class="nav-item dropdown" id="logeado">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#"  role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->nombres }}
                                {{ Auth::user()->apellidos }}
                                <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                @if ( Auth::user()->tipousuario == 1)
                                    <a class="dropdown-item" href="{{ route('admin') }}">
                                        {{ __('Inicio') }}
                                    </a>
                                @else
                                    <a class="dropdown-item" href="{{ route('super') }}">
                                        {{ __('Inicio') }}
                                    </a>
                                @endif
                                <a class="dropdown-item" href="{{ route('edit') }}">
                                    {{ __('Editar Perfil') }}
                                </a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Salir') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>


    <main>
        @yield('content')
    </main>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        <!--CSRF proteger los formularios-->
        @csrf
    </form>
    <footer>
        <section class="container">
            <div class="row">
                <div class="col-md-3">
                    <h4>UTPL</h4>
                    <ul>
                        <li>
                            <i class="fab fa-messaje"></i>
                            <h6>Dirección:</h6>
                            <p>
                                <i class="fas fa-map-marker-alt"></i>
                                San Cayetano Alto S/N
                            </p>
                        </li>
                        <li>
                            <span></span>
                            <h6>Web:</h6>
                            <p>
                                <i class="fas fa-globe"></i>
                                <a href="www.utpl.edu.ec">www.utpl.edu.ec</a>
                            </p>
                        </li>
                        <li>
                            <span></span>
                            <h6>Teléfono:</h6>
                            <p>
                                <i class="fas fa-phone"></i>
                                07 370 1444
                            </p>
                        </li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <div class="col-md-12">
                            <figure>
                                <img src="../../img/logos/utpl.png" alt="Logo footer">
                            </figure>
                            <div class="row" id="cnt_2_logos">
                                <div class="col-md-6">
                                    <figure>
                                        <img src="../../img/logos/medialab.png" alt="Logo footer">
                                    </figure>
                                </div>
                                <div class="col-md-6">
                                        <figure>
                                            <img src="../../img/logos/taw.png" alt="Logo footer">
                                        </figure>
                                    </div>
                            </div>
                    </div>
                    
                </div>
                
                <div class="col-md-3">
                    <h4>Contactos</h4>
                    <ul>
                        <li id="mrg_cnt_li">
                            <div class="cnt_names">
                                <h6>Klever Sarango</h6>
                                <p> 
                                    <i class="far fa-envelope"></i>
                                    kfsarango1@utpl.edu.ec
                                </p>
                            </div>
                            <div class="cnt_img">
                                <figure>
                                    <img src="../../img/equipo/klever.jpg" alt="Img Profile">
                                </figure>
                            </div>   
                        </li>
                        <li>
                            <div class="cnt_names">
                                <h6>Lizbeth Pacheco</h6>
                                <p>
                                    <i class="far fa-envelope"></i>
                                    lcpacheco1@utpl.edu.ec
                                </p>
                            </div>
                            <div class="cnt_img">
                                <figure>
                                    <img src="../../img/equipo/liz.jpg" alt="Img Profile">
                                </figure>
                            </div> 
                        </li>
                        <li>
                            <div class="cnt_names">
                                <h6>Paul Cuenca</h6>
                                <p>
                                    <i class="far fa-envelope"></i>
                                    lcpacheco1@utpl.edu.ec
                                </p>
                            </div>
                            <div class="cnt_img">
                                <figure>
                                    <img src="../../img/equipo/paul.jpg" alt="Img Profile">
                                </figure>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </section>
     </footer>
    <script src="../../js/scriptk.js"></script>
    <script src="../../js/superadmin.js"></script>
    @yield('scripts')
</body>
</html>
