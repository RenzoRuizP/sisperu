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
        //dd('consultando documento persona: '.$request->doc_id);

        
        
        if($request->tipo_documento)
        {
             $documento_persona = $request->doc_id;
             $persona = Persona::where('numero_documento', $documento_persona)->get();
            
            //dd($documento_persona.' = '.$persona[0]->numero_documento);

            if($documento_persona !== $persona[0]->numero_documento){


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

           }else{

                $cliente = new Cliente();
                $cliente->tipo_cliente = $request->tipo_cliente_persona; //Persona
                $cliente->nombres = $request->nombres;
                $cliente->numero_documento = $request->doc_id;
                $cliente->distrito_id = $request->distrito_id;

                $cliente->save();
            }
            
        }else{
            
            //dd($request->ruc);
            $documento_empresa = $request->ruc;
            $empresa = Empresa::where('ruc', $documento_empresa)->get();
            
            //dd($documento_empresa.' = '.$empresa[0]->ruc);

            if($documento_empresa !== $empresa[0]->ruc){

                $empresa = new Empresa();
                
                $empresa->ruc = $request->ruc;
                $empresa->razon_social = $request->razon_social;
                $empresa->nombre =  $request->nombre_comercial;
                $empresa->telefono = $request->telefono_empresa;
                $empresa->direccion = $request->direccionE;
                $empresa->correo = $request->emailE;
                $empresa->distrito_id = $request->distrito_id;
                
                $empresa->save(); 
            }else{
                $cliente = new Cliente();
                $cliente->tipo_cliente = $request->tipo_entidad_empresa;
                $cliente->nombres = $request->nombre_comercial;
                $cliente->numero_documento = $request->ruc;
                $cliente->distrito_id = $request->distrito_id;

                $cliente->save();
            }
            
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
        
         if($t_cliente === "Persona"){
            
            $doc = $cliente->numero_documento;
            $persona = Persona::where('numero_documento', $doc)->first();
            
            $persona->tipo_documento = $request->tipo_documento;

            //PERSONA
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

            $cliente->tipo_cliente = $request->tipo_cliente_persona; //CLIENTE
            $cliente->nombres = $request->nombres;
            $cliente->numero_documento = $request->doc_id;
            $cliente->distrito_id = $request->distrito_id;

            $cliente->save();

         }else{
            $doc_empresa = $cliente->numero_documento;

            $empresa = Empresa::where('ruc', $doc_empresa)->first();
            $empresa->ruc = $request->ruc;
            $empresa->razon_social = $request->razon_social;
            $empresa->nombre =  $request->nombre_comercial;
            $empresa->telefono = $request->telefono_empresa;
            $empresa->direccion = $request->direccionE;
            $empresa->correo = $request->emailE;
            $empresa->distrito_id = $request->distrito_id;
            
            $empresa->save(); 

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
