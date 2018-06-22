@extends('layouts.app')

@section('content')
<div class="box_aux"></div>
<section class="container" id="cnt_admin">
	<h2>Bienvenido Administrador</h2>
	<ul>
		@foreach ($tipos as $miUser)
			<li>{{ $miUser->tipo }}</li>
		@endforeach
	</ul>
</section>

@endsection

