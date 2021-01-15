<?php

namespace App;
use App\Provincia;
use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    public function provincias(){
    	return $this->hasMany(Provincia::class); // 1(departamento) a muchos (provincias)
    }

    public static function getProvincias(){
    	$departamento = Departamento::find($_GET['id']);
    	return $departamento->provincias;
    }
}
