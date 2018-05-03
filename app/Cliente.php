<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
	protected $table = "cliente";
	protected $primaryKey="Rfc";
	protected $keyType="varchar";
	public $timestamps = false;
}
