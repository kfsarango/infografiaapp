@extends('layouts.app') @section('content')

<script>
$(document).ready(function(){
    $("btn_editar").click(function(){
        $(this).fadeOut();
    });
});
</script>
<div class="box_aux"></div>

<div class="container" id="cont_plan1">
    <div class="row">
        <div class="col-md-2">
            @include('layouts.controlInfografia')

        </div>

        <div class="col-md-8 plantilla1" id="plantilla1">
            <div class="text-right">
                <button type="button" class="btn btn-success " id = "btn_editar">Editar</button>
                <button type="button" class="btn btn-success">Guardar</button>
                <button type="button" class="btn btn-success">Enviar </button>
            </div class = "col-md-4">
				<element  id="arrastrar" style="left:0;top:0;" contenteditable="false">Hola </element>
			<div >
			</div>
        </div>
    </div>
</div>
<script>
/*
		$(document).ready(function()
{
        $("btn_editar").click(function () {    
	    alert("Bien!!!, la edad seleccionada es: "	);
	    //alert("Bien!!!, la edad seleccionada es: " + $(this).val());  
         });
});*/

</script>
@endsection