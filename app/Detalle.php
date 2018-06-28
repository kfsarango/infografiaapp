<?php

namespace InstaInfo;

use Illuminate\Database\Eloquent\Model;

class Detalles extends Model
{
    protected $table = 'detalles';
	protected $fillable = [
	    'iddetalle', 'tipo', 'contenido', 'presentaciones_idpresentacione'
	 ];
}
