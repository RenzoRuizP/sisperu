<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Trabajador;
class Cargo extends Model
{
    public function trabajador(){
    	return $this->hasMany(Trabajador::class);
    }
}
