@extends('layouts.app')
@section('title')
    Enviar correo
@endsection

@section('content')
    <div class="box_aux"></div>
    <section class="container" id="publication-container">
        <div class="row">
            <div class="col-md-4">
                <div id="cnt-sendmail">
                    <form method="post" action="{{url('/useradmin/sendtomail')}}" enctype="multipart/form-data">
                    @csrf
                        <h3 class="centrar">Enviar Infografía</h3>
                        <div class="form-group">
                            <label for="tomail">Para:</label>
                            <input type="email" name="tomail" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="concept">Asunto:</label>
                            <input type="text" name="concept" class="form-control" value="{{$infografia->nombre}}" required>
                        </div>
                        <div class="form-group">
                            <label for="concept">Descripción</label>
                            <textarea class="form-control" name="desc">{{$infografia->concepto}}</textarea>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" id="imgvalue" name="imgvalue" hidden></textarea>
                            <input type="text" name="categoria" required value="{{$infografia->idcategoria}}" hidden>
                            <input type="text" name="infografia" required value="{{$infografia->idinfografia}}" hidden>
                        </div>
        
                        <div class="cnt_btn">
                            <button type="submit" class="btn btn-success boton-md" id="btnContinuar">Enviar</button>
                        </div>    
                    </form>	
                </div>	
            </div>
            <div class="col-md-8" id="cnt-infografia">
                <section class="cnt-img">
                    <h3 class="centrar">{{$infografia->nombre}}</h3>
                    <figure>
                        <img src="" alt="Img de la infografia" id="imgInfografia">
                    </figure>
                </section>
                
            </div>
        </div>
    </section>

@endsection

@section('scripts')
    <script src="../../js/publicateinfografia.js"></script>
@endsection