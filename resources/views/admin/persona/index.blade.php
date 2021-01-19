 
 @extends('layouts.app')

@section('content')


<div class="">
    <div class="row">
        <div class="col-4">
            <button class="btn btn-primary" data-toggle = "modal" data-target="#modal_persona"> Modal
            </button>
        </div>
        <div class="card col-12">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>NOMBRES</th>
                        <th>APELLIDOS</th>
                        <th>FECHA NAC.</th>
                        <th>TELÉFONO</th>
                        <th>EMAIL</th>
                        <th>DIRECCIÓN</th>
                        <th>TIPO DOC.</th>
                        <th>NÚMERO DE DOC.</th>
                        <th>SEXO</th>
                        <th>ACCIONES</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($personas as $persona)

                        <tr>
                            <td>{{$persona->id}}</td>
                            <td>{{$persona->nombres}}</td>
                            <td>{{$persona->apellidos}}</td>
                            <td>{{$persona->fecha_nacimiento}}</td>
                            <td>{{$persona->telefono}}</td>
                            <td>{{$persona->email}}</td>
                            <td>{{$persona->direccion}}</td>

                            @php 
                                if($persona->tipo_documento == 0)
                                echo '<td>RUC</td>';
                                if($persona->tipo_documento == 1)
                                 echo '<td>DNI</td>';
                                if($persona->tipo_documento == 2)
                                 echo '<td>CARNET DE EXTRANJERIA</td>';
                            @endphp

                            <td>{{$persona->numero_documento}}</td>

                            @php
                                if($persona->sexo == 0)
                                    echo '<td>Hombre</td>';
                                else
                                    echo '<td>Mujer</td>';
                            @endphp
                            
                            <td>
                                <button class="btn btn-success btn-editar" 
                                data-id="{{$persona->id}}" 
                                data-nombres="{{$persona->nombres}}" 
                                data-apellidos="{{$persona->apellidos}}" 
                                data-fecha_nacimiento ="{{$persona->fecha_nacimiento}}"
                                data-telefono ="{{$persona->telefono}}"
                                data-email ="{{$persona->email}}"
                                data-direccion ="{{$persona->direccion}}"
                                data-tipo_documento ="{{$persona->tipo_documento}}"
                                data-numero_documento ="{{$persona->numero_documento}}"
                                data-sexo ="{{$persona->sexo}}"
                                >Editar</button>
                                
                                <button data-id="{{$persona->id}}" class="btn btn-danger btn-eliminar">Eliminar</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <form method="post" id="persona_eliminar">
            @csrf
            @method('DELETE')
        </form>

        <div class="modal" tabindex="-1" role="dialog" id="modal_persona">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="registrar_persona" action="{{url('mantenimiento/persona')}}" method="post">
                    @csrf
                    
                  <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">

                    <div class="form-group">
                        Nombres: <input type="text" name="nombres" class="form-control">
                    </div>
                    <div class="form-group">
                        Apellidos: <input type="text" name="apellidos" class="form-control">
                    </div>
                    <div class="form-group">
                        Fecha Nacimiento: <input type="date" name="fecha_nacimiento" class="form-control">
                    </div>
                    <div class="form-group">
                        Teléfono <input type="text" name="telefono" class="form-control">
                    </div>
                    <div class="form-group">
                        Email <input type="email" name="email" class="form-control">
                    </div>
                    <div class="form-group">
                        Dirección <input type="text" name="direccion" class="form-control">
                    </div>
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
                        número de documento <input type="text" name="numero_documento" class="form-control" maxlength="11" onkeypress="ValidaSoloNumeros();">
                    </div>
                    <div class="form-group">
                        Sexo 
                            <select name="sexo" class="form-control">
                                <option>Elige</option>
                                <option value="0">Hombre</option>
                                <option value="1">Mujer</option>
                            </select>
                     
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" id="guardar_persona" class="btn btn-primary">Save changes</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  </div>
                </form>
            </div>
          </div>
        </div>
    </div>
</div>
@endsection
