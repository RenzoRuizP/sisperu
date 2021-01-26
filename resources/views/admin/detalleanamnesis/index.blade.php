@extends('layouts.app')

@section('content')


<div class="">
    <div class="row">
        <div class="col-4">
            <button class="btn btn-primary" data-toggle = "modal" data-target="#modal_detalle_anamnesis"> Modal
            </button>
        </div>
        <div class="card col-12">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>ANAMNESIS</th>
                        <th>NOMBRE CAMPO</th>
                        <th>VALOR</th>
                        <th>ACCIONES</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($detalleAnamnesis as $detalleAnamnesi)
                        <tr>
                            <td>{{$detalleAnamnesi->id}}</td>
                            <td>{{$detalleAnamnesi->anamnesis_id}}</td>
                            <td>{{$detalleAnamnesi->nombreCampo}}</td>
                            <td>{{$detalleAnamnesi->valor}}</td>
                            <td>
                                <button class="btn btn-success btn-editar" data-id="{{$detalleAnamnesi->id}}">Editar</button>
                                <button data-id="{{$detalleAnamnesi->id}}" class="btn btn-danger btn-eliminar">Eliminar</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <form method="post" id="detalle_anamnesis_eliminar">
            @csrf
            @method('DELETE')
        </form>

        <div class="modal" tabindex="-1" role="dialog" id="modal_detalle_anamnesis">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="registrar_detalle_anamnesis" action="{{url('mantenimiento/detalleanamnesis')}}" method="post">
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
                            <select class="form-control" name="anamnesis_id" id="anamnesis_id">
                                <option>Elige anamnesis</option>
                                
                                @foreach($anamnesis as $anamnesi)
                                    <option value="{{$anamnesi->id}}">{{$anamnesi->id}}</option>
                                @endforeach

                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <input type="text" name="nombreCampo" class="form-control" placeholder="Nombre del campo">
                        </div>
                        <div class="form-group col-md-6">
                            <input type="text" name="valor" class="form-control" placeholder="Valor">
                        </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" id="guardar_detalle_anamnesis" class="btn btn-primary">Save changes</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  </div>
                </form>
            </div>
          </div>
        </div>
    </div>
</div>
@endsection
