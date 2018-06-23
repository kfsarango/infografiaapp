@extends('layouts.app')

@section('content')
<div class="box_aux"></div>
<section class="container" id="cnt_superadmin">

	<div class="row">
		<div class="col-md-6">
			@foreach ($todos as $miData)
			<li>
				{{$miData->username}}
				{{$miData->correo}}
			</li>
			@endforeach
		</div>
		<div class="col-md-3">
			@foreach ($todos as $miData)
			<li>
				{{$miData->username}}
				{{$miData->correo}}
			</li>
			@endforeach
		</div>
		<div class="col-md-3">
			@foreach ($todos as $miData)
			<li>
				{{$miData->username}}
				{{$miData->correo}}
			</li>
			@endforeach
		</div>
	</div>

	<ul>
		
	</ul>
</section>

@endsection