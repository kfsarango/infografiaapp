@extends('layouts.app')

@section('content')
@section ('title')
Nueva Infografía
@endsection
<div class="box_aux"></div>
<section class="container" id="cont_categoria">
	@include('flash::message')
	<div class="row">
		<div class="col-md-12">
			<h3 class="centrar">Nueva Infografía</h3>
		</div>
		<div class="col-md-6" id="cnt-category">
			<h4>Seleccione una categoria</h4>
			<form>
					@foreach ($categoriasAll as $categoria)
						<div class="radio">
							<label>
								<input type="radio" name="optradio" id="cate" value="{{$categoria->idcategoria}}">{{$categoria->nombrecategoria}}
							</label>
						</div>
					@endforeach
					<section class="cnt_btn_categoria">
						<span class="btn btn-sm btn-primary" id="newcategory">Nueva</span>
					</section>
			</form>			

			<form method="post" class="new" id="formcategory" action="{{url('useradmin/nuevacategoria')}}">
			@csrf
				<h5 class="centrar">Agregando nueva categoria</h5>
				<div class="mostrar form-group">
					<input  name="nom" type="text" class="form-control" placeholder="Ingrese un nombre" required>
				</div>
				<div id="btns-cnt">
					<button type="submit" class="btn btn-sm btn-primary btn1">Añadir</button>
					<span class="btn btn-sm btn-warning btn2" id="cancelnewcategory">Cancelar</span>
				</div>
			</form>
		</div>

		<div class="col-md-6" id="cnt-data">
			<h4>Ingreso de datos</h4>
			<section class="cnt_btn_categoria">
				<span class="btn btn-sm btn-info" id="newcampo">Nuevo Campo</span>
			</section>
			<div class="mostrar_items new">
				<h5 class="centrar">Agregando un nuevo Campo</h5>
				<div class="mostrar form-group">
					<input  name="campo1" type="text" class="form-control" id="nombre" placeholder="Ingrese un nombre">
				</div>
				<div id="btns-cnt">
					<button type="submit" class="btn btn-sm btn-info btn1" id="nuevo_item">Añadir</button>
					<span type="button" class="btn btn-sm btn-warning btn2" id="cancelnewcampo">Cancelar</span>
				</div>	
			</div>
			<form method="post" class="form-inline" action="{{url('/useradmin/prueba')}}">
        	@csrf
					<div class="form-group">
						<input id="idcat" type="text" name="idcat" hidden required>
					</div>
				<div id="items_nuevos">						
				</div>

				<div class="cont_boton">
					<button type="submit" class="btn btn-success save" id="btnContinuar">Continuar</button>
				</div>
					

			</form>			

		</div>
	</div>
</section>
<script src="../js/nueva_categoria.js"></script>


@endsection