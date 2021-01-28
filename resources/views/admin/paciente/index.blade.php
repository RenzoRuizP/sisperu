@extends('layouts.app')

@section('content')


<div class="">
    <div class="row">
        <div class="col-4">
            <button class="btn btn-primary" data-toggle = "modal" data-target="#modal_paciente"> Modal
            </button>
        </div>
        <div class="card col-12">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>TIPO PACIENTE</th>
                        <th>NOMBRE PERSONA</th>
                        <th>ACCIONES</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pacientes as $paciente)
                        <tr>
                            <td>{{$paciente->id}}</td>
                            
                                @php

                                    if($paciente->tipo_paciente == 1)
                                        echo '<td>ACTIVO LABORAL</td>';
                                    if($paciente->tipo_paciente == 2)
                                        echo '<td>JUBILADO COMPLACIENTE</td>';
                                    if($paciente->tipo_paciente == 3)
                                        echo '<td>NIÑO</td>';
                                    if($paciente->tipo_paciente == 4)
                                        echo '<td>CC</td>';
                                    if($paciente->tipo_paciente == 5)
                                        echo '<td>IP</td>';
                                @endphp
                         
                            <td>{{$paciente->persona->nombres}}</td>
                            <td>
                                <button class="btn btn-success btn-editar" data-id="{{$paciente->id}}" data-tipo_paciente="{{$paciente->tipo_paciente}}">Editar</button>
                                <button data-id="{{$paciente->id}}" class="btn btn-danger btn-eliminar">Eliminar</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <form method="post" id="paciente_eliminar">
            @csrf
            @method('DELETE')
        </form>

        <div class="modal" tabindex="-1" role="dialog" id="modal_paciente">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="registrar_paciente" action="{{url('mantenimiento/paciente')}}" method="post">
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
                            <select name="tipo_paciente" class="form-control">
                                <option>- Elige - </option>
                                @foreach($tiposPacientes as $key => $tipoPaciente)
                                    <option value="{{$key}}">{{$tipoPaciente}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <select class="form-control" name="persona_id" id="persona_id">
                                <option>Elige persona</option>
                                
                                @foreach($personas as $persona)
                                    <option value="{{$persona->id}}">{{$persona->nombres}}</option>
                                @endforeach

                            </select>
                        </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" id="guardar_paciente" class="btn btn-primary">Save changes</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  </div>
                </form>
            </div>
          </div>
        </div>
    </div>
</div>
@endsection
