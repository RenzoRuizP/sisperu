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

	static function getTipoDocumento(){
		$salida = [
			1 => 'DNI',
			2 => 'PASAPORTE',
			3 => 'CARNET DE EXTRANGERIA(CE)',
			4 => 'OTROS'
		];
		return $salida;
	}
}
