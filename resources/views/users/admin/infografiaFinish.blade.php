
@extends('layouts.app')

@section('content')
<div class="box_aux"></div>

<div class="container" id="cont_finish">
    <div class="row">
        <div class="col-md-12">
            <div class="well well-sm">
                <form  method="post" class="form-horizontal finish_info" action="{{url('sendplantilla')}}/{{$infografia}}">
                @csrf  
                    <legend class="text-center header"><i class="fa fa-list bigicon"> INFORMACIÓN DE LA INFOGRAFÍA</i></legend>
                    <div class="form-group">
                        <input type="text" name="infografia" id="idinfografia" value='{{$infografia}}'>
                        <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-list bigicon"> Nombre de la Infografía</i></span>
                        <div class="col-md-8">
                            <input id="fname" name="nombre" type="text" placeholder="Name" class="form-control">
                        </div>
                    </div>
                    <div class="fechas">

                        <div class="for">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-calendar bigicon"> Ultima Modificación</i></span>
                            <div class="col-md-11">
                                <input type="datetime-local" class="form-control" name="datemodificacion">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-tag bigicon"> Detalle</i></span>
                        <div class="col-md-8">
                            <textarea class="form-control" id="message" name="detalle" placeholder="Descripción ..." rows="7"></textarea>
                        </div>
                    </div>


                    <div class="fotos">
                        <div class="fo">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-camera bigicon"> <input type="radio" name="numplan" id="cate" value="1"> Plantilla 1</i></span>
                            <div class="col-md-12">
                                <img  src = "../img/grafica.png" class="form-control">
                            </div>
                        </div>

                        <div class="fo">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-camera bigicon"> <input type="radio" name="numplan" id="cate" value="2"> Plantilla 2</i></span>
                            <div class="col-md-12">
                                <img  src = "../img/grafica.png" class="form-control">
                            </div>
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