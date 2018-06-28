<?php

namespace InstaInfo;

use Illuminate\Database\Eloquent\Model;

class Items extends Model
{
    protected $table = 'items';
	protected $fillable = [
	    'idItem', 'campo', 'valor', 'registro_idregistro', 'categoria_idcategoria', 'infografias_idinfografia'
	 ];
}
