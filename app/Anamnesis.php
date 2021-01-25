<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Paciente;
use App\User;
class Anamnesis extends Model
{
    protected $table = 'anamnesis'; 

    public function paciente(){
    	return $this->belongsTo(Paciente::class);
    }

    public function user(){
        return $this->belongsTo(User::class, 'usuario_id');
    }
}
