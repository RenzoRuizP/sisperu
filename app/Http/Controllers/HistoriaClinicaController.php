<?php

namespace App\Http\Controllers;

use App\Paciente;
use Illuminate\Http\Request;

class HistoriaClinicaController extends Controller
{
    public function evolucion(Paciente $paciente = null){
    	$js = [];
    	return view("admin.historia-clinica.evolucion", compact('js', 'paciente'));
    }
}
