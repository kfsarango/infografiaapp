@extends('layouts.app')

@section('content')
<div class="box_aux"></div>
<div class="container" id="contEditUserSuperA">
	<h3 class="centrar">Editando Usuario</h3>
	<form method="post" action="{{url('/superadmin/go-edit')}}">
		<div class="form-group">
		  <label for="name:">Nombres</label>
		<input type="text" class="form-control" name="name" value="{{ $myUser->nombres }}" required>
		</div>

		<div class="form-group">
		  <label for="lastaname">Apellidos:</label>
		  <input type="text" class="form-control" name="lastname" value="{{ $myUser->apellidos }}" required>
		</div>

		<div class="form-group">
			<label for="mail">Correo Electrónico:</label>
			<input type="mail" class="form-control" name="mail" value="{{ $myUser->correo }}" required>
		</div>

		<div class="form-group">
			<label for="phone">Teléfono:</label>
			<input type="number" class="form-control" name="phone" value="{{ $myUser->telefono }}" required>
		</div>

		<div class="form-group">
			<label for="department">Departamento:</label>
			<input type="text" class="form-control" name="department" value="{{ $myUser->departamento }}" required>
		</div>

		<div class="form-group">
			<label for="section">Sección:</label>
			<input type="text" class="form-control" name="section" value="{{ $myUser->seccion }}" required>
		</div>
		<div class="cnt_btns">
			<button type="submit" class="btn btn-success btn1">Guardar</button>
			<a href="/superadmin/super" class="btn btn-warning btn2">Cancelar</a>
		</div>
		
	</form>   
</div>

@endsection