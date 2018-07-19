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
            <input type="color" name="color" id="color" >
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 letras">
            <legend>LETTERS</legend>
            <button class="btn btn-sm btn-info">OK</button>
            <input type="color" name="color" id="color" >
        </div>
    </div>
</section>
