<?php

namespace App;

use App\Empresa;
use Illuminate\Database\Eloquent\Model;

class Distribuidor extends Model
{
    protected $table= 'Distribuidores';

    public function empresa(){
    	return $this->belongsTo(Empresa::class);
    }

    static function getTipoDistribuidor(){
    	$salida = [
    		1 => 'A',
    		2 => 'B',
    		3 => 'C',
    		4 => 'PARTNER'
    	];
    		return $salida;
    }

}
