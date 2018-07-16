<section>
    
    @foreach ($items as $item)
        <div class="form-group">
            <label for="">{{$item->campo}}</label>
            <input type="text" class="form-control" id="{{$item->campo}}" value="{{$item->valor}}">
        </div>
    @endforeach
    
    <div>
    
    <span class="glyphicon">&#xe051;</span>
    

    </div>
</section>
