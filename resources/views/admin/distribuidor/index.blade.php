 
 @extends('layouts.app')

@section('content')


<div class="">
    <div class="row">
        <div class="col-4">
            <button class="btn btn-primary" data-toggle = "modal" data-target="#modal_distribuidor"> Modal
            </button>
        </div>
        <div class="card col-12">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>tipo</th>
                        <th>EMPRESA ID</th>
                        <th>ACCIONES</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($distribuidores as $distribuidor)
                        <tr>
                            <td>{{$distribuidor->id}}</td>
                            
                                @php
                                    if($distribuidor->tipo == 1)
                                        echo '<td>A</td>';
                                    if($distribuidor->tipo == 2)
                                        echo '<td>B</td>';
                                    if($distribuidor->tipo == 3)
                                        echo '<td>C</td>';
                                    if($distribuidor->tipo == 4)
                                        echo '<td>PARTNER</td>';
                                @endphp
                            
                            <td>{{$distribuidor->empresa->nombre}}</td>
                            <td>
                                <button class="btn btn-success btn-editar" 
                                data-id="{{$distribuidor->id}}" 
                                data-tipo="{{$distribuidor->tipo}}" 
                                data-empresa_id="{{$distribuidor->empresa_id}}" 
                                >Editar</button>
                                
                                <button data-id="{{$distribuidor->id}}" class="btn btn-danger btn-eliminar">Eliminar</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <form method="post" id="distribuidor_eliminar">
            @csrf
            @method('DELETE')
        </form>

        <div class="modal" tabindex="-1" role="dialog" id="modal_distribuidor">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="registrar_distribuidor" action="{{url('mantenimiento/distribuidor')}}" method="post">
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
                            <select name="tipo" id="tipo" class="form-control">
                                    <option>Tipo ditribuidor</option>
                                @foreach($tipoDistribuidores as $key => $tipo)
                                    <option value="{{$key}}">{{$tipo}}</option>
                                @endforeach
                            </select>
                            
                        </div>
                        <div class="col-sm-6">
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
                    <button type="button" id="guardar_distribuidor" class="btn btn-primary">Save changes</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  </div>
                </form>
            </div>
          </div>
        </div>
    </div>
</div>
@endsection
