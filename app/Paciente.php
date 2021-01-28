<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Persona;
use App\Anamnesis;
class Paciente extends Model
{
    public function persona(){
    	return $this->belongsTo(Persona::class); //FK
    }

    public function anamnesis(){
    	return $this->hasMany(Anamnesis::class);
    }

    static function autocomplete(){ 
    	$salida = [];
    	$personas = Persona::has('paciente')->where(
    												'numero_documento', 'LIKE', '%'.$_GET['term'].'%'
    												)->orWhere(
    															'nombres', 'LIKE', '%'.$_GET['term'].'%'
    														   )->orWhere(
    														   				'apellidos', 'LIKE', '%'.$_GET['term'].'%'
    														   			  )->get();
    	foreach ($personas as $persona) {
    			
    			array_push($salida, array(
    				'id'=>$persona->paciente->id, 
    				'label'=>$persona->numero_documento.' - '.$persona->nombres.' '.$persona->apellidos,
    				'value'=> $persona->numero_documento.' - '.$persona->nombres.' '.$persona->apellidos // lo que queda seleccionado en el input.
    			));
    	}
    	return $salida;
    }

    static function getTipoPaciente(){
        $salida = [
            1 => 'ACTIVO LABORAL',
            2 => 'JUBILADO COMPLACIENTE',
            3 => 'NIÑO',
            4 => 'CC',
            5 => 'IP'

        ];

            return $salida;
    }
}
