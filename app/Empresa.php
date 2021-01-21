<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
}
