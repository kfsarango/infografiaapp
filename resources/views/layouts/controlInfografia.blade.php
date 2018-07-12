<section>
    
    @foreach ($items as $item)
        <div class="form-group">
            <label for="">{{$item->campo}}</label>
            <input type="text" class="form-control" id="{{$item->campo}}" value="{{$item->valor}}">
        </div>
    @endforeach
    
    <div>
        <button>Text</button>
    </div>
</section>

<section>
    esta d eprueba
</section>