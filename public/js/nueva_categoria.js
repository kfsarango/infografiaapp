$(document).ready(function(){ 
	//boton continuar inabilitado
    $('#btnContinuar').prop('disabled', true);

    $('#ocultar_boton').click(function(){
        
    $('.new').toggle('slow')
    })

    $('#ocultar').click(function(){


        
    $('.mostrar_items').toggle('slow'),
    $('.save').toggle('slow')


    })

    

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

		$('.mostrar_items').toggle('slow')
	});


	$('#items_nuevos').on('click', '#item_añadido', function() {
		$(this).closest('.form-group').remove();
	});

});




