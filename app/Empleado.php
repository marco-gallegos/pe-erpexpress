<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
	protected $table = "empleado";
	protected $primaryKey="RFC";// aqui esta algo raro xD 
	protected $keyType="varchar";
	public $timestamps = false;
}
