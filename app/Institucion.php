<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Distrito;
use App\Empresa;
class Institucion extends Model
{
	protected $table = "instituciones";

    static function getTipoInstitucion(){

    	$salida = [
    		1 => 'CLÍNICA',
    		2 => 'HOSPITAL',
    		3 => 'CONSULTORIO PARTICULAR'
    	];
    		return $salida;
    }

    public function empresa(){
    	return $this->belongsTo(Empresa::class);
    }

    public function distrito(){
    	return $this->belongsTo(Distrito::class);
    }
}
