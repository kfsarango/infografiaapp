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
});