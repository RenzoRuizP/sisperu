 
 @extends('layouts.app')

@section('content')


<div class="">
    <div class="row">
        <div class="col-4">
            <button class="btn btn-primary" data-toggle = "modal" data-target="#modal_empresa"> Modal
            </button>
        </div>
        <div class="card col-12">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>NOMBRE</th>
                        <th>RAZÓN SOCIAL</th>
                        <th>DISTRITO ID</th>
                        <th>DIRECCIÓN</th>
                        <th>RUC</th>
                        <th>TELÉFONO</th>
                        <th>CORREO</th>
                        <th>ACCIONES</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($empresas as $empresa)
                        <tr>
                            <td>{{$empresa->id}}</td>
                            <td>{{$empresa->nombre}}</td>
                            <td>{{$empresa->razon_social}}</td>
                            <td>{{$empresa->distrito_id}}</td>
                            <td>{{$empresa->direccion}}</td>
                            <td>{{$empresa->ruc}}</td>
                            <td>{{$empresa->telefono}}</td>
                            <td>{{$empresa->correo}}</td>
                            <td>
                                <button class="btn btn-success btn-editar" 
                                data-id="{{$empresa->id}}" 
                                data-nombre="{{$empresa->nombre}}" 
                                data-razon_social="{{$empresa->razon_social}}" 
                                data-distrito_id ="{{$empresa->distrito_id}}"
                                data-direccion ="{{$empresa->direccion}}"
                                data-ruc ="{{$empresa->ruc}}"
                                data-telefono ="{{$empresa->telefono}}"
                                data-correo ="{{$empresa->correo}}"
                                >Editar</button>
                                
                                <button data-id="{{$empresa->id}}" class="btn btn-danger btn-eliminar">Eliminar</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <form method="post" id="empresa_eliminar">
            @csrf
            @method('DELETE')
        </form>

        <div class="modal" tabindex="-1" role="dialog" id="modal_empresa">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="registrar_empresa" action="{{url('mantenimiento/empresa')}}" method="post">
                    @csrf
                    
                  <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                   
                    Nombre: <input type="text" name="nombre" id="nombre" class="form-control">
                    Razon_social: <input type="text" name="razon_social" id="razon_social" class="form-control">
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
                    Distrito 
                        <select class="form-control" name="distrito_id" id="distrito_id">
                            
                        </select>
                    </div>
                    <div class="form-group">
                    Dirección: <input type="text" name="direccion" id="direccion" class="form-control">
                    </div>
                    <div class="form-group">
                    Ruc: <input type="text" maxlength="11" name="ruc" id="ruc" class="form-control"
                    onkeypress="ValidaSoloNumeros();">
                    </div>
                    <div class="form-group">
                    Teléfono: <input type="text" name="telefono" id="telefono" class="form-control">
                    </div>
                    <div class="form-group">
                    Correo: <input type="email" name="correo" id="correo" class="form-control">
                    </div>
                    <div class="form-group">
                  </div>
                  <div class="modal-footer">
                    <button type="button" id="guardar_empresa" class="btn btn-primary">Save changes</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  </div>
                </form>
            </div>
          </div>
        </div>
    </div>
</div>
@endsection
