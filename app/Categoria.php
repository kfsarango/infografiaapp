<?php

namespace InstaInfo;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'categoria';
	protected $fillable = [
	    'idcategoria', 'nombre'
	 ];
}
