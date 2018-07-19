
@extends('layouts.app')

@section('content')

@section ('title')
Editar Inforgrafía
@endsection
<div class="box_aux"></div>

<div class="container" id="cont_edit_info">
<div class="row">
        <div class="col-md-12">
            <div class="well well-sm form_edit_infografia">
                <form  method="post" class="form-horizontal finish_info" action="{{url('/useradmin/saveUpdateInfografia')}}/{{$info->idinfografia}}">
                @csrf
                    <h3>INFORMACIÓN DE LA INFOGRAFÍA</h3>
                    <div class="form-group">
                        <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-list bigicon"> Nombre de la Infografía</i></span>
                        <div class="col-md-8">
                            <input id="fname" name="nombre" type="text" placeholder="Name" class="form-control" value="{{$info->nombre}}" >
                        </div>
                    </div>

                    <div class="form-group">
                        <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-tag bigicon"> Detalle</i></span>
                        <div class="col-md-8">
                            <textarea class="form-control" id="message" name="detalle"  rows="7">{{$info->concepto}}</textarea>
                        </div>
                    </div>

                    <div class="fotos">
                        <div class="fo">
                            <input type="text" name="numplan" id="cate" value="{{$info->plantilla}}" hidden>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-5 text-center">
                            <button type="submit" class="btn btn-success">Actualizar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection