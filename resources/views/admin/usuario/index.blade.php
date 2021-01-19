 
 @extends('layouts.app')

@section('content')


<div class="">
    <div class="row">
        <div class="col-4">
            <button class="btn btn-primary" data-toggle = "modal" data-target="#modal_usuario"> Modal
            </button>
        </div>
        <div class="card col-12">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>NOMBRE</th>
                        <th>PASSWORD</th>
                        <th>TRABAJADOR ID</th>
                        <th>ACCIONES</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($usuarios as $usuario)
                        <tr>
                            <td>{{$usuario->id}}</td>
                            <td>{{$usuario->name}}</td>
                            <td>{{$usuario->password}}</td>
                            <td>
                                {{$user_->trabajador->persona->nombres.' '.$user_->trabajador->persona->apellidos}}
                            </td>
                            <td>
                                <button class="btn btn-success btn-editar" 
                                data-id="{{$usuario->id}}" 
                                data-name="{{$usuario->name}}" 
                                data-password="{{$usuario->password}}" 
                                data-trabajador_id ="{{$usuario->trabajador_id}}"
                                >Editar</button>
                                
                                <button data-id="{{$usuario->id}}" class="btn btn-danger btn-eliminar">Eliminar</button>
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

        <div class="modal" tabindex="-1" role="dialog" id="modal_usuario">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="registrar_usuario" action="{{url('mantenimiento/usuario')}}" method="post">
                    @csrf
                    
                  <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                        <div class="form-group">
                        Tipo Documento 
                            <select name="tipo_documento" class="form-control">
                                <option>Elige</option>
                                <option value="0">RUC</option>
                                <option value="1">DNI</option>
                                <option value="2">CARNET DE EXTRANJERIA</option>
                            </select>
                        
                    </div>
                    <div class="form-group">
                        número de documento <input type="text" id="numero_documento" name="numero_documento" class="form-control" maxlength="11" onkeypress="ValidaSoloNumeros();">
                    </div>
                    <div class="form-group">
                        Nombres: <input type="text" name="nombres" class="form-control" disabled="true">
                    </div>
                    <div class="form-group">
                        Apellidos: <input type="text" name="apellidos" class="form-control" disabled="true">
                    </div>
                    <div class="form-group">
                        Nombre usuario: <input type="text" name="nombre_usuario" class="form-control">
                    </div>
                    <div class="form-group">
                        Password: <input type="text" name="repetir_clave" class="form-control">
                    </div>
                    <div class="form-group">
                        Repetir password: <input type="text" name="repetir_clave" class="form-control">
                    </div>

                    <!--
                    <div class="form-group">
                    </div>
                    <div class="form-group">
                        Nombre: <input type="text" name="name" class="form-control">
                    </div>
                    <div class="form-group">
                        Password: <input type="text" name="clave" class="form-control">
                    </div>
                    <div class="form-group">
                    Trabajador   <select class="form-control" name="trabajador_id">
                                <option>Elige</option>                        
                                @foreach($trabajadores as $trabajador)
                                    <option value="{{$trabajador->id}}">{{$trabajador->persona->nombres}}</option>
                                @endforeach
                            </select>
                    </div>
                    -->
                  </div>
                  <div class="modal-footer">
                    <button type="button" id="guardar_usuario" class="btn btn-primary">Save changes</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  </div>
                </form>
            </div>
          </div>
        </div>
    </div>
</div>
@endsection
