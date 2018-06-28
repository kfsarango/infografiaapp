
@extends('layouts.app')

@section('content')
<div class="box_aux"></div>
<section class="container" id="cnt_admin">
	<div class="row">
		<div class="col-md-12">
			<h2>Bienvenido Administrador</h2>
			@foreach ($tipos as $miUser)
				<li>{{ $miUser->tipo }}</li>
			@endforeach					
		</div>
	</div>
	<ul>
		
	</ul>
</section>

@endsection

