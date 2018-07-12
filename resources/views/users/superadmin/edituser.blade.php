@extends('layouts.app')

@section('content')
<div class="box_aux"></div>
<div class="container" id="contEditUserSuperA">
			<h1>Editando perfil de: {{Auth::user()->nombres}}</h1>
</div>

@endsection