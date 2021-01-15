 
 @extends('layouts.app')

@section('content')


<div class="">
    <div class="row">
        <div class="col-4">
            <button class="btn btn-primary" data-toggle = "modal" data-target="#modal_trabajador"> Modal
            </button>
        </div>
        <div class="card col-12">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>CARGO ID</th>
                        <th>EMPRESA ID</th>
                        <th>SUCURSAL ID</th>
                        <th>PLANILLA</th>
                        <th>HORAS TRABAJADAS</th>
                        <th>SUELDO</th>
                        
                        <th>TIEMPO DE REFRIGERIO</th>
                        <th>PERSONA</th>
                        <th>ACCIONES</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($trabajadores as $trabajador)
                        <tr>
                            <td>{{$trabajador->id}}</td>
                            <td>{{$trabajador->cargo_id}}</td>
                            <td>{{$trabajador->empresa_id}}</td>
                            <td>{{$trabajador->sucursal_id}}</td>
                            <td>{{$trabajador->planilla}}</td>
                            <td>{{$trabajador->horas_trabajo}}</td>
                            <td>{{$trabajador->sueldo}}</td>
                            <td>{{$trabajador->tiempo_refrigerio}}</td>
                            <td>{{$trabajador->persona_id}}</td>
                            <td>
                                <button class="btn btn-success btn-editar" 
                                data-id="{{$trabajador->id}}" 
                                data-cargo_id="{{$trabajador->cargo_id}}" 
                                data-empresa_id="{{$trabajador->empresa_id}}" 
                                data-sucursal_id ="{{$trabajador->sucursal_id}}"
                                data-planilla ="{{$trabajador->planilla}}"
                                data-horas_trabajo ="{{$trabajador->horas_trabajo}}"
                                data-tiempo_refrigerio ="{{$trabajador->tiempo_refrigerio}}"
                                data-persona_id ="{{$trabajador->persona_id}}"
                                >Editar</button>
                                
                                <button data-id="{{$trabajador->id}}" class="btn btn-danger btn-eliminar">Eliminar</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <form method="post" id="trabajador_eliminar">
            @csrf
            @method('DELETE')
        </form>

        <div class="modal" tabindex="-1" role="dialog" id="modal_trabajador">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="registrar_trabajador" action="{{url('mantenimiento/trabajador')}}" method="post">
                    @csrf
                    
                  <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    Cargo ID: <input type="text" name="cargo_id" class="form-control">
                    Empresa ID: <input type="text" name="empresa_id" class="form-control">
                    Sucursal ID: <input type="text" name="sucursal_id" class="form-control">
                    planilla: <input type="text" name="planilla" class="form-control">
                    Sueldo: <input type="text" name="sueldo" class="form-control">
                    Horas de trabajo: <input type="text" name="horas_trabajo" class="form-control">
                    Tiempo refrigerio: <input type="text" name="tiempo_refrigerio" class="form-control">
                    Persona ID: <input type="text" name="persona_id" class="form-control">
                  </div>
                  <div class="modal-footer">
                    <button type="button" id="guardar_trabajador" class="btn btn-primary">Save changes</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  </div>
                </form>
            </div>
          </div>
        </div>
    </div>
</div>
@endsection
