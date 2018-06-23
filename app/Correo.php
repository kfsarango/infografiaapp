<?php

namespace InstaInfo;

use Illuminate\Database\Eloquent\Model;

class Correo extends Model
{
    protected $table = 'correos';
	protected $fillable = [
	    'idcorreos', 'asunto', 'para', 'descripcion', 'fecha', 'idusuario', 'idinfografia'
	 ];
}
