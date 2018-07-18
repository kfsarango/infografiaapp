@extends('layouts.app') @section('content')

<script>
    $(document).ready(function() {
        $("btn_editar").click(function() {
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
                <button type="button" class="btn btn-success " id="btn_editar">Editar</button>
                <button type="button" class="btn btn-success">Guardar</button>
                <button type="button" class="btn btn-success">Enviar </button>
            </div class="col-md-4">
            <element id="arrastrar" style="left:0;top:0;" contenteditable="false">Hola </element>
            <div class="row col-md-12" id="plan_cabecera">
				<h1 id="numero">4.5</h1>
				<h2 id="magnitud">Magnitud</h2>
		</div>

		<div class="row">
			<div class="col-md-6 " id="plan_centro1">
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
				proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
				
			</div>
			<div class="col-md-6" id="plan_centro2">
				<p>
				Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
				proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
				</p>
			</div>
		</div>
		<div class="row">
			 
			Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
		</div>
				
		<div class="row">
			<article class="col-xs-12 col-sm-8 col-md-6 col-lg-5">
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
				proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
			</article>
			<aside class="col-xs-12 col-sm-4 col-md-6 col-lg-7">
				<p>
					Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
					cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
					proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
				</p>
			</aside>
		</div>
            <div>
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