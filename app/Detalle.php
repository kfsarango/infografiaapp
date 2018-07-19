<?php

namespace InstaInfo;

use Illuminate\Database\Eloquent\Model;

class Detalles extends Model
{
    protected $table = 'detalles';
	protected $fillable = [
	    'iddetalle', 'presentaciones_idpresentacione', 'titulo1', 'foto1', 'titulo2', 'parrafo1', 'titulo3', 'titulo4', 'titulo5', 'parrafo2', 'titulo6', 'foto2'
	 ];
}
