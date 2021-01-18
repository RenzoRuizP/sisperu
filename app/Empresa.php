<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Distrito;
class Empresa extends Model
{
	public function distrito(){
		return $this->belongsTo(Distrito::class);
	}
}