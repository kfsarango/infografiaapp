@extends('layouts.app')

@section('content')
<section class="container" id="cnt_admin">
	<div class="row">
		<div class="col-md-12">
			<h2>Bienvenido Administrador</h2>				
		</div>
	<form method="post" action="internas/modificar.php">		
				<div class="datos">
					<label class="label" for="">Id: *</label>
					<input type="text" name="id"  value=""><br>
					<label class="label" for="">Nombres: *</label>
					<input type="text" name="nombres"  value=""><br>
					<label class="label" for="">Apellidos: *</label>
					<br>
				</div>
			</form>	
</div>
</section>
	
	

@endsection