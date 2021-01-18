@extends('layouts.app')

@section('content')


<div class="">
    <div class="row">
        <div class="col-4">
            <button class="btn btn-primary" data-toggle = "modal" data-target="#modal_sucursal"> Modal
            </button>
        </div>
        <div class="card col-12">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>NOMBRE</th>
                        <th>DISTRITO</th>
                        <th>DIRECCIÓN</th>
                        <th>TELÉFONO</th>
                        <th>ACCIONES</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($sucursales as $sucursal)
                        <tr>
                            <td>{{$sucursal->id}}</td>
                            <td>{{$sucursal->nombre}}</td>
                            <td>{{$sucursal->distrito->nombre}}</td>
                            <td>{{$sucursal->direccion}}</td>
                            <td>{{$sucursal->telefono}}</td>
                            <td>{{$sucursal->tipo_sucursal}}</td>
                            <td>
                                <button class="btn btn-success btn-editar" 
                                data-id="{{$sucursal->id}}" 
                                data-nombre="{{$sucursal->nombre}}" 
                                data-distrito_id="{{$sucursal->distrito_id}}" 
                                data-direccion ="{{$sucursal->direccion}}"
                                data-telefono ="{{$sucursal->telefono}}"
                                data-tipo_sucursal ="{{$sucursal->tipo_sucursal}}">Editar</button>
                                
                                <button data-id="{{$sucursal->id}}" class="btn btn-danger btn-eliminar">Eliminar</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <form method="post" id="sucursal_eliminar">
            @csrf
            @method('DELETE')
        </form>

        <div class="modal" tabindex="-1" role="dialog" id="modal_sucursal">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="registrar_sucursal" action="{{url('mantenimiento/sucursal')}}" method="post">
                    @csrf
                    
                  <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <div class="form-group">
                        Nombre: <input type="text" name="nombre" class="form-control">
                    </div>
                    <div class="form-group">
                        Departamento:
                            <select name="departamento_id" id = "departamento_id" class="form-control">
                                <option>Elige</option>
                                @foreach($departamentos as $departamento)
                                 <option value="{{$departamento->id}}">{{$departamento->nombre}}</option>
                                @endforeach
                            </select>
                    </div>
                    <div class="form-group">
                        Provincia:
                            <select name="provincia_id" id="provincia_id" class="form-control">
                                
                            </select>
                    </div>
                    <div class="form-group">
                        Distrito:
                            <select name="distrito_id" id="distrito_id" class="form-control">
                                
                            </select>
                    </div>
                    <div class="form-group">
                        Dirección: <input type="text" name="direccion" class="form-control">
                    </div>
                    <div class="form-group">
                        Teléfono: <input type="text" name="telefono" class="form-control">
                    </div>
                    <div class="form-group">
                        Tipo sucursal: <input type="text" name="tipo_sucursal" class="form-control">
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" id="guardar_sucursal" class="btn btn-primary">Save changes</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  </div>
                </form>
            </div>
          </div>
        </div>
    </div>
</div>
@endsection
