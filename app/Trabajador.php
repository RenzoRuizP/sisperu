<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Sucursal;
use App\Cargo;
use App\User;
use App\Persona;
class Trabajador extends Model
{
    protected $table="trabajadores";

    public function usuario(){
    	return $this->hasOne(User::class); // relación de 1 a 1
    }

    public function persona(){
    	return $this->belongsTo(Persona::class); // relación de 1 a 1
    }

    public function cargo(){
    	return $this->hasOne(Cargo::class);// 1 trabajador tiene 1 cargo
    }

    public function sucursal(){
    	return $this->hasOne(Sucursal::class); // 1 trabajador pertenece a 1 sucursal
    }


}
