<?php

namespace App\Http\Controllers;

use App\User;
use App\Persona;
use App\Paciente;
use App\Anamnesis;
use App\Trabajador;
use Illuminate\Http\Request;

class AnamnesisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       

        //$anamnesi = Anamnesis::find(0);
        $pacientes = Paciente::whereNull("deleted_at")->get();
        $personas = Persona::whereNull('deleted_at')->get();
        $usuarios = User::whereNull('deleted_at')->get();
        $trabajadores = Trabajador::whereNull('deleted_at')->get();
        $js = ['anamnesis.js'];

        // get(): devuelve coleción de objetos
        //first(): devuelve solo el objeto
        $anamnesis = Anamnesis::whereNull('deleted_at')->get();
        //dd($anamnesis->user->trabajador->persona->nombres);
        return view("admin.anamnesis.index", compact('js', 'anamnesis', 'pacientes', 'personas', 'usuarios', 'trabajadores'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $anamnesis = new Anamnesis();

        $anamnesis->fecha = $request->fecha;
        $anamnesis->usuario_id = $request->usuario_id;
        $anamnesis->paciente_id = $request->paciente_id;
        $anamnesis->save();

        return redirect("mantenimiento/anamnesis");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Anamnesis  $anamnesis
     * @return \Illuminate\Http\Response
     */
    public function show(Anamnesis $anamnesis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Anamnesis  $anamnesis
     * @return \Illuminate\Http\Response
     */
    public function edit(Anamnesis $anamnesis)
    {
        return response()->json($anamnesis);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Anamnesis  $anamnesis
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Anamnesis $anamnesis)
    {
        $anamnesis->fecha = $request->fecha;
        $anamnesis->usuario_id = $request->usuario_id;
        $anamnesis->paciente_id = $request->paciente_id;
        $anamnesis->save();

        return redirect("mantenimiento/anamnesis");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Anamnesis  $anamnesis
     * @return \Illuminate\Http\Response
     */
    public function destroy(Anamnesis $anamnesis)
    {
        $anamnesis->deleted_at = date("Y-m-d H:i:s");
        
        $anamnesis->save();

        return redirect("mantenimiento/anamnesis");
    }
}
