<?php

namespace App\Http\Controllers;

use App\Distribuidor;
use App\Empresa;
use Illuminate\Http\Request;

class DistribuidorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipoDistribuidores = Distribuidor::getTipoDistribuidor();
        $empresas = Empresa::whereNull('deleted_at')->get();
        $js = ['distribuidor.js'];
        $distribuidores = Distribuidor::whereNull('deleted_at')->get();

        return view(
                    "admin.distribuidor.index", 
                    compact(
                            'js', 
                            'distribuidores', 
                            'tipoDistribuidores', 
                            'empresas'
                        )
                );
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
        $distribuidor = new Distribuidor();
        $distribuidor->tipo = $request->tipo;
        $distribuidor->empresa_id = $request->empresa_id;

        $distribuidor->save();

        return redirect("mantenimiento/distribuidor");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Distribuidores  $distribuidores
     * @return \Illuminate\Http\Response
     */
    public function show(Distribuidor $distribuidor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Distribuidores  $distribuidores
     * @return \Illuminate\Http\Response
     */
    public function edit(Distribuidor $distribuidor)
    {
        return  response()->json($distribuidor);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Distribuidores  $distribuidores
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Distribuidor $distribuidor)
    {
        $distribuidor->tipo = $request->tipo;
        $distribuidor->empresa_id = $request->empresa_id;

        $distribuidor->save();

        return redirect("mantenimiento/distribuidor");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Distribuidores  $distribuidores
     * @return \Illuminate\Http\Response
     */
    public function destroy(Distribuidor $distribuidor)
    {
        $distribuidor->deleted_at = date('Y-m-d H:i:s');
        $distribuidor->save();

        return redirect("mantenimiento/distribuidor");
    }
}
