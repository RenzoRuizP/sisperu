<?php

namespace App;
use App\Distrito;
use Illuminate\Database\Eloquent\Model;

class Sucursal extends Model
{
    protected $table = "sucursales";

    public function distrito(){
    	return $this->belongsTo(Distrito::class);
    }
}
