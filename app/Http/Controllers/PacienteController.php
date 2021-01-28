<?php

namespace App\Http\Controllers;

use App\Persona;
use App\Paciente;
use Illuminate\Http\Request;

class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tiposPacientes = Paciente::getTipoPaciente();
        $personas = Persona::whereNull('deleted_at')->get();
        $js = ['paciente.js'];
        $pacientes = Paciente::whereNull('deleted_at')->get();
        return view('admin.paciente.index', compact('js', 'pacientes', 'personas', 'tiposPacientes'));
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
        $paciente = new Paciente();
        $paciente->tipo_paciente = $request->tipo_paciente;
        $paciente->persona_id = $request->persona_id;
        $paciente->save();

        return redirect("mantenimiento/paciente");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function show(Paciente $paciente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function edit(Paciente $paciente)
    {
        return response()->json($paciente);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Paciente $paciente)
    {
        $paciente->tipo_paciente = $request->tipo_paciente;
        $paciente->persona_id = $request->persona_id;
        $paciente->save();

        return redirect("mantenimiento/paciente");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Paciente $paciente)
    {
        $paciente->deleted_at = date ('Y-m-d H:i:s');
        $paciente->save();

        return redirect("mantenimiento/paciente");
    }
}
