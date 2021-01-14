<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;
use App\Persona;
class Trabajador extends Model
{
    protected $table="trabajadores";

    public function usuario(){
    	return $this->hasOne(User::class); // relación de 1 a 1
    }

    public function persona(){
    	return $this->belongsTo(Persona::class); // relación de 1 a muchos
    }


}
