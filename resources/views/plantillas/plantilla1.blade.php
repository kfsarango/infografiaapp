@extends('layouts.app')

@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/fabric.js/1.1.0/fabric.all.min.js" ></script>
 
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<div class="box_aux"></div>

<div class="container" id="cont_plan1">
	<div class="row">
		<div class="col-md-2">
				@include('layouts.controlInfografia')
		</div>
	
		<div class="col-md-10 plantilla1" id="plantilla1">

			<canvas id="general">
				<h1>hola prueba</h1>
			</canvas>

				<legend class="text-center header"><i class="fa fa-list bigicon"> Edita tu Plantilla 1 elegida</i></legend>
					<!-- Fila 1 -->
					<div class="row" id="color-aside">
						<div class="col-md-4">
							<h2>
								ITEM 1
							</h2>
							<img src="../img/us.png">
						</div>
						<div class="col-md-8" id="color-article">
							<h3>Lorem ipsum</h3>
							<article>
								AQUI VA EL TEXTO AGREGADO POR EL USUARIO
							</article>
						</div>
					</div>
					<!-- Fila 2 -->
					<div class="row" id="color-aside2">
						<div class="col-md-6">
							<h3>Datos relacionados al Sismo</h3>
							<label class="label" for="">Tittle</label>
							<div class="figura">

							</div>
						</div>
						<div class="col-md-6 " id="color-item2">
							<h2>
								Lugar del Sismo
							</h2>
							<div id="map">My map will go here</div>  
						</div>

					</div>
					<!-- Fila 3 -->
					<div class="row" id="color-aside3">
						<div class="col-md-8" id="color-article">
							<h3>Lorem ipsum</h3>

							<article>
								
								Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
								Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
								irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
							</article>
						</div>
						<div class="col-md-4">
							<h2>
								ITEM 3
							</h2>
							<img src="../img/grafico.png">
						</div>
					</div>
			
		</div>
	</div>

</div>

<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAcYVGjUno8qc20yhUk92PxpmhnLF3gEm8">
</script>

<script src="https://maps.goog leapis.com/maps/api/js?v=3.exp"></script>

<script>
	// Place script tags at the bottom of the page.
	// That way progressive page rendering and 
	// downloads are not blocked.
 
	// Run only when HTML is loaded and 
	// DOM properly initialized (courtesy jquery)
	$(function () {
		
		// Obtain a canvas drawing surface from fabric.js
		var canvas = new fabric.Canvas('general');
 
		// Create a text object. 
		// Does not display it-the canvas doesn't 
		// know about it yet.
		var hi = new fabric.Text('probando.', {
			left: canvas.getWidth() / 2,
			top: canvas.getHeight() / 2		
		});
	
		// Attach it to the canvas object, then (re)display
		// the canvas.	
		canvas.add(hi);
				
	});
</script>

<script>
	$(document).ready(function(){
	var lati=null;
	var long=null;
	lati=document.getElementById("Latitud").value;
	long=document.getElementById("Longitud").value;
	
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

<script>
	var canvas = new fabric.Canvas('general');
	// Define an array with all fonts
	var fonts = ["Pacifico", "VT323", "Quicksand", "Inconsolata"];
	var dato=document.getElementById("Nro_muertos").value;

	var textbox = new fabric.Textbox('Lorum ipsum dolor sit amet', {

	});
	canvas.add(textbox).setActiveObject(textbox);
	fonts.unshift('Times New Roman');
	// Populate the fontFamily select
	var select = document.getElementById("font-family");
	fonts.forEach(function(font) {
	var option = document.createElement('option');
	option.innerHTML = font;
	option.value = font;
	select.appendChild(option);
	});

	// Apply selected font on change
	document.getElementById('font-family').onchange = function() {
	if (this.value !== 'Times New Roman') {
		loadAndUse(this.value);
	} else {
		canvas.getActiveObject().set("fontFamily", this.value);
		canvas.requestRenderAll();
	}
	};

	function loadAndUse(font) {
	var myfont = new FontFaceObserver(font)
	myfont.load()
		.then(function() {
		// when font is loaded, use it.
		canvas.getActiveObject().set("fontFamily", font);
		canvas.requestRenderAll();
		}).catch(function(e) {
		console.log(e)
		alert('font loading failed ' + font);
		});
	}
</script>
@endsection

