<?php

namespace App\Http\Controllers;

use App\Empresa;
use App\Institucion;
use App\Departamento;
use App\Distrito;
use Illuminate\Http\Request;

class InstitucionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departamentos = Departamento::all();
        $empresas = Empresa::whereNull('deleted_at')->get();
        $tipoInstituciones = Institucion::getTipoInstitucion();
        $distritos = Distrito::whereNull('deleted_at')->get();
        $js = ['institucion.js'];
        $instituciones = Institucion::whereNull('deleted_at')->get();

        return view("admin.institucion.index", compact('js','instituciones', 'tipoInstituciones', 'departamentos', 'empresas', 'distritos'));
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
       // dd($request);
        $institucion = new Institucion();
        $institucion->tipo_institucion = $request->tipo_institucion;
        $institucion->nombre = $request->nombre;
        $institucion->telefono = $request->telefono;
        $institucion->distrito_id = $request->distrito_id;
        $institucion->direccion = $request->direccion;
        $institucion->empresa_id = $request->empresa_id;

        $institucion->save();

        return redirect("mantenimiento/institucion");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Institucion  $institucion
     * @return \Illuminate\Http\Response
     */
    public function show(Institucion $institucion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Institucion  $institucion
     * @return \Illuminate\Http\Response
     */
    public function edit(Institucion $institucion)
    {
       
        $institucion->distrito->provincia->departamento; // devuelve distrito, provincia, 
        return  response()->json($institucion);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Institucion  $institucion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Institucion $institucion)
    {
        $institucion->tipo_institucion = $request->tipo_institucion;
        $institucion->nombre = $request->nombre;
        $institucion->telefono = $request->telefono;
        $institucion->distrito_id = $request->distrito_id;
        $institucion->direccion = $request->direccion;
        $institucion->empresa_id = $request->empresa_id;

        $institucion->save();

        return redirect("mantenimiento/institucion");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Institucion  $institucion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Institucion $institucion)
    {
        $institucion->deleted_at = date('Y-m-d H:i:s');
        $institucion->save();

        return redirect("mantenimiento/institucion");
    }
}
