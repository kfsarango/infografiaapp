$(document).ready(function(){
    var lastCard = '';
    var selector = '';
    //Abrir información de la categoria
    $('.btn-show').click(function(){
        var idcategory = $(this).attr('id');
        selector = '#body' + idcategory;
        if (lastCard != selector) {
            console.log('diferentes');
            $(selector).toggle('slow', function(){
                $(lastCard).slideUp('slow');
                lastCard = selector;
            });
            //Usando Ajax
            $.get("getnrosuscriptores/"+idcategory+"",function(response){
                    $(selector+' .nro-sucritos').text(response.suscritores);
                    $(selector+' .nro-infografias').text(response.infografias);
			});
        }else{
            console.log('parece que son iguales | '+ selector);
            $(selector).toggle('slow');
        }
    });

    //Cerrar información de la categoria
    $('.btn-close').click(function(){
        $('#'+$(this).parent().attr("id")).toggle('slow');
    });


    $('.form-suscribe').on('submit', function (e) {
        e.preventDefault();
        var correo = $(selector +' .mailToSuscribe').val();
        var category = $(selector + ' .idCategoria').val();
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            url: '/suscribirme',
            type: 'POST',
            data: {
                _token: CSRF_TOKEN,
                idcategoria: category,
                mail: correo
            },
            dataType: 'JSON',
            success: function (data) {
                console.log(data);
                $(selector + ' .cnt-resultado').empty(); 
                if (data == 'ok') {
                    $(selector + ' .cnt-resultado').append("<p class='resultado-ok'>"+
                                                        "Felicitaciones estas suscrito"+
                                                        "</p>");
                    var nroSuscriptoresActual = parseInt($(selector+' .nro-sucritos').text());
                    $(selector+' .nro-sucritos').text(nroSuscriptoresActual + 1);
                } else {
                    $(selector + ' .cnt-resultado').append("<p class='resultado-bad'>"+
                                                        "Ya estas suscrito a esta categoria"+
                                                        "</p>");
                }
                $(selector + ' form').css('display','none');
            }
        });
    });
        
    // Ir a clasificados pantalla principal flecha //
	$(".box_flecha i").click(function(){
        $('html,body').animate({
            scrollTop: $(".container").offset().top
        }, 1000);
    });

    // Mantener en movimiento flecha ir abajo //
	function AnimarFlecha(){
		$( ".box_flecha i" ).animate({ "top": "+=50px" }, "slow" ,
			function(){
				$(".box_flecha i").fadeOut(10,
					function(){
						$(".box_flecha i" ).animate({ "top": "-=50px" }, "fast",
							function(){
								$(".box_flecha i").fadeIn(10);
							}
						);
					}
				);	
			}
		);
	}

	// Flecha ir abajo se mueve cada 2 segundo //
	setInterval(AnimarFlecha,2000);


      
});