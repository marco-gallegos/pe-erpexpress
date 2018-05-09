<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FacturaCompra extends Model
{
	protected $table = "FacturaCompra";
    public $timestamps = false;
    protected $primaryKey = "Folio";
}
