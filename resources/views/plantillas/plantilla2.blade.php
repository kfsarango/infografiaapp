@extends('layouts.app') @section('content')

<script>
    $(document).ready(function() {
        $("btn_editar").click(function() {
            $(this).fadeOut();
        });
    });
</script>
<div class="box_aux"></div>

<div class="container" id="cnt_plantilla2">

    <div class="row">
      	<div class="col-md-2">
            @include('layouts.controlInfografia')
        </div>
        <div class="col-md-12" id="plantilla2">
			<span id="{{$id}}" class="myInfo" hidden></span>

            <div class="text-right">
                <button type="button" class="btn btn-success " id="btn_editar">Editar</button>
                <button type="button" class="btn btn-success">Guardar</button>
				<button type="button" class="btn btn-success" id="subir_archivos">Importar Imagenes </button>
			</div>
		</div>
	</div>
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

@endsection

<script>
    /*
    		$(document).ready(function()
    {
            $("btn_editar").click(function () {    
    	    alert("Bien!!!, la edad seleccionada es: "	);
    	    //alert("Bien!!!, la edad seleccionada es: " + $(this).val());  
             });
    });*/
</script>
@endsection

@section('scripts')
<script src="../../js/manageinfografia.js"></script>
<script src="../../js/html2canvas.js"></script>
@endsection

