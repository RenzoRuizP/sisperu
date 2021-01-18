<?php

namespace App;
use App\Provincia;
use App\Sucursal;
use App\Empresa;
use Illuminate\Database\Eloquent\Model;

class Distrito extends Model
{
    public function provincia(){
    	return $this->belongsTo(Provincia::class);// 1 distrito pertenece a 1 provincia.
    }

    public function sucursal(){
    	return $this->hasMany(Sucursal::class);// una distrito tiene muchas sucursales
    }

    public function empresa(){
    	return $this->hasMany(Empresa::class);
    }
}
