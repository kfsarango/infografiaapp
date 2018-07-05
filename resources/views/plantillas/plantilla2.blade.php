@extends('layouts.app')

@section('content')
<div class="box_aux"></div>

<div class="container" id="cont_plan2">
	<div class="row">
		<div class="col-md-3">
			<form action="">
			<legend class="text-center header"><i class="fa fa-list bigicon"> Campos de la Infografía</i></legend>
				<div class="form-group">
					<label for="">Campo 1:</label>
					<input type="text" class="form-control">
				</div>

				<div class="form-group">
					<label for="">Campo 2:</label>
					<input type="text" class="form-control">
				</div>

				<div class="form-group">
					<label for="">Campo 3:</label>
					<input type="text" class="form-control">
				</div>

				<div class="form-group">
					<label for="">Campo</label>
					<input type="text" class="form-control">
				</div>
			</form>
		</div>
	

		<div class="col-md-9">
			<legend class="text-center header"><i class="fa fa-list bigicon"> Edita tu Plantilla 2 elegida</i></legend>			
		</div>
	</div>

</div>
@endsection