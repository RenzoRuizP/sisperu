<?php

namespace App;

use App\Trabajador;
use App\Distrito;
use Illuminate\Database\Eloquent\Model;

class Sucursal extends Model
{
    protected $table = "sucursales";

    public function distrito(){
    	return $this->belongsTo(Distrito::class); // 1 sucursal esta en un distrito
    }

    public function Trabajador(){
    	return $this->hasMany(Trabajador::class);
    }

}
