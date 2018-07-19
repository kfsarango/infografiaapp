$(document).ready(function(){
    $('#saveImgPreview').mouseenter(function(){

        html2canvas($("#plantilla1"), {
            dpi: 192,
            onrendered: function(canvas) {
                // canvas is the final rendered <canvas> element
                var myImage = canvas.toDataURL("image/png");

                try {
                        localStorage.setItem("img", JSON.stringify(myImage));
                        console.log('guaradando en local storage');
                    }
                    catch (e) {
                        console.log("Fallo al guardar en local storage: " + e);
                }
                
            }
        });
    });

    
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