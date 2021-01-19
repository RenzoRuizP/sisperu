 
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
                        <th>CARGO</th>
                        <th>EMPRESA</th>
                        <th>SUCURSAL</th>
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
                            <td>{{$trabajador->cargo->nombre}}</td>
                            <td>{{$trabajador->empresa->nombre}}</td>
                            <td>{{$trabajador->sucursal->nombre}}</td>
                            <td>{{$trabajador->planilla}}</td>
                            <td>{{$trabajador->horas_trabajo}}</td>
                            <td>{{$trabajador->sueldo}}</td>
                            <td>{{$trabajador->tiempo_refrigerio}}</td>
                            <td>
                                {{$trabajador->persona->nombres.' '.$trabajador->persona->apellidos}}
                            </td>
                            <td>
                                <button class="btn btn-success btn-editar" 
                                data-id="{{$trabajador->id}}" 
                                data-cargo_id="{{$trabajador->cargo_id}}" 
                                data-empresa_id="{{$trabajador->empresa_id}}" 
                                data-sucursal_id ="{{$trabajador->sucursal_id}}"
                                data-planilla ="{{$trabajador->planilla}}"
                                data-horas_trabajo ="{{$trabajador->horas_trabajo}}"
                                data-sueldo ="{{$trabajador->sueldo}}"
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

                    <div class="form-group">
                    Cargo   <select class="form-control" name="cargo_id" id="cargo_id">
                                <option>Elige</option>                        
                                @foreach($cargos as $cargo)
                                    <option value="{{$cargo->id}}">{{$cargo->nombre}}</option>
                                @endforeach
                            </select>
                    </div>
                    <div class="form-group">
                        Empresa ID
                            <select name="empresa_id" class="form-control">
                                <option>Elige</option>
                                @foreach($empresas  as $empresa)
                                <option value="{{$empresa->id}}">{{$empresa->nombre}}</option>
                                @endforeach
                            </select>
                    </div>
                    <div class="form-group">
                        Sucursal <select id="sucursal_id" name= "sucursal_id" class="form-control">
                                <option>Elige</option>
                                @foreach($sucursales as $sucursal);
                                    <option value="{{$sucursal->id}}">{{$sucursal->nombre}}</option>
                                @endforeach
                            </select>
                    </div>
                    <div class="form-group">
                        planilla: <input type="text" name="planilla" maxlength="1" class="form-control" onkeypress="ValidaSoloNumeros();">
                    </div>
                    <div class="form-group">
                        Sueldo: <input type="text" name="sueldo" class="form-control">
                    </div>
                    <div class="form-group">
                        Horas de trabajo: <input type="text" name="horas_trabajo" class="form-control">
                    </div>
                    <div class="form-group">
                        Tiempo refrigerio: <input type="text" name="tiempo_refrigerio" class="form-control">
                    </div>
                    <div class="form-group">
                        Persona
                            <select class="form-control" name="persona_id">
                                <option>Elige</option>
                                @foreach($personas as $persona)

                                    <option value="{{$persona->persona_id}}">{{$persona->nombres}}</option>
                                @endforeach
                            </select>
                         
                    </div>
                    <div class="form-group">
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
