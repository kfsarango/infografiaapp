
@extends('layouts.app')

@section('content')
@section ('title')
Todos tus diseños
@endsection
<div class="box_aux"></div>
<section class="container" id="">
	<div class="row">
		<div class="col-md-12 templatesCreate">
			<div class="row admintitulo">
					<h3>INFOGRAFÍAS CREADAS</h3>
					<a href="{{ route('nuevain') }}" class="btn btn-primary btn-md" >Nueva Infografía</a>
			</div>

			<div class="row">
				@foreach ($dataInfo as $Datos)
					<div class="col-md-4 templates">
						<img src="../img/infografias/{{$Datos->idinfografia}}.png" class="img-thumbnail" alt="Cinque Terre">
						<section class="templates-text">
							<h2>{{ $Datos->nombre }}</h2>
							<spam>Última Modificación: {{$Datos->ultima_modificacion}}</spam>							
							<a href="{{ url ('/useradmin/updateInfo') }}/{{$Datos->idinfografia}}" class="btn btn-primary btn-md fa fa-edit" type="submit"></a>
							<a href="{{ url ('/useradmin/template')}}/{{$Datos->idinfografia}}" class="btn btn-primary btn-xm fa fa-clone" type="submit"></a>
						</section>
											
					</div>				
				@endforeach
			</div>
		</div>
	</div>
	<ul>
	</ul>
</section>

@endsection

