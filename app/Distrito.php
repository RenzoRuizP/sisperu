<?php

namespace App;

use App\Cliente;
use App\Institucion;
use App\Provincia;
use App\Sucursal;
use App\Empresa;
use App\Persona;
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

    public function persona(){
        return $this->hasMany(Persona::class);
    }

    public function institucion(){
    	return $this->hasMany(Institucion::class);
    }

    public function cliente(){
        return $this->hasMany(Cliente::class);// una distrito tiene muchas sucursales
    }
}
