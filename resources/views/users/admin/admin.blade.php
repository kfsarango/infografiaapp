<<<<<<< HEAD
<h2>hola admin</h2>
<p>La suma es: {{$var}} </p>
<p>La resta es: {{$res}} </p>
<ul>
	@foreach ($array as $user)
    	<li>Dato {{ $user }}</li>
	@endforeach
</ul>
=======
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

>>>>>>> ba8850c70675e103916c3718b1d818aa14287282
