<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Trabajador;

class Persona extends Model
{
	
    public function trabajador(){
    	return $this->hasOne(Trabajador::class);
	}

	public function nombre_completo(){
		return $this->nombres.' '.$this->apellidos;
	}

}
