@extends('layouts.app')

@section ('title')
Todas las categorias
@endsection

@section('content')
<div class="box_aux">

</div>
<section class="container"  id="categorias-home">
    <div class="cnt_title">
        <h2 class="h2-left">Todas las Categorias</h2>
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
    
</section>

<script src="../../js/home.js"></script>
@endsection
