@extends('layouts.app')

@section('content')
<div class="box_aux"></div>

<div class="container" id="cont_plan1">
	<div class="row">
		<div class="col-md-2">
			<form action="">
			<legend class="text-center header"><i class="fa fa-list bigicon"> Campos de la Infografía</i></legend>
				
				@foreach ($items as $item)
					<div class="form-group">
						<label for="">{{$item->campo}}</label>
						<input type="text" class="form-control" value="{{$item->valor}}">
					</div>
				@endforeach
			</form>
		</div>
	

		<div class="col-md-10">
			<legend class="text-center header"><i class="fa fa-list bigicon"> Edita tu Plantilla 1 elegida</i></legend>
			<!-- Fila 1 -->
			<div class="row border-0" id="color-aside">
				<div class="col-md-4">
					<h2>
						ITEM 1
					</h2>
					<img src="img/us.png">
				</div>
				<div class="col-md-8" id="color-article">
					<h3>Lorem ipsum</h3>
					<article>
						Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
						Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
						irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
					</article>
				</div>
			</div>
			<!-- Fila 2 -->
			<div class="row" >
				<div class="col-md-6" id="color-aside2">
					<h3>Lorem ipsum</h3>
					<img src="img/bolsa.png">
				</div>
				<div class="col-md-6 " id="color-item2">
					<h2>
						ITEM 2
					</h2>
					<img src="img/barra.png">
				</div>

			</div>
			<!-- Fila 3 -->
			<div class="row" id="color-aside3">
				<div class="col-md-8" id="color-article">
					<h3>Lorem ipsum</h3>

					<article>
						
						Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
						Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
						irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
					</article>
				</div>
				<div class="col-md-4">
					<h2>
						ITEM 3
					</h2>
					<img src="img/grafico.png">
				</div>

			</div>
		</div>
	</div>

</div>
@endsection