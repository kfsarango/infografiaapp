$(document).ready(function(){ 
  
    

    $('#ocultar_boton').click(function(){
        
    $('.new').toggle('slow')
    })

    $('#ocultar').click(function(){


        
    $('.mostrar_items').toggle('slow'),
    $('.save').toggle('slow')


    })

    // --- Inicio agregar Reglas --- //
	var newcampo;
	$('#nuevo_item').click(function(){
		$('.save').toggle('slow'),
		newcampo = '<div class="form-group">'+
						'<label for="">'+$('#nombre').val()+':</label>'+
						'<input type="text" name="'+$('#nombre').val()+'">'+
						'<span id="item_añadido">'+
							'eliminar'+
						'</span>'+
					'</div>';
		$('#items_nuevos').append(newcampo)

		$('.mostrar_items').toggle('slow')
	});

	$('#items_nuevos').on('click', '#item_añadido', function() {
		$(this).closest('.form-group').remove();
	});


});




