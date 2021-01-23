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
        //dd("Store cliente");
        
        if($request->tipo_documento)
        {
            //dd("persona");
            $persona = new Persona();
            $persona->tipo_documento = $request->tipo_documento;

            //dd($request->doc_id);
            $persona->numero_documento = $request->doc_id;
            $persona->apellidos = $request->apellidos;
            $persona->nombres = $request->nombres;
            $persona->fecha_nacimiento = $request->f_nacimiento;
            $persona->telefono = $request->celular;
            $persona->email = $request->email;
            $persona->sexo = $request->sexo;
            $persona->direccion = $request->direccion;
            $persona->distrito_id = $request->distrito_id;
            
            $persona->save();

            $cliente = new Cliente();
            $cliente->tipo_cliente = $request->tipo_cliente_persona; //Persona
            $cliente->nombres = $request->nombres;
            $cliente->numero_documento = $request->doc_id;
            $cliente->distrito_id = $request->distrito_id;

            $cliente->save();

        }else{
            //dd("empresa");
            $empresa = new Empresa();
            
            $empresa->ruc = $request->ruc;
            $empresa->razon_social = $request->razon_social;
            $empresa->nombre =  $request->nombre_comercial;
            $empresa->telefono = $request->telefono_empresa;
            $empresa->direccion = $request->direccionE;
            $empresa->correo = $request->emailE;
            $empresa->distrito_id = $request->distrito_id;
            
            $empresa->save(); 

            $cliente = new Cliente();
            $cliente->tipo_cliente = $request->tipo_entidad_empresa;
            $cliente->nombres = $request->nombre_comercial;
            $cliente->numero_documento = $request->ruc;
            $cliente->distrito_id = $request->distrito_id;

            $cliente->save();
        }



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
        //dd($cliente);
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

         if($t_cliente === "Persona"){
             $doc = $documento->numero_documento;
             $persona = Persona::where('numero_documento', $doc)->get();
             $persona[0]->distrito->provincia->departamento;

             return $persona[0];
         }else{

             $doc = $documento->numero_documento;
             $empresa = Empresa::where('ruc', $doc)->get();
             $empresa[0]->distrito->provincia->departamento;

             return $empresa[0];
         }
        

        /*
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
       
       */
        
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

        $t_cliente = $cliente->tipo_cliente;
        $doc = $cliente->numero_documento;
         if($t_cliente === "Persona"){
            
            
            $persona = Persona::where('numero_documento', $doc)->get();
            
            $persona[0]->tipo_documento = $request->tipo_documento;

            //PERSONA
            $persona[0]->numero_documento = $request->doc_id;
            $persona[0]->apellidos = $request->apellidos;
            $persona[0]->nombres = $request->nombres;
            $persona[0]->fecha_nacimiento = $request->f_nacimiento;
            $persona[0]->telefono = $request->celular;
            $persona[0]->email = $request->email;
            $persona[0]->sexo = $request->sexo;
            $persona[0]->direccion = $request->direccion;
            $persona[0]->distrito_id = $request->distrito_id;

            $persona[0]->save();

            $cliente->tipo_cliente = $request->tipo_cliente_persona; //CLIENTE
            $cliente->nombres = $request->nombres;
            $cliente->numero_documento = $request->doc_id;
            $cliente->distrito_id = $request->distrito_id;

            $cliente->save();

         }else{

            $empresa = Empresa::where('ruc', $doc)->get();
            $empresa[0]->ruc = $request->ruc;
            $empresa[0]->razon_social = $request->razon_social;
            $empresa[0]->nombre =  $request->nombre_comercial;
            $empresa[0]->telefono = $request->telefono_empresa;
            $empresa[0]->direccion = $request->direccionE;
            $empresa[0]->correo = $request->emailE;
            $empresa[0]->distrito_id = $request->distrito_id;
            
            $empresa[0]->save(); 

            //$cliente = new Cliente();
            $cliente->tipo_cliente = $request->tipo_entidad_empresa;
            $cliente->nombres = $request->nombre_comercial;
            $cliente->numero_documento = $request->ruc;
            $cliente->distrito_id = $request->distrito_id;

            $cliente->save();
         }

            return redirect("mantenimiento/cliente");


        /*
        $razon_social_empresa = $cliente->razon_social;
        
        if()
        {
            $ruc = $cliente->ruc;
            $empresas = Empresa::where('ruc', $ruc)->get();

            $empresa->nombre =  $request->nombre;
            $empresa->razon_social = $request->razon_social;
            $empresa->distrito_id = $request->distrito_id;
            $empresa->direccion = $request->direccion;
            $empresa->ruc = $request->ruc;
            $empresa->telefono = $request->telefono_empresa;
            $empresa->correo = $request->emailE;

            $empresa->save();

        }else{

        }
        return redirect("mantenimiento/empresa");
        //dd($cliente);

        */
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $cliente)
    {
        $cliente->deleted_at = date('Y-m-d H:i:s');
        $cliente->save();

        return redirect("mantenimiento/cliente");
    }
}
