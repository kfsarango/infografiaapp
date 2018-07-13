@extends('layouts.app')

@section('content')
<div class="box_aux"></div>
<div class="container" id="contEditUserSuperA">
	<h3 class="centrar">Editando Usuario</h3>
	<form method="POST" action="{{url('superadmin/go-edit')}}">
		{{ csrf_field() }}
		<input type="hidden" name="id" value="{{ $myUser->id }}" >
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
			<input type="text" class="form-control" name="phone" value="{{ $myUser->telefono }}" onkeypress="return numeros(event)" required>
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
		<script>
		    function numeros(e){
				key = e.keyCode || e.which;
				tecla = String.fromCharCode(key).toLowerCase();
				letras = " 0123456789";
				especiales = [8,37,39,46];
			
				tecla_especial = false
				for(var i in especiales){
					if(key == especiales[i]){
						tecla_especial = true;
						break;
					} 
				}
			
				if(letras.indexOf(tecla)==-1 && !tecla_especial)
					return false;
			}
		</script>
	</form>   
</div>

@endsection