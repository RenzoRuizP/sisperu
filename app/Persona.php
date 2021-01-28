<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Paciente;
use App\Cliente;
use App\Trabajador;
use App\Distrito;

class Persona extends Model
{
	
    public function trabajador(){
    	return $this->hasOne(Trabajador::class);
	}

	public function distrito(){
    	return $this->belongsTo(Distrito::class); // 1 sucursal esta en un distrito
    }

    public function cliente(){
		return $this->hasOne(Cliente::class);
	}

	public function paciente(){
		return $this->hasOne(Paciente::class);
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

	static function getEstadoCivil(){
		$salida = [
			1 => 'Soltero',
			2 => 'Casado',
			3 => 'Viudo',
			4 => 'Divorciado',
			5 => 'Conviviente'
		];

			return $salida;
	}

	static function existeDocumento(){
		$tipoDocumento = $_GET['tdocumento'];
		$numeroDocumento = $_GET['ndocumento'];

		$personas = Persona::where('tipo_documento', $tipoDocumento)->where('numero_documento', $numeroDocumento)->get();
		//dd($personas[0]->distrito->provincia->departamento);
		if(count($personas) > 0 ){
			$personas[0]->distrito->provincia->departamento;
			return $personas[0];

		} else{
				return false;
		}
	}
}
