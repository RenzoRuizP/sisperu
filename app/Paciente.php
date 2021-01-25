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
}
