@extends('layouts.app')

@section('content')
<div class="box_aux"></div>

<div class="container" id="cont_plan1">
	<div class="row">
		<div class="col-md-2">
				@include('layouts.controlInfografia')
				
		</div>
	
		<div class="col-md-10 plantilla1" id="plantilla1">
		<div class = "text-right">
			<button type="button" class="btn btn-success ">Editar</button>
			<button type="button" class="btn btn-success">Guardar</button>
			<button type="button" class="btn btn-success">Enviar </button>
		</div>
		<ul id="myMenu">
			<li><a href="#">HTML</a></li>
			<li><a href="#">CSS</a></li>
			<li><a href="#">JavaScript</a></li>
			<li><a href="#">PHP</a></li>
			<li><a href="#">Python</a></li>
			<li><a href="#">jQuery</a></li>
			<li><a href="#">SQL</a></li>
			<li><a href="#">Bootstrap</a></li>
			<li><a href="#">Node.js</a></li>
		</ul>	
				
   		</div>
				</div>
				
		</div>
	</div>

</div>

<div class="container" id="cont_plan2">
    <div class="row">
        <div class="col-md-2">
                @include('layouts.controlInfografia')
        </div>

        <div class="col-md-10 plantilla2" id="plantilla2">
            hola
        </div>
    </div>


@endsection