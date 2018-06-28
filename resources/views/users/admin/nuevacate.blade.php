
@extends('layouts.app')

@section('content')
<div class="box_aux"></div>
<section class="container" id="cont_categoria">
	<div class="row">
		<div class="col-md-6 iz">
			<h2>Crear Nueva Categoría</h2>
			<form>
					@foreach ($categoriasAll as $categoria)
						<div class="radio">
							<label><input type="radio" name="optradio">{{$categoria->nombre}}</label>
						</div>
					@endforeach
					<section class="cnt_btn_categoria">
						<span class="btn btn-md btn-info" id="ocultar_boton">Nueva Categoría</span>
					</section>
			</form>			

			<form method="post" class="new" action="{{url('nuevacategoria')}}">
        	@csrf
				<div class="mostrar">
					<input class="btn btn-info" name="nom" type="text" placeholder="Name categoría">
					<button type="submit" class="btn btn-success">Añadir</button>
					<button type="button" class="btn btn-info">Cancelar</button>	
					
				</div>
			</form>
		</div>

		<div class="col-md-6 der" >
			<h2>Crear Nuevo Item</h2>
			<form method="post" class="newItem" action="{{url('nuevacategoria')}}">
        	@csrf
				<div class="Item">
					<div class="form-group datoder">
						<label for="">Nombre:</label>
						<input class="btn btn-info" name="nom" type="text" placeholder="Valor">
					</div>
					<div class="botones">
						<button type="submit" class="btn btn-success">Añadir</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</section>

<script src="../js/nueva_categoria.js"></script>


@endsection