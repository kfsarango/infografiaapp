
@extends('layouts.app')

@section('content')
<div class="box_aux"></div>
<section class="container" id="cnt_admin">
	<div class="row">
		<div class="col-md-11 templatesCreate">
			<h2>Infografías Creadas</h2>
			<div class="row">
				@foreach ($dataInfo as $Datos)
					<div class="col-md-5 templates">
						<h4>{{ $Datos->nombre }}</h4>
						<img src="../img/vistaPrevia/template.jpg" class="img-thumbnail" alt="Cinque Terre">
						<a href="{{ url ('/useradmin/updateInfo') }}{{$Datos->idinfografia}}" class="btn btn-primary btn-sm" type="submit">Editar</a>
					</div>				
				@endforeach
			</div>
		</div>
		<div class="col-md-1">
			
			<a href="{{ route('nuevain') }}" class="btn btn-primary btn-md" >Nueva Infografía</a>
		</div>
	</div>
	<ul>
		
	</ul>
</section>

@endsection

