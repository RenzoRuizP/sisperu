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
                            <td>{{$producto->caracteristicas}}</td>
                            <td>{{$producto_->categoria->nombre}}</td>
                            <td>{{$producto->marca->nombre}}</td>
                            <td>{{$producto_->proveedor->nombre}}</td>
                            <td>
                                    <img src="{{asset('storage/'.$producto->foto)}}" height="60">
                            </td>
                            <td>{{$producto->unidad_por_base}}</td>
                            <td>{{$producto->costo_proveedor}}</td>
                            <td>
                                <button class="btn btn-success btn-editar" 
                                data-id ="{{$producto->id}}" 
                                data-codigo ="{{$producto->codigo}}" 
                                data-nombre ="{{$producto->nombre}}" 
                                data-caracteristica ="{{$producto->caracteristicas}}"
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
                <form id="registrar_producto" action="{{url('mantenimiento/producto')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    
                  <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <div class="form-group row">
                        <div class="col-sm-10">
                            Código: <input type="text" name="codigo" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10">
                            Nombre: <input type="text" name="nombre" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10">
                            Característica: <input type="text" name="caracteristicas" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10">

                            Categoria
                                <select name="categoria_id" class="form-control">
                                    <option>Elige</option>
                                    @foreach($categorias as $categoria)
                                        <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
                                    @endforeach
                                </select>
                            
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10">

                            Marca   <select name="marca_id" class="form-control">
                                        <option>Elige</option>
                                        @foreach($marcas as $marca)
                                            <option value="{{$marca->id}}">{{$marca->nombre}}</option>
                                        @endforeach

                                    </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10">
                            Proveedor<select name="proveedor_id" class="form-control">
                                        <option>Elige</option>
                                    @foreach($proveedores as $proveedor)
                                        <option value="{{$proveedor->id}}">{{$proveedor->nombre}}</option>
                                    @endforeach
                                </select>
                            
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10">
                            foto: <input type="file" name="imagen_foto" id="imagen_foto" class="form-control-file">
                            <div>
                                <img src="" id="img_preview_foto" class="w-100">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10">
                            unidad x base: <input type="text" name="unidad_por_base" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10">
                            costo pronveedor: <input type="text" name="costo_proveedor" class=" form-control">
                        </div>
                    </div>
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
