<?php

namespace InstaInfo;

use Illuminate\Database\Eloquent\Model;

class TipoUsuario extends Model
{
    protected $table = 'tipousuarios';
	protected $fillable = [
	    'idtipouser', 'tipo'
	 ];
}
