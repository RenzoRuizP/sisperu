<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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

	public function cliente(){
		return $this->belongsTo(Cliente::class);
	}

	static function existeDocumento(){
		$tipoDocumento = $_GET['tdocumento'];
		$numeroDocumento = $_GET['ndocumento'];
		$personas = Persona::where('tipo_documento', $tipoDocumento)->where('numero_documento', $numeroDocumento)->get();

		if(count($personas) > 0 ){
			return response()->json($personas[0]);

		} else{
				return response()->json(false);
		}
	}
}
