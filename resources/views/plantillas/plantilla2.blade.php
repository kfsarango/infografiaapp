@extends('layouts.app')

@section('content') 

<section class="all_page_infografia">

	<div class="container" id="cnt_plantilla2">

		@include('flash::message')
		<!-- Sección de los botones de el contendio para editar la infografía -->
		@include('layouts.seccionBotonesInfografia')

		<div class="row">
			<!-- Datos de la infografia consumidos de la Base de Datos -->
			<div class="col-md-3 data_infografia2" id="data_infografia2">
				@include('layouts.controlInfografia')
			</div>

			<div class="col-md-9" id="plantilla2">
				<span id="{{$id}}" class="myInfo"></span>
				<div class="row">
					<img src="https://goo.gl/iG6RLJ" alt="img_biologia" id = "img_principal">
						<div class="centro">
							<element  id="titulo_plant2" contenteditable="true">BIOLOGIA</element>
						</div>
				</div>

				<div class="row">
						<div class="col-md-3 " id="plan_centro1">
							<img src="../../img/dna.png" alt="img1" id = "img1"></br>
							<element  id="arrastrar" contenteditable="true">LIFESTYLE + 1</element>
						</div>
						
						<div class="col-md-3 " id="plan_centro2">
							<img src="../../img/molecule.png" alt="img1" id = "img2"></br>
							<element  id="arrastrar" contenteditable="true">LIFESTYLE + 1</element>
						</div>
						<div class="col-md-3 " id="plan_centro3">
							<img src="../../img/microscope.png" alt="img1" id = "img3"></br>
							<element  id="arrastrar" contenteditable="true">LIFESTYLE + 1</element>
						</div>
						<div class="col-md-3 " id="plan_centro4">
							<img src="../../img/river.png" alt="img1" id = "img4"></br>
							<element  id="arrastrar" contenteditable="true">LIFESTYLE + 1</element>
						</div>
						<div class="col-md-12" id="plan_centro5">
							<element  id="arrastrar5" style="left:0;top:0;" contenteditable="true">LIFESTYLE + TRAVEL BLOGGER </element>
						</div>
				</div>
							
				<div class="row">
						<div class="col-md-4" id= "final1">
						<element  id="arrastrar7" contenteditable="true">Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae totam molestiae sint ut? Architecto explicabo iure praesentium magni fugit? Vero quas nostrum exercitationem cupiditate enim alias labore magnam cum perferendis.</element>
						
						</div>
						<div class="col-md-4" id= "final2">
							<element  id="arrastrar6" contenteditable="true"></element>
						</div>
						<div class="col-md-4" id= "final3">
							<element  id="arrastrar8" contenteditable="true">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea tenetur magni quas! Ad corporis iure veniam modi neque voluptatem culpa eveniet iusto, earum assumenda nostrum praesentium a quia quibusdam ut.</element>
						</div>
						
				</div>
				<div class="row">
						<div class="col-md-4" id= "final3">
							<element  id="arrastrar9" contenteditable="true">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo facilis possimus maiores ad rem harum voluptate, cupiditate laboriosam totam. Blanditiis vel sint amet beatae cupiditate deleniti voluptatem ad voluptatibus ratione.</element>
						</div>
						<div class="col-md-4" id= "final4">
							<element  id="arrastrar10" contenteditable="true"></element>
						</div>
						<div class="col-md-4" id= "final5">
							<element  id="arrastrar11" contenteditable="true">Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit sapiente ipsum maxime dignissimos quidem! Soluta eius ea explicabo dolor amet, labore ut provident ratione, possimus dignissimos assumenda aperiam accusamus voluptatum.</element>
						</div>
						
				</div>

			</div>
		</div>
	</div>
</section>

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
	$('#plantilla2').on('click', '#titulo_plant2', function(){
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

});
</script>

@endsection

@section('scripts')
<script src="../../js/manageinfografia.js"></script>
<script src="../../js/html2canvas.js"></script>
@endsection

