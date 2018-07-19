<section class="container">
    @foreach ($items as $item)
        <div class="row form-group figura1" id="{{$item->idItem}}">
            <label for="" class="itemT" value="">{{$item->campo}} <span>{{$item->valor}}</span>            
            </label>
            <input type="text" class="dato" id="{{$item->campo}}" value="{{$item->valor}}" hidden>
        </div>
    @endforeach
    

    <div class="row">
        <div class="col-md-12 fondos">
            <legend>BACKGROUND</legend>
            <button class="btn btn-sm btn-info" id="ok_fondo">OK</button>            
            <input type="color" name="color" id="color-fondo" >
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 letras">
            <legend>LETTERS</legend>
            <button class="btn btn-sm btn-info" id="ok_letra">OK</button>
            <input type="color" name="color" id="color-letra" >

            <legend class="formatos">FONTS-FAMILY</legend>
            <select name="font-familiy" id="tipoLetra">
                <option value="0">Selected</option>
                <option value="1">Arial, Helvetica, sans-serif</option>
                <option value="2">'Courier New', Courier, monospace</option>
                <option value="3">'Segoe UI', Tahoma, Geneva, Verdana, sans-serif</option>
                <option value="3">'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif</option>
                <option value="3">-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif</option>

                

                
            </select>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 imagenes">
            <legend>IMAGE</legend>
            <button class="btn btn-sm btn-info" id="ok_letra">Browse</button>
        </div>

    </div>
</section>
