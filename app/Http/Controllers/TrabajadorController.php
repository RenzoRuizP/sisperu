<?php

namespace App\Http\Controllers;

use App\Persona;
use App\Empresa;
use App\Sucursal;
use App\Cargo;
use App\Trabajador;
use Illuminate\Http\Request;

class TrabajadorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trabajador = Trabajador::find(1);
        //dd($trabajador->persona->nombres.' '.$trabajador->persona->apellidos);
        $personas = Persona::whereNull('deleted_at')->get();
        $empresas = Empresa::whereNull('deleted_at')->get();
        $cargos = Cargo::whereNull('deleted_at')->get();
        $sucursales = Sucursal::whereNull('deleted_at')->get();
        $js=['trabajador.js'];
        $trabajadores = Trabajador::whereNull('deleted_at')->get();
        
        return view("admin.trabajador.index", compact('js', 'trabajadores', 'cargos', 'sucursales', 'empresas', 'trabajador', 'personas'));
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
    public function store(Request $request)// crear un nuevo registro de la base de datos
    {

    	$trabajador = new Trabajador();
        $trabajador->cargo_id =  $request->cargo_id;
        $trabajador->empresa_id = $request->empresa_id;
        $trabajador->sucursal_id = $request->sucursal_id;
        $trabajador->planilla = $request->planilla;
        $trabajador->sueldo = $request->sueldo;
        $trabajador->horas_trabajo = $request->horas_trabajo;
        $trabajador->tiempo_refrigerio = $request->tiempo_refrigerio;
        $trabajador->persona_id = $request->persona_id;
        
        $trabajador->save();
        return redirect("mantenimiento/trabajador");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Proveedor  $trabajador
     * @return \Illuminate\Http\Response
     */
    public function show(Trabajador $trabajador)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Trabajador  $trabajador
     * @return \Illuminate\Http\Response
     */
    public function edit(Trabajador $trabajador)// devuelve 1 registro de una tabla desde la base de datos.
    {
    	//dd("Hola");
        return  response()->json($trabajador);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Trabajador  $trabajador
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Trabajador $trabajador)//actualizo un registro de la base de datos
    {
        //dd($trabajador);
        //$trabajador = Trabajador::findOrFail($id);
        $trabajador->cargo_id =  $request->cargo_id;
        $trabajador->empresa_id = $request->empresa_id;
        $trabajador->sucursal_id = $request->sucursal_id;
        $trabajador->planilla = $request->planilla;
        $trabajador->sueldo = $request->sueldo;
        $trabajador->horas_trabajo = $request->horas_trabajo;
        $trabajador->tiempo_refrigerio = $request->tiempo_refrigerio;
        $trabajador->persona_id = $request->persona_id;

        $trabajador->save();
        return redirect("mantenimiento/trabajador");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Trabajador  $trabajador
     * @return \Illuminate\Http\Response
     */
    public function destroy(Trabajador $trabajador)
    {
        $trabajador->deleted_at= date('Y-m-d H:i:s');
        $trabajador->save();

        return redirect("mantenimiento/trabajador");
    }
}
