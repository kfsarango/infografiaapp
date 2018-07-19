@extends('layouts.app')
@section('content')
<div class="box_aux"></div>
<section class="container" id="cnt_superadmin">
@include('flash::message')
	<div class="row">
		<div class="col-md-12" id="cont_super_admin">
			<ul class="nav nav-tabs">
				<li class="active"><a class="active" data-toggle="tab" href="#home">Usuarios</a></li>
				<li><a data-toggle="tab" href="#correos">Correos</a></li>
				<li><a data-toggle="tab" href="#infografias">Infografias</a></li>
				<li><a data-toggle="tab" href="#datos">Datos</a></li>
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

										<a href="{{url('superadmin/drop-user')}}{{'/'}}{{$miData->id}}" class="drop">
											<i class="far fa-trash-alt"></i>	
										</a>

										<a href="{{url('superadmin/edit-user')}}{{'/'}}{{$miData->id}}" class="edit">
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
				<div id="correos" class="tab-pane fade">
					<div class="row">
						<div class="col-md-6">
							<h3 class="centrar">Independientes</h3>
							@foreach ($undestinatario as $row)
								<button class="accordion">{{$row->nombres}} {{$row->apellidos}} <span>{{$row->fecha}}</span></button>
								<div class="panel">
									<h5 class="centrar">El Correo</h5>
									<p>
										<strong>Asunto: </strong>
										{{$row->asunto}}
									</p>
									<p>
										<strong>Destinatario: </strong>
										{{$row->para}}
									</p>
									<p>
										<strong>Descripción: </strong>
										{{$row->descripcion}}
									</p>
									<p>
										<strong>Fecha: </strong>
										{{$row->fecha}}
									</p>

									<hr>
									<h5 class="centrar">La Infografía</h5>
									<p>
										<strong>Nombre: </strong>
										{{$row->nombre}}
									</p>
									<p>
										<strong>Concepto: </strong>
										{{$row->concepto}}
									</p>
								</div>
							@endforeach
							
							

						</div>
						<div class="col-md-6">
							<h3 class="centrar">A suscritores</h3>
							@foreach ($parasuscritores as $row)
								<button class="accordion">{{$row->nombres}} {{$row->apellidos}} <span>{{$row->fecha}}</span></button>
								<div class="panel">
									<h5 class="centrar">El Correo</h5>
									<p>
										<strong>Asunto: </strong>
										{{$row->asunto}}
									</p>
									<p>
										<strong>Destinatario: </strong>
										<a href="{{$row->idcategoria}}" data-toggle="modal" data-target="#myModal" class="show-suscriptores">Suscritores de {{$row->nombrecategoria}}</a>
									</p>
									<p>
										<strong>Descripción: </strong>
										{{$row->descripcion}}
									</p>
									<p>
										<strong>Fecha: </strong>
										{{$row->fecha}}
									</p>

									<hr>
									<h5 class="centrar">La Infografía</h5>
									<p>
										<strong>Nombre: </strong>
										{{$row->nombre}}
									</p>
									<p>
										<strong>Concepto: </strong>
										{{$row->concepto}}
									</p>
								</div>
							@endforeach
							<!-- Modal -->
							<div class="modal fade" id="myModal" role="dialog">
								<div class="modal-dialog modal-sm">
								<div class="modal-content">
									<div class="modal-header">
									<h4 class="modal-title">Suscriptores</h4>
									</div>
									<div class="modal-body" id="cnt-suscriptores">
										
									<p></p>
									</div>
									<div class="modal-footer">
									<button type="button" class="btn btn-info" data-dismiss="modal">Cerrar</button>
									</div>
								</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div id="infografias" class="tab-pane fade">
					<h3 class="centrar">Mis infografias</h3>
					<div class="row">
						@foreach ($dataInfo as $Datos)
							<div class="col-md-4 templates">
								<img src="../img/vistaPrevia/template.jpg" class="img-thumbnail" alt="Cinque Terre">
								<section class="templates-text">
									<div class="cnt-info">
										<h2>{{ $Datos->nombre }}</h2>
										<h5 class="centrar">Autor</h5>
										<p>
											<strong>Nombre:</strong>
											Klever Sarango
										</p>
										<p>
											<strong>Departamento:</strong>
											Klever Sarango
										</p>
										<p>
											<strong>Sección:</strong>
											Klever Sarango
										</p>
										<p>
											<strong>Fecha de creación:</strong>
											{{$Datos->fecha_creacion}}
										</p>
										<a href="{{ url ('/useradmin/template')}}/{{$Datos->idinfografia}}" class="btn btn-primary fa fa-clone centrar" type="submit"></a>
									</div>
									
								</section>
													
							</div>				
						@endforeach
					</div>
					
				</div>
				<div id="datos" class="tab-pane fade">
					<div class="cnt-datos">
							@foreach ($categorias as $cat)
							<button class="accordion">{{$cat->nombrecategoria}}</button>
							<div class="panel">
								<h5 class="centrar">Datos</h5>
								<ul>
									@foreach ($items as $item)
										@if ($item->categoria_idcategoria == $cat->idcategoria)
											<li>
												{{$item->campo}}
											</li>
										@endif
										
									@endforeach
								</ul>
								
							</div>
						@endforeach
						
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

@endsection

@section('scripts')
<script src="../../js/superadmin.js"></script>
@endsection