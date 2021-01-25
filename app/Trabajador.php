<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Empresa;
use App\Sucursal;
use App\Cargo;
use App\User;
use App\Persona;

class Trabajador extends Model
{
    protected $table="trabajadores";

    public function user(){
    	return $this->hasMany(User::class); // relación de 1 a 1
    }

    public function persona(){
    	return $this->belongsTo(Persona::class); // relación de 1 a 1
    }

    public function cargo(){
    	return $this->belongsTo(Cargo::class);// 1 trabajador tiene 1 cargo
    }

    public function sucursal(){
    	return $this->belongsTo(Sucursal::class); // 1 trabajador pertenece a 1 sucursal
    }

    public function empresa(){
        return $this->belongsTo(Empresa::class);
    }


}
