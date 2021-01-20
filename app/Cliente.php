<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Persona;

class Cliente extends Model
{
   public function persona(){
   		return $this->hasOne(Persona::class);
   }
}
