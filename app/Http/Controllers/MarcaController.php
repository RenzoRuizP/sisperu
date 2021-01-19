<?php

namespace App\Http\Controllers;

use App\Marca;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class MarcaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $js=['marca.js']; // agregar archivo js a la vista cargo
        $marcas= Marca::whereNull("deleted_at")->get(); // consulta base de datos los datos de cargo.
        return view('admin.marca.index', compact('js', 'marcas'));
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
        $ext=substr($request->file('imagen_file')->getMimeType(), strpos($request->file('imagen_file')->getMimeType(),'/')+1);

        $file = $request->file('imagen_file')->storeAs('public/img/marcas', $request->nombre.Str::random(2).'.'.$ext);
        if($file){
            $marca = new Marca();
            $marca->nombre=$request->nombre;
            $marca->imagen = str_replace('public/', '', $file);
            $marca->save();
        }



        

        return redirect("mantenimiento/marca");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Marca  $marca
     * @return \Illuminate\Http\Response
     */
    public function show(Marca $marca)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Marca  $marca
     * @return \Illuminate\Http\Response
     */
    public function edit(Marca $marca)
    {
        return response()->json($marca);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Marca  $marca
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Marca $marca) // el request devuelve un json // $Marca devuelve un objeto
    {
        if($request->file('imagen_file')){
            Storage::delete('public/'.$marca->imagen);

            $ext=substr($request->file('imagen_file')->getMimeType(), strpos($request->file('imagen_file')->getMimeType(),'/')+1);

            $file = $request->file('imagen_file')->storeAs('public/img/marcas', $request->nombre.Str::random(2).'.'.$ext);
        }else{
            $file = $marca->imagen;
        }


        $marca->nombre = $request->nombre;
        $marca->imagen = str_replace('public/', '', $file);
        $marca->save();

        return redirect("mantenimiento/marca");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Marca  $marca
     * @return \Illuminate\Http\Response
     */
    public function destroy(Marca $marca)
    {
        //dd("Holaa");
        $marca->deleted_at= date('Y-m-d H:i:s');
        $marca->save();

        return redirect("mantenimiento/marca");
    }
}
