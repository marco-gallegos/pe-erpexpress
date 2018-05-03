<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
	protected $table = "Proveedor";
	protected $primaryKey="RFC";
	protected $keyType="varchar";
	public $timestamps = false;
}
