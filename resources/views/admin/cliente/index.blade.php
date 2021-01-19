 
 @extends('layouts.app')

@section('content')


<div class="">
    <div class="row">
        <div class="col-4">
            <button class="btn btn-primary" data-toggle = "modal" data-target="#modal_cliente"> Modal
            </button>
        </div>
        <div class="card col-12">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>TIPO CLIENTE</th>
                        <th>ACCIONES</th>
                    </tr>
                </thead>
                <tbody>  
                    @foreach($clientes as $cliente)
                        <tr>
                            <td>{{$cliente->id}}</td>
                            <td>{{$cliente->tipo_cliente}}</td>
                            <td>
                                <button class="btn btn-success btn-editar" 
                                data-id="{{$cliente->id}}" 
                                data-name="{{$cliente->tipo_cliente}}"
                                >Editar</button>
                                
                                <button data-id="{{$cliente->id}}" class="btn btn-danger btn-eliminar">Eliminar</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <form method="post" id="usuario_eliminar">
            @csrf
            @method('DELETE')
        </form>

        <div class="modal" tabindex="-1" role="dialog" id="modal_cliente">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="registrar_cliente" action="{{url('mantenimiento/cliente')}}" method="post">
                    @csrf
                    
                  <div class="modal-header">
                    <h5 class="modal-title">Agregar Cliente</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">

                    <ul class="nav nav-pills bg-nav-pills nav-justified mb-3">
                        
                        <li class="nav-item">
                            <a href="#profile1" data-toggle="tab" aria-expanded="true" class="nav-link rounded-0 active">
                                <i class="mdi mdi-account-circle d-md-none d-block"></i>
                                <span class="d-none d-md-block">Persona</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#settings1" data-toggle="tab" aria-expanded="false" class="nav-link rounded-0">
                                <i class="mdi mdi-settings-outline d-md-none d-block"></i>
                                <span class="d-none d-md-block">Empresa</span>
                            </a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        
                        <div class="tab-pane show active" id="profile1">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <select name="p_departamento" class="form-control">
                                        <option>Tipo documento</option>
                                        @foreach($tipoDocumento as $key => $tipo)
                                            <option value="{{$key}}">{{$tipo}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="text" name="doc_id" class="form-control" placeholder="DNI*">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <input type="text" name="apellidos" class="form-control" placeholder="Apellidos*">
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="text" name="nombres" class="form-control" placeholder="Nombres*">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <input type="text" name="f_nacimiento" class="form-control" placeholder="F. Nacimiento*">
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="text" name="celular" class="form-control" placeholder="Celular*">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <input type="email" name="email" class="form-control" placeholder="Email*">
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="text" name="direccion" class="form-control" placeholder="Dirección*">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <select name="p_departamento" id="departamento_id" class="form-control">
                                        <option>Elige</option>
                                        @foreach($departamentos as $departamento)
                                            <option value="{{$departamento->id}}">{{$departamento->nombre}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <select name="p_provincia" id="provincia_id" class="form-control">
                                        <option>Elige</option>
                                        
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <select name="p_distrio" id="distrito_id" class="form-control">
                                        <option>Elige</option>
                                        
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="settings1">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <input type="text" name="ruc" class="form-control" placeholder="RUC*">
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="text" name="razon_social" class="form-control" placeholder="Razón Social*">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <input type="text" name="nombre_comercial" class="form-control" placeholder="Nombre Comercial*">
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="text" name="ruc" class="form-control" placeholder="Teléfono*">
                                </div>
                            </div>
                            <div class="form-row">
                                
                                <div class="form-group col-md-12">
                                    <input type="text" name="razon_social" class="form-control" placeholder="Dirección*">
                                </div>
                            </div>
                        </div>
                    </div>

                  </div>
                  <div class="modal-footer">
                    <button type="button" id="guardar_cliente" class="btn btn-primary">Save changes</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  </div>
                </form>
            </div>
          </div>
        </div>
    </div>
</div>
@endsection
