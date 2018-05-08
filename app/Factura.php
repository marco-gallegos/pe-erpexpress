<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    //
    protected $table = "Factura";
    public $timestamps = false;
    protected $primaryKey = "Folio";
}
