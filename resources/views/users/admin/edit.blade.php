
@extends('layouts.app')

@section('content')
<div class="box_aux"></div>
	<div class="container">
		<h1>Edición de Perfil: </h1>

		{!! Form::open(['route'=>'editarU.updateAdmin', 'method'=>'post']) !!}
		{!! csrf_field() !!}
			
		  		<!--div class="form-group">
				    <label for="nombre">Nombre:</label>
				    <input type="text" class="name" id="name" name="nombre" value="{{ Auth::user()->nombres }}">
			 	</div>

			 	<div class="form-group">
				    <label for="nombre">Apellidos:</label>
				    <input type="text" class="name" id="name" name="apellido" value="{{ Auth::user()->apellidos }}">
			 	</div>

			 	<div class="form-group">
				    <label for="nombre">Correo:</label>
				    <input type="text" class="name" id="name" name="correo" value="{{ Auth::user()->correo }}">
			 	</div>

			 	<div class="form-group">
				    <label for="nombre">Telefono:</label>
				    <input type="text" class="name" id="name" name="telefono" value="{{ Auth::user()->telefono }}">
			 	</div>

			 	<div class="form-group">
				    <label for="nombre">Departamento:</label>
				    <input type="text" class="name" id="name" name="departamento" value="{{ Auth::user()->departamento }}">
			 	</div>

			 	<div class="form-group">
				    <label for="nombre">Sección:</label>
				    <input type="text" class="name" id="name" name="seccion" value="{{ Auth::user()->seccion }}">
			 	</div>
		  		
		  		<div class="form-group">
				    <label for="nombre">Username:</label>
				    <input type="text" class="name" id="name" name="username" value="{{ Auth::user()->username }}">
			 	</div>

			 	<div class="form-group">
				    <label for="nombre">Password:</label>
				    <input type="text" class="name" id="name" name="password" value="{{ Auth::user()->password }}">
			 	</div-->

			 	<div class="form-group">
				    <label for="nombre">Tipo de usuario:</label>
				    {!! Form::text('tipo', 'una cosa', ['class'=>'name']) !!}
			 	</div>
		<button type="submit" class="btn btn-success">Actualizar</button>
	{!! Form::close() !!}

</div>

@endsection