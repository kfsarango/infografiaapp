
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
							<label><input type="radio" name="optradio" id="cate" value="{{$categoria->idcategoria}}">{{$categoria->nombre}}</label>
						</div>
					@endforeach
					<section class="cnt_btn_categoria">
						<span class="btn btn-md btn-info" id="ocultar_boton">Nueva Categoría</span>
					</section>
			</form>			

			<form method="post" class="new" action="{{url('nuevacategoria')}}">
        	@csrf
				<div class="mostrar">
					<input  name="nom" type="text" placeholder="Name categoría">
					<button type="submit" class="btn btn-success">Añadir</button>
					<button type="button" class="btn btn-info">Cancelar</button>	
					
				</div>
			</form>
		</div>

		<div class="col-md-6 der" >
			<h2>Crear Nuevos Items</h2>
			<form method="post" action="{{url('prueba')}}">
        	@csrf
				<div id="items_nuevos">
					@foreach ($campos as $cam)
						<div>{{$cam->campo}}</div>
					@endforeach
					<input id="idcat" type="text" >
					<div class="form-group">
						<p>
							lo
						</p>
						<label for="asias">jaso</label>
						<input id="idcat" type="text" >
					</div>
					
					<div class="form-group">
						<label for="">Nombresss:</label>
						<input type="text" name="nombre">
						<span id="eliminar_item">
							eliminar
						</span>
					</div>

					<section class="cnt_btn_categoria">
						<span class="btn btn-sm btn-info" id="ocultar">Añadir</span>
					</section>
				</div>

				<div class="cont_boton">
					<button type="submit" class="btn btn-success save">Continuar</button>
				</div>
					

			</form>			

			<div class="mostrar_items">
				<input  name="nombre_item" type="text" placeholder="Name" id="nombre">
				<button type="submit" class="btn btn-success" id="nuevo_item">Añadir</button>
				<button type="button" class="btn btn-info">Cancelar</button>	
			</div>
		</div>
	</div>
</section>

<script src="../js/nueva_categoria.js"></script>


@endsection