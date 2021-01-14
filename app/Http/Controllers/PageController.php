<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('home');
    }

    public function getPage($modelo){
    	

    	$controller='App\\Http\\Controllers\\'.ucfirst($modelo).'Controller';
    	if(!class_exists($controller)){ return response()->view('errors.404',array('msg'=>'Esta página no existe'),404);}
    	if(class_exists($controller) && ! method_exists((new $controller), 'index')){return response()->view('errors.404',array('msg'=>'Esta funcion no esta disponible'),404);}

    	return (new $controller)->index();
    }

    public function insert(Request $request, $modelo) // insertar un registro.
    {
    	//dd($request);
        $controller='App\\Http\\Controllers\\'.ucfirst($modelo).'Controller';
    	if(!class_exists($controller)){ return response()->view('errors.404',array('msg'=>'Esta página no existe'),404);}
    	if(class_exists($controller) && ! method_exists((new $controller), 'store')){return response()->view('errors.404',array('msg'=>'Esta funcion no esta disponible'),404);}

    	return (new $controller)->store($request);
    }

    public function select(Request $request, $modelo)// seleccionar 1 registro.
    {
    	//dd($request);
        $controller='App\\Http\\Controllers\\'.ucfirst($modelo).'Controller';
        $clase = 'App\\'.ucfirst($modelo);
    	if(!class_exists($controller)){ return response()->view('errors.404',array('msg'=>'Esta página no existe'),404);}
    	if(class_exists($controller) && ! method_exists((new $controller), 'edit')){return response()->view('errors.404',array('msg'=>'Esta funcion no esta disponible'),404);}
    	$obj = $clase::find($request->id);
    	return (new $controller)->edit($obj);
    }

    public function update(Request $request, $modelo)// actualizar registro
    {
    	//dd($request);
        $controller='App\\Http\\Controllers\\'.ucfirst($modelo).'Controller';
        $clase = 'App\\'.ucfirst($modelo);
    	if(!class_exists($controller)){ return response()->view('errors.404',array('msg'=>'Esta página no existe'),404);}
    	if(class_exists($controller) && ! method_exists((new $controller), 'update')){return response()->view('errors.404',array('msg'=>'Esta funcion no esta disponible'),404);}
    	$obj = $clase::find($request->id);
    	return (new $controller)->update($request, $obj);
    }

    public function delete(Request $request, $modelo) // eliminar registro
    {
    	//dd($request);
        $controller='App\\Http\\Controllers\\'.ucfirst($modelo).'Controller';
        $clase = 'App\\'.ucfirst($modelo);
    	if(!class_exists($controller)){ return response()->view('errors.404',array('msg'=>'Esta página no existe'),404);}
    	if(class_exists($controller) && ! method_exists((new $controller), 'destroy')){return response()->view('errors.404',array('msg'=>'Esta funcion no esta disponible'),404);}
    	$obj = $clase::find($request->id);
    	return (new $controller)->destroy($obj);
    }

}



/*

$controller='App\\Http\\Controllers\\'.ucfirst($tabla).'Controller';
		if(!class_exists($controller)){ return response()->view('errors.404',array('msg'=>'Esta página no existe'),404);}
		if(class_exists($controller) && ! method_exists((new $controller), 'index')){return response()->view('errors.404',array('msg'=>'Esta funcion no esta disponible'),404);}
		return (new $controller)->index();

		*/