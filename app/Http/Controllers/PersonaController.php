<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Departamento;
use App\Distrito;
use App\Persona;
class PersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$sucursales = Sucursal::whereNull('deleted_at')->get();
        $departamentos = Departamento::all();
        $distritos = Distrito::whereNull('deleted_at')->get();
        $js=['persona.js'];
        $personas = Persona::whereNull('deleted_at')->get();
        
        return view("admin.persona.index", compact('js', 'personas', 'distritos', 'departamentos'));
    }

   
    public function create()
    {
        //
    }

    public function store(Request $request)// crear un nuevo registro de la base de datos
    {

    	$persona = new Persona();
        //dd("ssssssssssss");
    	$persona->nombres = $request->nombres;
    	$persona->apellidos = $request->apellidos;
    	$persona->fecha_nacimiento = $request->fecha_nacimiento;
    	$persona->telefono = $request->telefono;
    	$persona->email = $request->email;
        $persona->estado_civil = $request->estado_civil;
        $persona->edad = $request->edad;
        $persona->profesion = $request->profesion;
        $persona->distrito_id = $request->distrito_id;
    	$persona->direccion = $request->direccion;
    	$persona->tipo_documento = $request->tipo_documento;
    	$persona->numero_documento = $request->numero_documento;
    	$persona->sexo = $request->sexo;
    	$persona->save();

    	return redirect("mantenimiento/persona");
    }

   
    public function show(Persona $persona)
    {
        //
    }

   
    public function edit(Persona $persona)// devuelve 1 registro de una tabla desde la base de datos.
    {
        $persona->distrito->provincia->departamento;
        return response()->json($persona);
    }

    public function update(Request $request, Persona $persona)//actualizo un registro de la base de datos
    {
        //dd("aaaa");
       	$persona->nombres = $request->nombres;
        $persona->apellidos = $request->apellidos;
        $persona->fecha_nacimiento = $request->fecha_nacimiento;
        $persona->telefono = $request->telefono;
        $persona->email = $request->email;
        $persona->estado_civil = $request->estado_civil;
        $persona->edad = $request->edad;
        $persona->profesion = $request->profesion;
        $persona->distrito_id = $request->distrito_id;
        $persona->direccion = $request->direccion;
        $persona->tipo_documento = $request->tipo_documento;
        $persona->numero_documento = $request->numero_documento;
        $persona->sexo = $request->sexo;
    	$persona->save();

    	return redirect("mantenimiento/persona");
    }

    public function destroy(Persona $persona)
    {
        $persona->deleted_at = date('Y-m-d H:i:s');
        $persona->save();

        return redirect("mantenimiento/persona");
    }
}
