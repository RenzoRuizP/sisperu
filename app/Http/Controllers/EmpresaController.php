<?php

namespace App\Http\Controllers;
use App\Departamento;
use App\Distrito;
use App\Empresa;
use Illuminate\Http\Request;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$departamentos = Departamento::all();
    	$departamentos = Departamento::all();
        $js=['empresa.js'];
        $distritos = Distrito::whereNull('deleted_at')->get();
        $empresas = Empresa::whereNull('deleted_at')->get();
        return view("admin.empresa.index", compact('js', 'empresas', 'distritos', 'departamentos'));
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
    public function store(Request $request) // crear un nuevo registro de la base de datos
    {
    	//dd("hola");
        $empresa = new Empresa();
        $empresa->nombre =  $request->nombre;
        $empresa->razon_social = $request->razon_social;
        $empresa->distrito_id = $request->distrito_id;
        $empresa->direccion = $request->direccion;
        $empresa->ruc = $request->ruc;
        $empresa->telefono = $request->telefono;
        $empresa->correo = $request->correo;

        $empresa->save();
        return redirect("mantenimiento/empresa");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Empresa $empresa
     * @return \Illuminate\Http\Response
     */
    public function show(Empresa $empresa)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\EmpresaEmpresa $empresa
     * @return \Illuminate\Http\Response
     */
    public function edit(Empresa $empresa)// devuelve 1 registro de una tabla desde la base de datos.
    {
    	//dd($empresa);
    	$empresa->distrito->provincia->departamento;
        return  response()->json($empresa);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Empresa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Empresa $empresa) //actualizo un registro de la base de datos
    {
        $empresa->nombre =  $request->nombre;
        $empresa->razon_social = $request->razon_social;
        $empresa->distrito_id = $request->distrito_id;
        $empresa->direccion = $request->direccion;
        $empresa->ruc = $request->ruc;
        $empresa->telefono = $request->telefono;
        $empresa->correo = $request->correo;

        $empresa->save();
        return redirect("mantenimiento/empresa");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Empresa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empresa $empresa) // cambio el estado de un registro de una tabla de la base de datos
    {
        $empresa->deleted_at= date('Y-m-d H:i:s');
        $empresa->save();

        return redirect("mantenimiento/empresa");
    }
}

