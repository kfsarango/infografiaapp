$(document).ready(function(){
	//comporobando si estamos en el home
    if ( $("#home_page").length == 0 ) {
		$('nav').addClass('encabezado-nothome');
    }

    //Agregando funcione al encabezado
    $(window).scroll(function(){
		// Texto central de la pag principal aparece/desaparece
		/*if (window.pageYOffset >= 200) {
			$('.central h1').fadeOut(1000);
    	}else{
			$('.central h1').fadeIn(1000);
    	}*/
		// Color de fondo de encabezado se ajusta según el scroll
		if (window.pageYOffset >= 630) {
			$('nav').addClass('encabezado-aux');
    	}else{
			$('nav').removeClass('encabezado-aux');
    	}
		
	});

});