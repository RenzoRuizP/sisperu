<?php

namespace App;
use App\Departamento;
use App\Distrito;
use Illuminate\Database\Eloquent\Model;

class Provincia extends Model
{
    public function departamento(){
    	return $this->belongsTo(Departamento::class);//Inverso de hasOne  de 1 a 1 (1 provincia) pertenece a 1 departamento
    }

    public function distritos(){
    	return $this->hasMany(Distrito::class);// tiene muchos: 1 provincia tiene muchos distritos.
    }

    public static function getDistritos(){
    	$provincia = Provincia::find($_GET['id']);
    	return $provincia->distritos;
    }
}
