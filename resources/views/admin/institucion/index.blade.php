 
 @extends('layouts.app')

@section('content')


<div class="">
    <div class="row">
        <div class="col-4">
            <button class="btn btn-primary" data-toggle = "modal" data-target="#modal_institucion"> Modal
            </button>
        </div>
        <div class="card col-12">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>TIPO INSTITUCIÓN</th>
                        <th>NOMBRE</th>
                        <th>TELÉFONO</th>
                        <th>DISTRITO</th>
                        <th>DIRECCIÓN</th>
                        <th>EMPRESA ID</th>
                        <th>ACCIONES</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($instituciones as $institucion)
                        <tr>
                            <td>{{$institucion->id}}</td>

                            @php
                                if($institucion->tipo_institucion == 1)
                                    echo '<td>CLÍNICA</td>';
                                if($institucion->tipo_institucion == 2)
                                    echo '<td>HOSPITAL</td>';
                                if($institucion->tipo_institucion == 3)
                                    echo '<td>CONSULTORIO PARTICULAR</td>';
                            @endphp
 
                            <td>{{$institucion->nombre}}</td>
                            <td>{{$institucion->telefono}}</td>
                            <td>{{$institucion->distrito->nombre}}</td>
                            <td>{{$institucion->direccion}}</td>
                            <td>{{$institucion->empresa->nombre}}</td>
                            <td>
                                <button class="btn btn-success btn-editar" 
                                data-id="{{$institucion->id}}" 
                                data-tipo_institucion="{{$institucion->tipo_institucion}}" 
                                data-nombre="{{$institucion->nombre}}" 
                                data-telefono="{{$institucion->telefono}}" 
                                data-distrito_id ="{{$institucion->distrito_id}}"
                                data-direccion ="{{$institucion->direccion}}"
                                data-empresa_id ="{{$institucion->empresa_id}}"
                                >Editar</button>
                                
                                <button data-id="{{$institucion->id}}" class="btn btn-danger btn-eliminar">Eliminar</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <form method="post" id="institucion_eliminar">
            @csrf
            @method('DELETE')
        </form>

        <div class="modal" tabindex="-1" role="dialog" id="modal_institucion">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="registrar_institucion" action="{{url('mantenimiento/institucion')}}" method="post">
                    @csrf
                    
                  <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <select name="tipo_institucion" ID="tipo_institucion" class="form-control">
                                    <option>Tipo institución</option>
                                @foreach($tipoInstituciones as $key => $tipo)
                                    <option value="{{$key}}">{{$tipo}}</option>
                                @endforeach
                            </select>
                            
                        </div>
                        <div class="col-sm-6">
                            <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre*">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <input type="text" name="telefono" id="telefono" class="form-control" placeholder="Teléfono*">
                            
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            Departamento
                            <select name="departamento_id" id="departamento_id" class="form-control">
                                <option>Elige</option>
                                @foreach($departamentos as $departamento)
                                    <option value="{{$departamento->id}}">{{$departamento->nombre}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            Provincia
                            <select name="provincia_id" id="provincia_id" class="form-control">
                                
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            Distrito
                            <select name="distrito_id" id="distrito_id" class="form-control">
                                
                            </select>
                        </div>
                    </div>
                    <div class="form-row">     
                        <div class="form-group col-md-12">
                            <input type="text" name="direccion" class="form-control" placeholder="Dirección*">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <select name="empresa_id" id="empresa_id" class="form-control">
                                <option>Empresa</option>
                                @foreach($empresas as $empresa)
                                    <option value="{{$empresa->id}}">{{$empresa->nombre}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" id="guardar_institucion" class="btn btn-primary">Save changes</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  </div>
                </form>
            </div>
          </div>
        </div>
    </div>
</div>
@endsection
