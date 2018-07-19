$(document).ready(function(){
    if ($('#username').val() == '') {
        $('.form_content').css('display','none');
    } else {
        $('.form_content').css('display','block');
    }
    
    $('.newadminbtn').click(function(){
        $('#showFormAdmin').toggle('slow',function(){
            $('#btn_new').toggle('slow');
        });
    });

    //Para abrir los Panel tipo Acordion 
    var acc = document.getElementsByClassName("accordion");
	var i;
	
	for (i = 0; i < acc.length; i++) {
		acc[i].addEventListener("click", function() {
			this.classList.toggle("active");
			var panel = this.nextElementSibling;
			if (panel.style.display === "block") {
				panel.style.display = "none";
			} else {
				panel.style.display = "block";
			}
		});
    }
    

    //Ver los suscriptores
    $('.show-suscriptores').click(function(e){
        e.preventDefault();
        var idcategory = $(this).attr('href');
        //Usando Ajax
        $.get("getsuscriptores/"+idcategory+"",function(response){
            $('#cnt-suscriptores').empty();
            var html = '';
            response.forEach(element => {
                html+='<p>'+element.mail+'</p>'
            });
            $('#cnt-suscriptores').append(html);
        });
    });
})
