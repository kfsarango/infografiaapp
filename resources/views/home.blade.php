@extends('layouts.app')

@section ('title')
Home
@endsection

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
<section class="container"  id="categorias-home">
    <div class="cnt_title">
        <h2 class="h2-left">Categorias</h2>
        <p>
            Recibe noticias sobre nuestras infografías en las diferentes categorias.
        </p>
    </div>
    
    <div class="row container-card">
        @foreach($categorias as $cat)
            <div class="col-md-4">
                <div class="card">
                    
                    <div class="presentation-side">
                        <div class="title-cont">
                        <span>{{$cat->nombrecategoria}}</span>
                            <i class="fas fa-plus btn-show" id="{{$cat->idcategoria}}"></i>
                        </div>
                    </div>
                <div class="body" id="body{{$cat->idcategoria}}">
                        <i class="fas fa-window-close btn-close"></i>
                        <h3 class="centrar">{{$cat->nombrecategoria}}</h3>
                        <p>
                            <i class="far fa-file-image"></i>
                            Infografías creadas: 
                            <span class="nro-infografias">
                                0
                            </span>
                        </p>
                        <p>
                            <i class="fab fa-angellist"></i>
                            Usuarios suscritos: 
                            <span class="nro-sucritos">
                                0
                            </span>
                        </p>
                        <hr>

                        <form class="form-suscribe">
                            <div class="form-group">
                                <input type="text" class="form-control idCategoria" value="{{$cat->idcategoria}}" required hidden>
                            </div>
    
                            <div class="form-group">
                                <label for="correo">Suscribete</label>
                                <input id="correo" type="email" class="form-control{{ $errors->has('correo') ? ' is-invalid' : '' }} mailToSuscribe" name="correo" value="{{ old('correo') }}" required>

                                @if ($errors->has('correo'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('correo') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <!--div class="form-group">
                                <label for="mail"><i class="fas fa-forward"></i> Sucribirme</label>
                                <input type="mail" name="mail" class="form-control mailToSuscribe" placeholder="Ingresa tu correo electrónico" required>
                            </div-->
                            <div class="cnt_btns">
                                <button type="submit" class="btn btn-sm btn-success btn2">Listo</button>
                            </div>
                        </form>
                        <div class="cnt-resultado">
                            
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
    <div class="cnt_btn">
        <a href="#" class="boton-md">Ver todas las categorias</a>
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
<script src="../../js/home.js"></script>
@endsection
