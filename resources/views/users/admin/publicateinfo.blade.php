@extends('layouts.app')
@section('title')
    Publicar
@endsection

@section('content')
    <div class="box_aux"></div>
    <section class="container" id="publication-container">
        <h1 class="centrar">Publicando mi Infografía</h1>
        <div class="row">
            <div class="col-md-8">
                <figure>
                    <img src="" alt="Img de la infografia" id="imgInfografia">
                </figure>
            </div>
            <div class="col-md-4">
                <form method="post" class="form-inline" action="{{url('/useradmin/sendtosuscribers')}}" enctype="multipart/form-data">
                @csrf
                    <div class="form-group">
                        <input id="imgvalue" type="text" name="imgvalue">
                    </div>

                    <!--div class="form-group">
                        {!! Form::file('image', ['id' => 'imgvalue']) !!}
                    </div-->
    
                    <div class="cont_boton">
                        <button type="submit" class="btn btn-success save" id="btnContinuar">Enviar</button>
                    </div>    
    
                </form>		
            </div>
        </div>
    </section>

@endsection

@section('scripts')
    <script src="../../js/publicateinfografia.js"></script>
@endsection