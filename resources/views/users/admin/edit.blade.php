
@extends('layouts.app')

@section('content')

@section ('title')
Edit
@endsection

<div class="box_aux"></div>
<div class="container" id="cont_p">
@include('flash::message')

			<h1 class="editando_perfil">Actualizando Mis Datos</h1>
			<form method="post" class="formG" action="{{url('useradmin/edit')}}/{{ Auth::user()->id }}" >
        	@csrf	
		  		<div class="form-group row formC">
				    <label class="col-sm-2" for="nombre">Nombre:</label>
				    <input type="text" class="col-sm-3" id="name" name="nombre" required value="{{ Auth::user()->nombres }}">
			 	</div>

			 	<div class="form-group row formC">
				    <label class="col-sm-2" for="nombre">Apellidos:</label>
				    <input type="text" class="col-sm-3" id="name" name="apellido" value="{{ Auth::user()->apellidos }}">
			 	</div>

			 	<div class="form-group row formC">
				    <label class="col-sm-2" for="nombre">Correo:</label>
				    <input type="text" class="col-sm-3" id="name" name="correo" value="{{ Auth::user()->correo }}">
			 	</div>

			 	<div class="form-group row formC">
				    <label class="col-sm-2" for="nombre">Telefono:</label>
				    <input type="text" class="col-sm-3" id="name" name="telefono" value="{{ Auth::user()->telefono }}">
			 	</div>

			 	<div class="form-group row formC">
				    <label class="col-sm-2" for="nombre">Departamento:</label>
				    <input type="text" class="col-sm-3" id="name" name="departamento" value="{{ Auth::user()->departamento }}">
			 	</div>

			 	<div class="form-group row formC">
				    <label class="col-sm-2" for="nombre">Sección:</label>
				    <input type="text" class="col-sm-3" id="name" name="seccion" value="{{ Auth::user()->seccion }}">
			 	</div>

			 	<div class="form-group row formC">
					<button type="submit" class="btn btn-success">Actualizar</button>
			 	</div>
			</form>
</div>

@endsection