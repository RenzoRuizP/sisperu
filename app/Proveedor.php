<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Producto;
class Proveedor extends Model
{
    protected $table="Proveedores";

    public function producto(){
    	return $this->hasMany(Producto::class);
    }
}
