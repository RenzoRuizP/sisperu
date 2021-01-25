<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Persona;
class Paciente extends Model
{
    public function persona(){
    	return $this->belongsTo(Persona::class);
    }
}
