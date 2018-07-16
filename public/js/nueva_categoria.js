$(document).ready(function(){
	var nroCampos = 0;
	
    $('.radio input[type=radio]').click(function(){
		$('#idcat').val($(this).val());
	});
	
	//boton continuar inabilitado
    $('#btnContinuar').prop('disabled', true);

	//Mostrando/Ocultando el form de categoria
    $('#newcategory').click(function(){
    	$('#formcategory').toggle('slow')
	});
	
	$('#cancelnewcategory').click(function(){
    	$('#formcategory').toggle('slow')
	});

	//Mostrando/Ocultando el form de campos
    $('#newcampo').click(function(){
		$('.mostrar_items').toggle('slow'),
		$('.save').toggle('slow')
	});
	$('#cancelnewcampo').click(function(){
		$('.mostrar_items').toggle('slow'),
		$('.save').toggle('slow')
    });
    

    // --- Agregado items al formulario --- //
	var newcampo;
	$('#nuevo_item').click(function(){
		$('.save').toggle('slow'),
		newcampo = '<div class="form-group">'+
					'<label class="col-sm-6" for="">'+$('#nombre').val()+':</label>'+
					'<input class="col-sm-6 form-control"type="text" name="'+$('#nombre').val()+'"required>'+
					'<i class="fas fa-trash-alt" id="item_añadido"></i>'+
				'</div>';
		$('#items_nuevos').append(newcampo)
		nroCampos++;
		$('#nombre').val('');
		if (nroCampos > 0) {
			//boton continuar inabilitado
			$('#btnContinuar').prop('disabled', false);
		}
		$('.mostrar_items').toggle('slow')
	});


	$('#items_nuevos').on('click', '#item_añadido', function() {
		$(this).closest('.form-group').remove();
		nroCampos--;
		if (nroCampos == 0) {
			//boton continuar inabilitado
			$('#btnContinuar').prop('disabled', true);
		}
	});

	// ---- Implementación de AJAX para cargar los items de cada categoria
	$("input[name=optradio]").click(function () {
		var id = $('input:radio[name=optradio]:checked').val();
		$.get("getitems/"+id+"",function(response){
				newcampo = '';
				nroCampos = 0;
				$('#items_nuevos').empty();
				console.log('iendo');
				if(response.length > 0){
					$('#btnContinuar').prop('disabled', false);
				}else{
					$('#btnContinuar').prop('disabled', true);
				}
				for (var i = 0; i < response.length; i++) {
					console.log(response[i].campo);
					newcampo += '<div class="form-group">'+
								'<label class="col-sm-6" for="">'+response[i].campo+':</label>'+
								'<input class="col-sm-6 form-control"type="text" name="'+response[i].campo+'" required>'+
								'<i class="fas fa-trash-alt" id="item_añadido"></i>'+
							'</div>';
					nroCampos++;
				}
				$('#items_nuevos').append(newcampo);
				
			});
	});

});




