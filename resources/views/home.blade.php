@extends('layouts.app')

@section('content')
<section class="box_inicial panel_completo" id="home_page">
    <div class="box_foto cont_foto">
        <div class="box_opacidad">
        </div>
        
    </div>
    <div class="box_flecha">
        <span class="glyphicon glyphicon-menu-down"></span>  
    </div>
</section>
<section class="container">
    <div class="row">
        <div class="col-md-12">
            <section  class = "estadisticas" >
                <h2> Económia </h2>
                <div  class = "d1" >
                    <h5> Datos </h5>
                    <img  src = "../img/grafica.png" >
                </div>
                <div  class = "i1" >
                    <h5> Descripción </h5>
                    <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    consequat. </p>
                    <a class="sus" href="#">Suscribete</a>
                </div>
            </section>
            <section class="cont_home" id="graficas">
                <div class="cnt_title">
                    <h2>Gráficas  </h2>
        </div>
    </div>
    <hr/>
    
    <div class="row">
        <div class="col-md-12">
            <section  class = "graficas" >
                <h2> Ingeniería Civil </h2>
                <div  class = "d2" >
                    <h5> Descripción </h5>
                    <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    consequat. </p>
                    <a class="sus" href="#">Suscribete</a>
                </div>
                <div  class = "i2" >
                    <h5> Datos </h5>
                    <img  src = "../img/grafica.png" >
                </div>
            </section>
        </div>
    </div>
</section>
@endsection
