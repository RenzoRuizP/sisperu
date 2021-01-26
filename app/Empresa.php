<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Distribuidor;
use App\Cliente;
use App\Trabajador;
use App\Distrito;
use App\Institucion;
class Empresa extends Model
{
	public function distrito(){
		return $this->belongsTo(Distrito::class);
	}

	public function trabajador(){
		return $this->hasMany(Trabajador::class);
	}

	public function cliente(){
		return $this->hasOne(Cliente::class);
	}

	public function institucion(){
		return $this->hasMany(Institucion::class);
	}

	public function distribuidor(){
		return $this->hasMany(Distribuidor::class);
	}

	static function existeRuc(){
		$numeroDocumento = $_GET['ndocumento'];
		$empresas = Empresa::where('ruc', $numeroDocumento)->get();

		if(count($empresas) > 0 ){
			$empresas[0]->distrito->provincia->departamento;
			return $empresas[0];

		} else{
				return false;
		}
	}
}
