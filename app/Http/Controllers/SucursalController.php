<?php

namespace App\Http\Controllers;
use App\Sucursal;
use App\Departamento;
use Illuminate\Http\Request;

class SucursalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departamentos = Departamento::all();
        $js=['sucursal.js'];
        $sucursales = Sucursal::whereNull('deleted_at')->get();
        return view("admin.sucursal.index", compact('js', 'sucursales', 'departamentos'));
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
        //dd($request);
        $sucursal = new Sucursal();
        $sucursal->nombre=$request->nombre;
        $sucursal->distrito_id=$request->distrito_id;
        $sucursal->direccion=$request->direccion;
        $sucursal->telefono=$request->telefono;
        $sucursal->tipo_sucursal=$request->tipo_sucursal;
        $sucursal->save();

        return redirect("mantenimiento/sucursal");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sucursal  $sucursal
     * @return \Illuminate\Http\Response
     */
    public function show(Sucursal $sucursal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SucursalSucursal  $sucursal
     * @return \Illuminate\Http\Response
     */
    public function edit(Sucursal $sucursal)// devuelve 1 registro de una tabla desde la base de datos.
    {
        $sucursal->distrito->provincia->departamento;
        return response()->json($sucursal);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sucursal  $sucursal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sucursal $sucursal) //actualizo un registro de la base de datos
    {
        $sucursal->nombre = $request->nombre;
        $sucursal->distrito_id = $request->distrito_id;
        $sucursal->direccion = $request->direccion;
        $sucursal->telefono = $request->telefono;
        $sucursal->tipo_sucursal = $request->tipo_sucursal;
        $sucursal->save();

        return redirect("mantenimiento/sucursal");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sucursal  $sucursal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sucursal $sucursal) // cambio el estado de un registro de una tabla de la base de datos
    {
        $sucursal->deleted_at= date('Y-m-d H:i:s');
        $sucursal->save();

        return redirect("mantenimiento/sucursal");
    }
}

