<?php

namespace InstaInfo;

use Illuminate\Database\Eloquent\Model;

class Suscritos extends Model
{
    protected $table = 'suscritos';
	protected $fillable = [
	    'idsuscritos', 'mail', 'tipousuario'
	 ];
}
