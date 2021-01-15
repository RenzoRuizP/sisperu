<?php

namespace App;
use App\Provincia;
use Illuminate\Database\Eloquent\Model;

class Distrito extends Model
{
    public function provincia(){
    	return $this->belongsTo(Provincia::class);// un distrito pertenece a 1 provincia.
    }
}
