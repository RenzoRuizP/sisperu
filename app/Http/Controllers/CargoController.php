<?php

namespace App\Http\Controllers;

use App\Cargo;
use Illuminate\Http\Request;

class CargoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $js=['cargo.js']; // agregar archivo js a la vista cargo
        $cargos= Cargo::whereNull("deleted_at")->get(); // consulta base de datos los datos de cargo.
        return view("admin.cargo.index", compact('js', 'cargos')); //devuelve la vista pasandole los archivos como los datos
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
        $cargo = new Cargo();
        $cargo->nombre=$request->nombre;
        $cargo->save();

        return redirect("mantenimiento/cargo");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cargo  $cargo
     * @return \Illuminate\Http\Response
     */
    public function show(Cargo $cargo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cargo  $cargo
     * @return \Illuminate\Http\Response
     */
    public function edit(Cargo $cargo)// devuelve 1 registro de una tabla desde la base de datos.
    {
        return response()->json($cargo);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cargo  $cargo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cargo $cargo) //actualizo un registro de la base de datos
    {
        $cargo->nombre=$request->nombre;
        $cargo->save();

        return redirect("mantenimiento/cargo");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cargo  $cargo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cargo $cargo) // cambio el estado de un registro de una tabla de la base de datos
    {
        $cargo->deleted_at= date('Y-m-d H:i:s');
        $cargo->save();

        return redirect("mantenimiento/cargo");
    }
}
