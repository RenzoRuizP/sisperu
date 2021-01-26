<?php

namespace App\Http\Controllers;

use App\Anamnesis;
use App\DetalleAnamnesis;
use Illuminate\Http\Request;

class DetalleAnamnesisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $anamnesis = Anamnesis::whereNull('deleted_at')->get();
        $js = ['detalleAnamnesis.js'];

        $detalleAnamnesis = DetalleAnamnesis::whereNull('deleted_at')->get();
        return view("admin.detalleanamnesis.index", compact('js', 'detalleAnamnesis', 'anamnesis'));
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
        $detalleAnamnesis = new DetalleAnamnesis();
        $detalleAnamnesis->anamnesis_id = $request->anamnesis_id;
        $detalleAnamnesis->nombreCampo = $request->nombreCampo;
        $detalleAnamnesis->valor = $request->valor;
        //dd($detalleAnamnesis);
        $detalleAnamnesis->save();

        return redirect("mantenimiento/detalleanamnesis");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DetalleAnamnesis  $detalleAnamnesis
     * @return \Illuminate\Http\Response
     */
    public function show(DetalleAnamnesis $detalleAnamnesis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DetalleAnamnesis  $detalleAnamnesis
     * @return \Illuminate\Http\Response
     */
    public function edit(DetalleAnamnesis $detalleAnamnesis)
    {
        return response()->json($detalleAnamnesis);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DetalleAnamnesis  $detalleAnamnesis
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DetalleAnamnesis $detalleAnamnesis)
    {
        $detalleAnamnesis->anamnesis_id = $request->anamnesis_id;
        $detalleAnamnesis->nombreCampo = $request->nombreCampo;
        $detalleAnamnesis->valor = $request->valor;
        //dd($detalleAnamnesis);
        $detalleAnamnesis->save();

        return redirect("mantenimiento/detalleanamnesis");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DetalleAnamnesis  $detalleAnamnesis
     * @return \Illuminate\Http\Response
     */
    public function destroy(DetalleAnamnesis $detalleAnamnesis)
    {
        $detalleAnamnesis->deleted_at = date('Y-m-d H:i:s');
        $detalleAnamnesis->save();

        return redirect("mantenimiento/detalleanamnesis");
    }
}
