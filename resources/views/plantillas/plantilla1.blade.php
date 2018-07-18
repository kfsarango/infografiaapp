@extends('layouts.app')

@section('content') 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<div class="box_aux"></div>

<div class="container" id="cont_plan1">
	<!-- Sección de los botones de el contendio para editar la infografía -->
	<div class="row seccion_botones">
		<legend class="text-center header"><i class="fa"> Edita tu Plantilla 1 elegida</i></legend>				
		<div class="col-md-3">
			<button type="submit" class="btn btn-success">Exportar</button>				
		</div>
		<div class="col-md-3">
			<button type="submit" class="btn btn-success">Enviar Correo</button>				
		</div>
		<div class="col-md-3">
			<button type="submit" class="btn btn-success">Publicar Noticia</button>				
		</div>
		<div class="col-md-3">
			<button type="submit" class="btn btn-success">Vista Previa</button>				
		</div>
	</div>
	<div class="row">
		<!-- Datos de la infografia consumidos de la Base de Datos -->
		<div class="col-md-3 data_infografia1">
			@include('layouts.controlInfografia')
		</div>

		
		<!-- Contenido de la parte donde editaremos la plantilla de la infografía -->
		<div class="col-md-9 plantilla1" id="plantilla1">
			<form method="post" class="form-inline" action="{{url('/useradmin/templateEditado')}}/{{$id}}">
        	@csrf
			<button type="submit" class="btn btn-success">SAVE</button>
			<input type="text" name="idinfografia" value="{{$id}}" hidden>
			<!-- Sección de la plantilla de la infografía que editaremos -->
			<div class="row seccion_plantilla">
				<div class="col-md-12">
						<!-- Fila 1 -->
						<div class="row" id="color-aside">
							<div class="col-md-4">
								<h2 id="ttttttt" name="titulo1" contenteditable="true">
									Porbando
								</h2>
								<input type="color" name="color" id="color" >
								<img src="../../img/us.png" name="foto1">
							</div>
							<div class="col-md-8" id="color-article">
								<h3 contenteditable="true" name="titulo2">Lorem ipsum</h3>
								<p contenteditable="true" name="parrafo1">Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit eius, laudantium est, architecto voluptate fugiat a recusandae consequatur id doloribus 
								culpa voluptatibus libero dolor, minus enim distinctio iusto aliquam commodi!</p>
							</div>
						</div>
						<!-- Fila 2 -->
						<div class="row" id="color-aside2">
							<div class="col-md-6">
								<h3 contenteditable="true" name="titulo3">Title</h3>
								<div class="day">
								</div>
								<div class="day">
								</div>

							</div>
							<div class="col-md-6 " id="color-item2">
								<h2 contenteditable="true" nme="titulo4">TITTLE</h2>
								<div id="map">My map will go here</div>  
							</div>

						</div>
						<!-- Fila 3 -->
						<div class="row" id="color-aside3">
							<div class="col-md-8" id="color-article">
								<h3 contenteditable="true" nem="titulo5">Lorem ipsum</h3>

								<p contenteditable="true" name="parrafo2">	
									Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
									Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
									irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
								</p>
							</div>
							<div class="col-md-4">
								<h2 contenteditable="true" name="titulo6">
									ITEM 3
								</h2>
								<img src="../../img/grafico.png" name="foto2">
							</div>
						</div>						
				</div>
			</div>
			</form>
		</div>
	</div>

</div>

<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAcYVGjUno8qc20yhUk92PxpmhnLF3gEm8">
</script>

<script src="https://maps.goog leapis.com/maps/api/js?v=3.exp"></script>
<script src="js/nueva_categoria.js"></script>


<script>
	$(document).ready(function(){
	var lati=null;
	var long=null;

	const item = document.getElementsByClassName( 'item' )[0];
	const days = [].slice.call(
	document.querySelectorAll( '.day' ), 0 );

	let currentlyDragging = null;

	item.setAttribute( 'draggable', true );
	item.ondragstart = function( ev ) {
	ev.dataTransfer.effectAllowed = 'move';
	ev.dataTransfer.setData( 'text/html', this.innerHTML )
	currentlyDragging = ev.target;
	}
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
	
	lati=document.getElementById("Latitud").value;
	long=document.getElementById("Longitud").value;

	$('#ttttttt').click(function(){
		var color=document.getElementById("color").value;
		
		$(this).css("background-color", color);
		$(this).css("font-family", "sans-serif");
		document.getElementById("image").src = "entrada.jpg";
	});
	
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

