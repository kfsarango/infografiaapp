@extends('layouts.app')
@section('content')
<div class="box_aux"></div>
<section class="container" id="cnt_superadmin">
	@include('flash::message')
	<div class="row">
		<div class="col-md-12" id="cont_super_admin">
			<ul class="nav nav-tabs">
				<li class="active"><a class="active" data-toggle="tab" href="#home">Usuarios</a></li>
				<li><a data-toggle="tab" href="#menu1">Correos</a></li>
				<li><a data-toggle="tab" href="#menu2">Infografias</a></li>
				<li id="typeuser">SuperAdministrador</li>
			</ul>
			<div class="tab-content">
				<div id="home" class="tab-pane active">
					<section class="users_content">
						
						<div class="btn_new_contain">
							<span class="btn btn-md btn-primary newadminbtn" id="btn_new">
								Nuevo
							</span>
							
						</div>
						<div class="form_content" id="showFormAdmin">
							<form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
									@csrf
								<div class="form-group row">
									<label for="correo" class="col-md-4 col-form-label text-md-right">{{ __('Correo') }}</label>
		
									<div class="col-md-6">
										<input id="correo" type="email" class="form-control{{ $errors->has('correo') ? ' is-invalid' : '' }}" name="correo" value="{{ old('correo') }}" required>
		
										@if ($errors->has('correo'))
											<span class="invalid-feedback" role="alert">
												<strong>{{ $errors->first('correo') }}</strong>
											</span>
										@endif
									</div>
								</div>
								<div class="form-group row">
									<label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Usuario') }}</label>
		
									<div class="col-md-6">
										<input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required autofocus>
		
										@if ($errors->has('username'))
											<span class="invalid-feedback" role="alert">
												<strong>{{ $errors->first('username') }}</strong>
											</span>
										@endif
									</div>
								</div>
		
								<div class="form-group row">
									<label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
		
									<div class="col-md-6">
										<input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
		
										@if ($errors->has('password'))
											<span class="invalid-feedback" role="alert">
												<strong>{{ $errors->first('password') }}</strong>
											</span>
										@endif
									</div>
								</div>
		
								<div class="form-group row">
									<label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
		
									<div class="col-md-6">
										<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
									</div>
								</div>
		
								<div class="form-group row mb-0">
									<div class="col-md-6 offset-md-4">
										<button type="submit" class="btn btn-primary">
											{{ __('Register') }}
										</button>
										<span class="btn btn-md btn-warning newadminbtn">
											Cancelar
										</span>

									</div>
								</div>
							</form>
						</div>
						<h3>Administradores</h3>
						<ul>
							@foreach ($todos as $miData)
								@if($miData->tipousuario == 1)
									<li>
										@ {{$miData->username}}

										<a href="#" class="drop">
											<i class="far fa-trash-alt"></i>	
										</a>

										<a href="#" class="edit">
												<i class="far fa-edit"></i>
										</a>
									</li>									
								@endif
							@endforeach
						</ul>			
						
					</section>
					
					<section class="users_content">
						<h3>Super Administradores</h3>
						<ul>
							@foreach ($todos as $miData)
								@if($miData->tipousuario == 1)
									<li>
										@ {{$miData->username}}

										<a href="#" class="drop">
											<i class="far fa-trash-alt"></i>	
										</a>

										<a href="#" class="edit">
												<i class="far fa-edit"></i>
										</a>
									</li>									
								@endif
							@endforeach
						</ul>
					</section>
					<section class="users_content">
						<h3>Suscritos</h3>
						<ul>
							@foreach ($suscritos as $data)
							<li>
								{{$data->mail}}

								<a href="#" class="drop">
									<i class="far fa-trash-alt"></i>	
								</a>

								<a href="#" class="edit">
										<i class="far fa-edit"></i>
								</a>
							</li>
							@endforeach
						</ul>
					</section>
				</div>
				<div id="menu1" class="tab-pane fade">
					<h3>Correos</h3>
				</div>
				<div id="menu2" class="tab-pane fade">
					<h3>Mis infografias</h3>
				</div>
			</div>
		</div>
	</div>
</section>

@endsection