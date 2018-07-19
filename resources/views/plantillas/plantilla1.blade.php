@extends('layouts.app')

@section('content') 


<section class="all_page_infografia">
	<div class="container" id="cont_plan1">
		@include('flash::message')
		<!-- Sección de los botones de el contendio para editar la infografía -->
		@include('layouts.seccionBotonesInfografia')	
				
		<div class="row">
			<!-- Datos de la infografia consumidos de la Base de Datos -->
			<div class="col-md-3 data_infografia1">
				@include('layouts.controlInfografia')
			</div>

			
			<!-- Contenido de la parte donde editaremos la plantilla de la infografía -->
			<div class="col-md-9 plantilla1" id="plantilla1">
				<textarea id="bodyInfografia" hidden>{{$body}}</textarea>
				<span id="{{$id}}" class="myInfo" hidden></span>
				<form method="post" class="form-inline" action="{{url('/useradmin/templateEditado')}}/{{$id}}">
				@csrf
					<input type="text" name="idinfografia" value="{{$id}}" hidden>
					<span class="elemento" hidden></span>
					<!-- Sección de la plantilla de la infografía que editaremos -->
					<div class="row seccion_plantilla">
						<div class="col-md-12">
							<!-- Fila 1 -->
							<div class="row" id="color-aside">
								<div class="col-md-4" id="color-aside-i">
									<h2 id="titulo1" name="titulo1" contenteditable="true">
										Porbando
									</h2>
									<img src="../../img/us.png" name="foto1">
								</div>
								<div class="col-md-8" id="color-aside-d">
									<h3 contenteditable="true" name="titulo2" contenteditable="true" id="titulo2">Lorem ipsum</h3>
									<p contenteditable="true" name="parrafo1" contenteditable="true" id="parrafo1">Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit eius, laudantium est, architecto voluptate fugiat a recusandae consequatur id doloribus 
									culpa voluptatibus libero dolor, minus enim distinctio iusto aliquam commodi!</p>
								</div>
							</div>
							<!-- Fila 2 -->
							<div class="row" id="color-aside2">
								<div class="col-md-5" id="color-aside-2-i">
									<h3 contenteditable="true" name="titulo3" id="titulo3">Title</h3>
									<div class="figura"></div>
								</div>
								<div class="col-md-7 " id="color-aside-2-d">
									<h2 contenteditable="true" name="titulo4" id="titulo4">TITTLE</h2>
									<div id="map">My map will go here</div>  
								</div>

							</div>
							<!-- Fila 3 -->
							<div class="row" id="color-aside3">
								<div class="col-md-8" id="color-aside-3-i">
									<h3 contenteditable="true" name="titulo5" id="titulo5">Lorem ipsum</h3>

									<p contenteditable="true" name="parrafo2" id="parrafo2">	
										Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
										Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
										irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
									</p>
								</div>
								<div class="col-md-4" id="color-aside-3-d">
									<h2 contenteditable="true" name="titulo6" id="titulo6">
										ITEM 3
									</h2>
									<img src="../../img/grafico.png" name="foto2">
								</div>
							</div>						
						</div>
					</div>
				</form>
			</div>
			<!-- Fin contenido de la parte donde editaremos la plantilla de la infografía -->

		</div>
	</div>
</section>

<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAcYVGjUno8qc20yhUk92PxpmhnLF3gEm8">
</script>

<script src="https://maps.goog leapis.com/maps/api/js?v=3.exp"></script>
<script src="js/nueva_categoria.js"></script>


<script>
	$(document).ready(function(){

	var lati=null;
	var long=null;
	//Aqui comenzamos a mover los datos de la infografia al area requerida
	const days = [].slice.call( document.querySelectorAll( '#color-aside2', '.figura' ), 0 );
	const items = [].slice.call( document.querySelectorAll( '.data_infografia1', '.itemT' ), 0 );
	const days1 = [].slice.call( document.querySelectorAll( '.data_infografia1', '.figura1' ), 0 );

	let currentlyDragging = null;
	var c=0;
	items.forEach( item => {
		item.setAttribute( 'draggable', true );
		item.ondragstart = function( ev ) {
		ev.dataTransfer.effectAllowed = 'move';
		ev.dataTransfer.setData( 'text/html', this.innerHTML )
		currentlyDragging = ev.target;
		$(days1[c]).toggle('slow')
		c++;
		}
	});
	
	days.forEach( day => {
		day.ondragenter = day.ondragover = function( ev ) {
			ev.preventDefault();
			day.classList.add( 'hovering' );
		};
		
		day.ondragleave = function() {
			day.classList.remove( 'hovering' );
		};
		
		day.ondrop = function( ev ) {
			currentlyDragging.parentNode.removeChild( currentlyDragging );
			day.appendChild( currentlyDragging );
			day.classList.remove( 'hovering' );
			currentlyDragging = null;			
		};
	});
	//Aqui termina el metodo que nos permite el movimeinto de los datos de la infografia
	
	lati=document.getElementById("Latitud").value;
	long=document.getElementById("Longitud").value;

	//Comenzamos con los eventos click para poder editar el fondo de la partes de la infografía.
	var ej=null;
	$('#plantilla1').on('click', '#color-aside-d', function(){
		$('#ok_fondo').css({'opacity':'0.9', 'filter':'alpha(opacity=20)'} );
		ej='#color-aside-d';
	});

	$('#plantilla1').on('click', '#color-aside-i', function(){
		$('#ok_fondo').css({'opacity':'0.9', 'filter':'alpha(opacity=20)'} );
		ej='#color-aside-i';	
	});

	$('#plantilla1').on('click', '#color-aside-2-d', function(){	
		$('#ok_fondo').css({'opacity':'0.9', 'filter':'alpha(opacity=20)'} );
		ej='#color-aside-2-d';	
	});

	$('#plantilla1').on('click', '#color-aside-2-i', function(){	
		$('#ok_fondo').css({'opacity':'0.9', 'filter':'alpha(opacity=20)'} );
		ej='#color-aside-2-i';	
	});

	$('#plantilla1').on('click', '#color-aside-3-d', function(){		
		$('#ok_fondo').css({'opacity':'0.9', 'filter':'alpha(opacity=20)'} );
		ej='#color-aside-3-d';	
	});

	$('#plantilla1').on('click', '#color-aside-3-i', function(){		
		$('#ok_fondo').css({'opacity':'0.9', 'filter':'alpha(opacity=20)'} );
		ej='#color-aside-3-i';	
	});

	$('#ok_fondo').click(function(){
		var color=$('#color-fondo').val();
		if(ej == '#color-aside-d'){
			$('#color-aside-d').css({'background': color});
		}else{
			if(ej == '#color-aside-i'){
				$('#color-aside-i').css({'background': color});
			}else{
				if(ej == '#color-aside-2-d'){
					$('#color-aside-2-d').css({'background': color});
				}else{
					if(ej == '#color-aside-2-i'){
						$('#color-aside-2-i').css({'background': color});
					}else{
						if(ej == '#color-aside-3-d'){
							$('#color-aside-3-d').css({'background': color});
						}else{
							if(ej == '#color-aside-3-i'){
								$('#color-aside-3-i').css({'background': color});
							}
						}
					}
				}
			}
		}
	});
	//Fin de los métodos para editar los estilos

	//Iniciamosmetodos para poder cambiar el estilo de letras
	var string=null;
	var var1 = null;
	var var2 = null;

	//Para obtene rel tipo de letra
	$('.letras').on('click', '#tipoLetra', function(){		
        //var select = $("#formaDePago option:selected").text();
		var2 = $("#tipoLetra option:selected").text();
        var1 = $("#tipoLetra").val();
    });

	$('#plantilla1').on('click', '#titulo1', function(){
		$('#ok_letra').css({'opacity':'0.9', 'filter':'alpha(opacity=20)'} );
		$('#tipoLetra').css({'opacity':'0.9', 'filter':'alpha(opacity=20)'} );
		string='#titulo1';
	});

	$('#plantilla1').on('click', '#titulo2', function(){
		$('#ok_letra').css({'opacity':'0.9', 'filter':'alpha(opacity=20)'} );
		$('#tipoLetra').css({'opacity':'0.9', 'filter':'alpha(opacity=20)'} );
		string='#titulo2';
	});

	$('#plantilla1').on('click', '#parrafo1', function(){
		$('#ok_letra').css({'opacity':'0.9', 'filter':'alpha(opacity=20)'} );
		$('#tipoLetra').css({'opacity':'0.9', 'filter':'alpha(opacity=20)'} );
		string='#parrafo1';
	});

	$('#plantilla1').on('click', '#titulo3', function(){
		$('#ok_letra').css({'opacity':'0.9', 'filter':'alpha(opacity=20)'} );
		$('#tipoLetra').css({'opacity':'0.9', 'filter':'alpha(opacity=20)'} );
		string='#titulo3';
	});

	$('#plantilla1').on('click', '#titulo4', function(){	
		$('#ok_letra').css({'opacity':'0.9', 'filter':'alpha(opacity=20)'} );
		$('#tipoLetra').css({'opacity':'0.9', 'filter':'alpha(opacity=20)'} );
		string='#titulo4';
	});

	$('#plantilla1').on('click', '#titulo5', function(){	
		$('#ok_letra').css({'opacity':'0.9', 'filter':'alpha(opacity=20)'} );
		$('#tipoLetra').css({'opacity':'0.9', 'filter':'alpha(opacity=20)'} );
		string='#titulo5';
	});

	$('#plantilla1').on('click', '#parrafo2', function(){	
		$('#ok_letra').css({'opacity':'0.9', 'filter':'alpha(opacity=20)'} );
		$('#tipoLetra').css({'opacity':'0.9', 'filter':'alpha(opacity=20)'} );
		string='#parrafo2';
	});

	$('#plantilla1').on('click', '#titulo6', function(){	
		$('#ok_letra').css({'opacity':'0.9', 'filter':'alpha(opacity=20)'} );
		$('#tipoLetra').css({'opacity':'0.9', 'filter':'alpha(opacity=20)'} );
		string='#titulo6';
	});


	$('#ok_letra').click(function(){
		var color=$('#color-letra').val();
		if(string == '#titulo1'){
			$('#titulo1').css({'color': color});
			$('#titulo1').css({'font-family': var2});
		}else{
			if(string == '#titulo2'){
				$('#titulo2').css({'color': color});
				$('#titulo2').css({'font-family': var2});
			}else{
				if(string == '#parrafo1'){
					$('#parrafo1').css({'color': color});
					$('#parrafo1').css({'font-family': var2});
				}else{
					if(string == '#titulo3'){
						$('#titulo3').css({'color': color});
						$('#titulo3').css({'font-family': var2});
					}else{
						if(string == '#titulo4'){
							$('#titulo4').css({'color': color});
							$('#titulo4').css({'font-family': var2});
						}else{
							if(string == '#titulo5'){
								$('#titulo5').css({'color': color});
								$('#titulo5').css({'font-family': var2});
							}else{
								if(string == '#parrafo2'){
									$('#parrafo2').css({'color': color});
									$('#parrafo2').css({'font-family': var2});
								}else{
									if(string == '#titulo6'){
										$('#titulo6').css({'color': color});
										$('#titulo6').css({'font-family': var2});
									}
								}
							}
						}
					}
				}
			}
		}
	});
	//Fin de los métodos para editar los estilos
	
	//metodo para poder cargar el mapa con los datos
	function IniciarMapa(){
	var myLatlng = new google.maps.LatLng(lati, long);
	var mapOptions = {
		zoom: 15,
		center: myLatlng
	}
	var iconBase = 'https://maps.google.com/mapfiles/kml/shapes/';
	var map = new google.maps.Map(document.getElementById("map"), mapOptions);
		var direc= new google.maps.LatLng(lati, long);
		var marker = new google.maps.Marker({
			position: direc,
			title:"Hello World!"
		});
		marker.setMap(map);
		google.maps.event.addListener(marker, 'click', function(){
		var popup = new google.maps.InfoWindow();
		var note = '!! AQUÍ FUE EL EPICENTRO DEL SISMO REGISTRADO !!';
		popup.setContent(note);
		popup.open(map, this);
		})
	}
	google.maps.event.addDomListener(window, 'load', IniciarMapa);

});
</script>  
@endsection

@section('scripts')
<script src="../../js/manageinfografia.js"></script>
<script src="../../js/html2canvas.js"></script>
@endsection

