<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//use App\User;
use App\Trabajador;
use App\User;
class UserController extends Controller
{
   
    public function index()
    {
        $user_ = User::find(1);
        //dd($user_->trabajador->persona->nombres.' '.$user_->trabajador->persona->apellidos);

        $trabajadores = Trabajador::whereNull('deleted_at')->get();
        $js = ['usuario.js'];
        $usuarios = User::whereNull('deleted_at')->get();
        
        return view("admin.usuario.index", compact('js','usuarios', 'trabajadores','user_'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)// crear un nuevo registro de la base de datos
    {

    	$usuario = new User();
    	$usuario->name = $request->name;
    	$usuario->password = $request->password;
    	$usuario->trabajador_id = $request->trabajador_id;

    	$usuario->save();

    	return redirect("mantenimiento/usuario");
    }

    public function show(User $usuario)
    {
        //
    }

    public function edit(User $usuario)// devuelve 1 registro de una tabla desde la base de datos.
    {	
    	
   		return response()->json($usuario);
    }

    public function update(Request $request, User $usuario)//actualizo un registro de la base de datos
    {
        $usuario->name = $request->name;
    	$usuario->password = $request->password;
    	$usuario->trabajador_id = $request->trabajador_id;

    	$usuario->save();

    	return redirect("mantenimiento/usuario");
    }

    public function destroy(User $usuario)
    {
        $usuario->deleted_at= date('Y-m-d H:i:s');
        $usuario->save();

        return redirect("mantenimiento/usuario");
    }
}
