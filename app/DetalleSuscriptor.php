<?php

namespace InstaInfo;

use Illuminate\Database\Eloquent\Model;

class DetalleSuscriptor extends Model
{
    protected $table = 'categoria_has_suscritos';
	protected $fillable = [
	    'idcategoria', 'idsuscritos'
	 ];
}
