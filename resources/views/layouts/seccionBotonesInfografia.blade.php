<section id="">
    <div class="row seccion_botones">
        <div class="col-md-3">
            <div class="dropdown">
                <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" id="export">Exportar <i class="fas fa-file-export"></i></button>
                    <span class="caret"></span></button>
                    <ul class="dropdown-menu" id="formatos">
                        <li><a href="#" id="jpg">JPG</a></li>
                        <li><a href="#" id="png">PNG</a></li>
                        <li><a href="#" id="pdf">PDF</a></li>
                    </ul>   
            </div>

        </div>
        <div class="col-md-3">
            <a href="/useradmin/sendtomailinfo/{{$id}}" class="btn btn-success">Enviar <i class="far fa-envelope"></i></a>				
        </div>
        <div class="col-md-3">
            <a href="/useradmin/publicateinfo/{{$id}}" class="btn btn-success" id="saveImgPreview">Publicar <i class="far fa-file-image"></i></a>				
        </div>
        <div class="col-md-3">
            <button type="submit" class="btn btn-success">Vista Previa <i class="fas fa-eye"></i></button>				
        </div>
	</div>    
</section>