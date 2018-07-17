<section>
    @foreach ($items as $item)
        <div class="row form-group day">
            <label for="">{{$item->campo}}</label>
            <input type="text" class="item" id="{{$item->campo}}"  value="{{$item->valor}}">
        </div>
    @endforeach
    
    <div>
    
    <span class="glyphicon">&#xe051;</span>
		<button class="btn btn-sm btn-info botonpru">Texto</button>
        <button type="submit" class="btn btn-info">Img</button>
        <button type="color" class="btn btn-info">Img</button>
        <input type="color" name="color" id="color" >
        <input type="color" name="color" id="color" >
    </div>
</section>
