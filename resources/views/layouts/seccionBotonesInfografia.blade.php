<section id="">
    <div class="row seccion_botones">
        
        <div class="col-md-4">
            <a href="/useradmin/sendtomailinfo/{{$id}}" class="btn btn-success">Enviar <i class="far fa-envelope"></i></a>				
        </div>
        <div class="col-md-4">
            <a href="/useradmin/publicateinfo/{{$id}}" class="btn btn-success" id="saveImgPreview">Publicar <i class="far fa-file-image"></i></a>				
        </div>
        <div class="col-md-4">
                <div class="dropdown">
                    <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" id="export">Exportar <i class="fas fa-file-export"></i></button>
                        <span class="caret"></span></button>
                        <ul class="dropdown-menu" id="formatos">
                            <li><a href="#" id="jpg" class="opt">JPG</a></li>
                            <li><a href="#" id="png" class="opt">PNG</a></li>
                            <li><a href="#" id="pdf" class="opt">PDF</a></li>
                        </ul>   
                </div>
    
            </div>
	</div>    
</section>