$(document).ready(function(){

 
    
    $(window).bind("beforeunload",function(event) {
        event.preventDefault();
        var myImage;
        var idinfografia = $('.myInfo').attr('id');
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        console.log(idinfografia);

        html2canvas($("#plantilla1"), {
            dpi: 192,
            onrendered: function(canvas) {
                // canvas is the final rendered <canvas> element
                myImage = canvas.toDataURL("image/png");
                $.ajax({
                    url: '/useradmin/saveimg',
                    type: 'POST',
                    data: {
                        _token: CSRF_TOKEN,
                        img: myImage,
                        infografia: idinfografia
                    },
                    dataType: 'JSON',
                    success: function (data) {
                        console.log(data);
                        
                    }
                });

            }
        });
        
        return "You have some unsaved changes";
    });


    $('#saveImgPreview').mouseenter(function(){

        html2canvas($("#plantilla1"), {
            dpi: 192,
            onrendered: function(canvas) {
                // canvas is the final rendered <canvas> element
                var myImage = canvas.toDataURL("image/png");

                try {
                        localStorage.setItem("img", JSON.stringify(myImage));
                    }
                    catch (e) {
                }
                
            }
        });
    });

  /*Fumción para exportar imagenes y pdf*/  
    $('#formatos a').click(function(){
        var formato = $(this).attr("id");
        if(formato != 'pdf'){
            html2canvas($("#plantilla1"), {
                dpi: 192,
                onrendered: function(canvas) {
                    // canvas is the final rendered <canvas> element
                    var myImage = canvas.toDataURL("image/"+formato);
                    // Para descargar la imagen 
                    var link = document.createElement('a');
                    $('html').append(link);
                    link.download = 'infografia.'+formato;
                    link.href = myImage;
                    link.click();
                }     
            });
        }else{
            html2canvas($("#plantilla1"), {
                onrendered: function(canvas) {         
                    var imgData = canvas.toDataURL(
                        'image/png');              
                    var doc = new jsPDF('p', 'mm');
                    doc.addImage(imgData, 'PNG', 15, 40,180,160);
                    doc.save('infografia.pdf');
                }
            });
        }
   
	});
});
