<?php

namespace App\Http\Controllers;

use App\producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $js = ["producto.js"];
        $productos = Producto::whereNull("deleted_at")->get();
        
        return view("admin.producto.index", compact("js", "productos"));
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
        //dd($request);
        $producto = new Producto();
        $producto->codigo = $request->codigo;
        $producto->nombre = $request->nombre;
        $producto->caracteristicas = $request->caracteristicas;
        $producto->categoria_id = $request->categoria_id;
        $producto->marca_id = $request->marca_id;
        $producto->proveedor_id = $request->proveedor_id;
        $producto->foto = $request->foto;
        $producto->unidad_por_base = $request->unidad_por_base;
        $producto->costo_proveedor = $request->costo_proveedor ;

        $producto->save();

        return redirect("mantenimiento/producto");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(producto $producto)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit(producto $producto) // muestra los datos de un registro
    {
        return response()->json($producto);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, producto $producto)
    {
        $producto->codigo = $request->codigo;
        $producto->nombre = $request->nombre;
        $producto->caracteristicas = $request->caracteristicas;
        $producto->categoria_id = $request->categoria_id;
        $producto->marca_id = $request->marca_id;
        $producto->proveedor_id = $request->proveedor_id;
        $producto->foto = $request->foto;
        $producto->unidad_por_base = $request->unidad_por_base;
        $producto->costo_proveedor = $request->costo_proveedor ;

        $producto->save();

        return redirect("mantenimiento/producto");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(producto $producto)
    {

        $producto->deleted_at = date("Y-m-d H:i:s");
        
        $producto->save();

        return redirect("mantenimiento/producto");
    }
}
