<?php

namespace App\Http\Controllers;

use App\Departamento;
use App\Persona;
use App\Cliente;
use App\Empresa;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipoDocumento = Persona::getTipoDocumento();
        $departamentos = Departamento::all();
        $personas = Persona::whereNull('deleted_at')->get();
        $empresas = Empresa::whereNull('deleted_at')->get();
        $js = ['cliente.js'];
        $clientes = Cliente::whereNull('deleted_at')->get();

        return view("admin.cliente.index", compact('js', 'clientes', 'tipoDocumento', 'departamentos','personas', 'empresas'));
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
        $cliente = new Cliente();
        $cliente->tipo_cliente = $request->tipo_cliente;
        $cliente->numero_documento = $request->numero_documento;
        $cliente->nombres = $request->nombres;
        $cliente->distrito_id = $request->distrito_id;

        $cliente->save();

        return redirect("mantenimiento/cliente");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit($documento)
    {
        
        $t_cliente = $documento->tipo_cliente;
        $_id = $documento->numero_documento;
           
        if($t_cliente === "Persona"){
            $personas = Persona::where('numero_documento', $_id)->get();
            $personas[0]->distrito->provincia->departamento; 
            return response()->json($personas[0]);
        }
        if($t_cliente === "Empresa"){
           $empresas = Empresa::where('ruc', $_id)->get();
           $empresas[0]->distrito->provincia->departamento; 
            return response()->json($empresas[0]);
        }
       
       
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cliente $cliente)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $cliente)
    {
        //
    }
}
