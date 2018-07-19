<section class="container">
    <legend>Datos de la Infografía</legend>
    @foreach ($items as $item)
        <div class="row form-group figura1" id="{{$item->idItem}}">
            <label for="" class="itemT" value="">{{$item->campo}} <span>{{$item->valor}}</span>            
            </label>
            <input type="text" class="dato" id="{{$item->campo}}" value="{{$item->valor}}" hidden>
        </div>
    @endforeach
    

    <div class="row">
    
        <span class="glyphicon">&#xe051;</span>
		<button class="btn btn-sm btn-info botonpru">Texto</button>
        <button type="submit" class="btn btn-info">Img</button>
        <button type="color" class="btn btn-info">Img</button>
        <input type="color" name="color" id="color" >
        <input type="color" name="color" id="color" >
    </div>
</section>
