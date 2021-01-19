<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Categoria;
use App\Marca;
Use App\Proveedor;
class Producto extends Model
{
    public function categoria(){
    	return $this->belongsTo(Categoria::class);
    }

    public function marca(){
    	return $this->belongsTo(Marca::class);
    }

    public function proveedor(){
    	return $this->belongsTo(Proveedor::class);
    }
}
