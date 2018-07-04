<?php

namespace InstaInfo;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;


class Categoria extends Model
{
	protected $table = 'categoria';
	
	protected $fillable = [
	    'idcategoria', 'nombre'
	 ];
}
