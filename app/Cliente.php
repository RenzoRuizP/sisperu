<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Persona;
use App\Distrito;
use App\Empresa;
class Cliente extends Model
{
   public function persona(){
   		return $this->belongsTo(Persona::class);
   }

   public function distrito(){
   		return $this->belongsTo(Distrito::class); 
   }

   public function empresa(){
   		return $this->belongsTo(Empresa::class); 
   }
}
