@extends('layouts.app')

@section('content')


<div class="">
    <div class="row">
        <div class="col-4">
            <button class="btn btn-primary" data-toggle = "modal" data-target="#modal_proveedor"> Modal
            </button>
        </div>
        <div class="card col-12">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>NOMBRE</th>
                        <th>TELÉFONO</th>
                        <th>CORREO</th>
                        <th>ACCIONES</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($proveedores as $proveedor)
                        <tr>
                            <td>{{$proveedor->id}}</td>
                            <td>{{$proveedor->nombre}}</td>
                            <td>{{$proveedor->telefono}}</td>
                            <td>{{$proveedor->correo}}</td>
                            <td>
                                <button class="btn btn-success btn-editar" data-id="{{$proveedor->id}}" data-nombre="{{$proveedor->nombre}}" data-telefono="{{$proveedor->telefono}}" data-correo ="{{$proveedor->correo}}">Editar</button>
                                
                                <button data-id="{{$proveedor->id}}" class="btn btn-danger btn-eliminar">Eliminar</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <form method="post" id="proveedor_eliminar">
            @csrf
            @method('DELETE')
        </form>

        <div class="modal" tabindex="-1" role="dialog" id="modal_proveedor">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="registrar_proveedor" action="{{url('mantenimiento/proveedor')}}" method="post">
                    @csrf
                    
                  <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    Nombre: <input type="text" name="nombre" class="form-control">
                    Telefno: <input type="text" name="telefono" class="form-control">
                    Correo: <input type="email" name="correo" class="form-control">
                  </div>
                  <div class="modal-footer">
                    <button type="button" id="guardar_proveedor" class="btn btn-primary">Save changes</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  </div>
                </form>
            </div>
          </div>
        </div>
    </div>
</div>
@endsection
