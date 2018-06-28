<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <link rel="stylesheet" href="../css/estilosp.css">


    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif

            <div class="content">

                <div class="title">
                    Proyecto de WEB
                </div>

                

                <div class="title m-b-md">
                    <img src="../image/info.png" alt="">
                    Insta | Info 
                </div>

                <div class="links">
                    <a href="https://laravel.com/docs">Home</a>
                    <a href="https://laravel.com/docs">Mapa</a>
                    <a href="https://laracasts.com">Contactos</a>
                </div>
            </div>
        </div>

        <section  class = " home " >
    
            <section  class = " izquierda " >

            </section>

            <section  class = " derecha " >
                
            </section>
        </section>
        <hr/>

        <section  class = "estadisticas" >
            <h2> Económia </h2>
            <div  class = "d1" >
                <h5> Datos </h5>
                <img  src = "../image/grafica.png" >
            </div>
            <div  class = "i1" >
                <h5> Descripción </h5>
                <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. </p>
                <a class="boton" href="#">Suscribete</a>
            </div>
        </section>
        <hr/>

        <section  class = "graficas" >
            <h2> Ingeniería Civil </h2>
            <div  class = "d2" >
                <h5> Descripción </h5>
                <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. </p>
                <a class="boton" href="#">Suscribete</a>
            </div>
            <div  class = "i2" >
                <h5> Datos </h5>
                <img  src = "../image/grafica.png" >
            </div>
        </section>

    <footer>
        <section class="container">
            <section class="row">
              <section class="col-md-4" id="col">
                <img src="../image/utpl.png">
                <p><b>Dirección:</b> San Cayetano Alto, calle Marcelino Champagnat s/n<br/><b>Teléfono:</b> 07 3701444</p>
              </section>

              <section class="col-md-4" id="col">
                <img src="../image/taw.png">
                <img src="../image/medialab.png">
              </section>

              <section class="col-md-4" id="col">
                <h3>Contactos</h3>
                <div class="social">
                  <ul>
                    <li>Klever Sarango | kfsarango@utpl.edu.ec | <i class="far fa-envelope"></i>  <a href="https://www.facebook.com/kfsarango1?fref=hovercard&hc_location=chat" target="_blank"><img alt="siguenos en facebook" height="32" src="http://2.bp.blogspot.com/-q_Tm1PpPfHo/UiXnJo5l-VI/AAAAAAAABzU/MKdrVYZjF0c/s1600/face.png" title="siguenos en facebook" width="32" /></a><i class="fab fa-facebook-square"></i> </a></li><br>

                    <li>Paul Cuenca | pacuenca@utpl.edu.ec | <i class="far fa-envelope"></i><a href="https://www.facebook.com/paulandres.cuencamacas" target="_blank"><img alt="siguenos en facebook" height="32" src="http://2.bp.blogspot.com/-q_Tm1PpPfHo/UiXnJo5l-VI/AAAAAAAABzU/MKdrVYZjF0c/s1600/face.png" title="siguenos en facebook" width="32" /></a> <i class="fab fa-facebook-square"></i></a></li>
                    <br>

                     

                    <li>Lizbeth Pacheco | lcpacheco1@utpl.edu.ec | <i class="far fa-envelope"></i><a href="https://www.facebook.com/kfsarango1?fref=hovercard&hc_location=chat" target="_blank"><img alt="siguenos en facebook" height="32" src="http://2.bp.blogspot.com/-q_Tm1PpPfHo/UiXnJo5l-VI/AAAAAAAABzU/MKdrVYZjF0c/s1600/face.png" title="siguenos en facebook" width="32" /></a><i class="fab fa-facebook-square"></i></a></li>

                  </ul>
                </div>
              </section>
            </section>
        </section>

      </footer>

    </body>
</html>
