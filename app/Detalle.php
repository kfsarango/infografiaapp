<?php

namespace InstaInfo;

use Illuminate\Database\Eloquent\Model;

class Detalles extends Model
{
    protected $table = 'detalles';
	protected $fillable = [
	    'iddetalle', 'contenido', 'presentaciones_idpresentacione'
	 ];
}
