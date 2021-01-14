@extends('layouts.app')

@section('content')


<div class="">
    <div class="row">
        <div class="col-4">
            <button class="btn btn-primary" data-toggle = "modal" data-target="#modal_producto"> Modal
            </button>
        </div>
        <div class="card col-12">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>CÓDIGO</th>
                        <th>NOMBRE</th>
                        <th>CATACTERISTICA</th>
                        <th>CATEGORIA_ID</th>
                        <th>MARCA_ID</th>
                        <th>PROVEEDOR_ID</th>
                        <th>FOTO</th>
                        <th>UNIDAD X BASE</th>
                        <th>COSTO PROVEEDOR</th>
                        <th>ACCIONES</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($productos as $producto)
                        <tr>
                            <td>{{$producto->id}}</td>
                            <td>{{$producto->codigo}}</td>
                            <td>{{$producto->nombre}}</td>
                            <td>{{$producto->caracteristica}}</td>
                            <td>{{$producto->categoria_id}}</td>
                            <td>{{$producto->marca_id}}</td>
                            <td>{{$producto->proveedor_id}}</td>
                            <td>{{$producto->foto}}</td>
                            <td>{{$producto->unidad_por_base}}</td>
                            <td>{{$producto->costo_proveedor}}</td>
                            <td>
                                <button class="btn btn-success btn-editar" 
                                data-id ="{{$producto->id}}" 
                                data-codigo ="{{$producto->codigo}}" 
                                data-nombre ="{{$producto->nombre}}" 
                                data-caracteristica ="{{$producto->caracteristica}}"
                                data-categoria_id ="{{$producto->categoria_id}}"
                                data-marca_id ="{{$producto->marca_id}}"
                                data-proveedor_id ="{{$producto->proveedor_id}}"
                                data-foto ="{{$producto->foto}}"
                                data-unidad_por_base ="{{$producto->unidad_por_base}}"
                                data-costo_proveedor ="{{$producto->costo_proveedor}}"
                                >Editar</button>
                                
                                <button data-id="{{$producto->id}}" class="btn btn-danger btn-eliminar">Eliminar</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <form method="post" id="producto_eliminar">
            @csrf
            @method('DELETE')
        </form>

        <div class="modal" tabindex="-1" role="dialog" id="modal_producto">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="registrar_producto" action="{{url('mantenimiento/producto')}}" method="post">
                    @csrf
                    
                  <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    Código: <input type="text" name="codigo" class="form-control">
                    Nombre: <input type="text" name="nombre" class="form-control">
                    Característica: <input type="text" name="caracteristicas" class="form-control">

                    Categoria_id: <input type="text" name="categoria_id" class="form-control">
                    marca_id: <input type="text" name="marca_id" class="form-control">

                    proveedor_id: <input type="text" name="proveedor_id" class="form-control">
                    foto: <input type="text" name="foto" class="form-control">
                    unidad x base: <input type="text" name="unidad_por_base" class="form-control">
                    costo pronveedor: <input type="text" name="costo_proveedor" class="form-control">

                  </div>
                  <div class="modal-footer">
                    <button type="button" id="guardar_producto" class="btn btn-primary">Save changes</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  </div>
                </form>
            </div>
          </div>
        </div>
    </div>
</div>
@endsection
