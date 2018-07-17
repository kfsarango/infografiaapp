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
        
        
      
});