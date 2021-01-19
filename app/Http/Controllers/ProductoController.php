<?php

namespace App\Http\Controllers;

use App\Producto;
use App\Categoria;
use App\Marca;
use App\Proveedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

//use Illuminate\Http\UploadedFile;
class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $producto_ = Producto::find(1);

        $categorias = Categoria::whereNull('deleted_at')->get();
        $marcas = Marca::whereNull('deleted_at')->get();
        $proveedores = Proveedor::whereNull('deleted_at')->get();
        
        $js = ["producto.js"];
        $productos = Producto::whereNull("deleted_at")->get();
       
        return view("admin.producto.index", compact("js", "productos", 'producto_', 'categorias', 'marcas', 'proveedores'));
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
        //d(($request->file('imagen_foto')));
        

        //dd($request->file('imagen_foto'));
        $ext=substr($request->file('imagen_foto')->getMimeType(), strpos($request->file('imagen_foto')->getMimeType(),'/')+1);
        //dd($ext);

        $file = $request->file('imagen_foto')->storeAs('public/img/productos', $request->nombre.Str::random(2).'.'.$ext);

        //dd($file);
        if($file){
            $producto = new Producto();
            $producto->codigo = $request->codigo;
            $producto->nombre = $request->nombre;
            $producto->caracteristicas = $request->caracteristicas;
            $producto->categoria_id = $request->categoria_id;
            $producto->marca_id = $request->marca_id;
            $producto->proveedor_id = $request->proveedor_id;
            $producto->foto = str_replace('public/', '', $file);
            //$producto->foto = $request->foto;
            $producto->unidad_por_base = $request->unidad_por_base;
            $producto->costo_proveedor = $request->costo_proveedor ;

            $producto->save();

        }

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
        if($request->file('imagen_foto')){
            Storage::delete('public/'.$producto->foto);

            $ext=substr($request->file('imagen_foto')->getMimeType(), strpos($request->file('imagen_foto')->getMimeType(),'/')+1);

            $file = $request->file('imagen_foto')->storeAs('public/img/productos', $request->nombre.Str::random(2).'.'.$ext);
        }else{
            $file = $producto->foto;
        }

        $producto->codigo = $request->codigo;
        $producto->nombre = $request->nombre;
        $producto->caracteristicas = $request->caracteristicas;
        $producto->categoria_id = $request->categoria_id;
        $producto->marca_id = $request->marca_id;
        $producto->proveedor_id = $request->proveedor_id;
        $producto->foto = str_replace('public/', '', $file);
//        $producto->foto = $request->foto;
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
