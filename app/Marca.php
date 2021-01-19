<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Producto;
class Marca extends Model
{
    
    public function producto(){
    	return $this->hasMany(Producto::class);
    }
}
