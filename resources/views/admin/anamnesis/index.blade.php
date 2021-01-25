@extends('layouts.app')

@section('content')


<div class="">
    <div class="row">
        <div class="col-4">
            <button class="btn btn-primary" data-toggle = "modal" data-target="#modal_anamnesis"> Modal
            </button>
        </div>
        <div class="card col-12">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>FECHA</th>
                        <th>USUARIO ID</th>
                        <th>PACIENTE ID</th>
                        <th>ACCIONES</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($anamnesis as $anamnesi)
                        <tr>
                            <td>{{$anamnesi->id}}</td>
                            <td>{{$anamnesi->fecha}}</td>
                            <td>
                                {{$anamnesi->user->trabajador->persona->nombres." ".$anamnesi->user->trabajador->persona->apellidos}}
                            </td>
                            <td>
                                {{$anamnesi->paciente->persona->nombres." ".$anamnesi->paciente->persona->apellidos}}</td>
                            <td>
                                <button class="btn btn-success btn-editar" data-id="{{$anamnesi->id}}">Editar</button>
                                <button data-id="{{$anamnesi->id}}" class="btn btn-danger btn-eliminar">Eliminar</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <form method="post" id="anamnesis_eliminar">
            @csrf
            @method('DELETE')
        </form>

        <div class="modal" tabindex="-1" role="dialog" id="modal_anamnesis">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="registrar_anamnesis" action="{{url('mantenimiento/anamnesis')}}" method="post">
                    @csrf
                    
                  <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <input type="date" name="fecha" id="fecha" class="form-control">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <select class="form-control" name="usuario_id" id="usuario_id">
                                <option>Elige usuario</option>
                                
                                @foreach($usuarios as $usuario)
                                    <option value="{{$usuario->id}}">{{$usuario->name}}</option>
                                @endforeach

                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <select class="form-control" name="paciente_id" id="paciente_id">
                                <option>Elige paciente</option>
                                
                                @foreach($pacientes as $paciente)
                                    <option value="{{$paciente->id}}">{{$paciente->persona->nombres}}</option>
                                @endforeach

                            </select>
                        </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" id="guardar_anamnesis" class="btn btn-primary">Save changes</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  </div>
                </form>
            </div>
          </div>
        </div>
    </div>
</div>
@endsection
