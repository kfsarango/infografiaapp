<?php

namespace InstaInfo;

use Illuminate\Database\Eloquent\Model;

class Infografia extends Model
{
    protected $table = 'infografias';
	protected $fillable = [
	    'idinfografia', 'nombre', 'concepto', 'plantilla', 'fecha_creacion', 'ultima_modificacion', 'usuarios_idusuario'
	 ];

	protected $primaryKey = 'idinfografia';
	
	public $timestamps = false;
}
