<?php

namespace App\Http\Controllers;

use App\Paciente;
use App\Persona;
use App\Departamento;
use App\Distrito;
use Illuminate\Http\Request;

class HistoriaClinicaController extends Controller
{
    public function evolucion(Paciente $paciente = null){
    	$estadosCiviles = Persona::getEstadoCivil();
    	$tiposPacientes = Paciente::getTipoPaciente();
    	$departamentos = Departamento::all();

        $distritos = Distrito::whereNull('deleted_at')->get();

        dd($departamentos[0]->provincias[0]->distritos);
    	$js = [];
    	return view("admin.historia-clinica.evolucion", 
    			compact(
    					'js', 
    					'paciente', 
    					'estadosCiviles', 
    					'tiposPacientes',
    					'departamentos',
    					'distritos'));
    }
}
