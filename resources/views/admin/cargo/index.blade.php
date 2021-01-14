@extends('layouts.app')

@section('content')


<div class="">
    <div class="row">
        <div class="col-4">
            <button class="btn btn-primary" data-toggle = "modal" data-target="#modal_cargo"> Modal
            </button>
        </div>
        <div class="card col-12">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>NOMBRE</th>
                        <th>ACCIONES</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cargos as $cargo)
                        <tr>
                            <td>{{$cargo->id}}</td>
                            <td>{{$cargo->nombre}}</td>
                            <td>
                                <button class="btn btn-success btn-editar" data-nombre="{{$cargo->nombre}}" data-id="{{$cargo->id}}">Editar</button>
                                <button data-id="{{$cargo->id}}" class="btn btn-danger btn-eliminar">Eliminar</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <form method="post" id="cargo_eliminar">
            @csrf
            @method('DELETE')
        </form>

        <div class="modal" tabindex="-1" role="dialog" id="modal_cargo">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="registrar_cargo" action="{{url('mantenimiento/cargo')}}" method="post">
                    @csrf
                    
                  <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    Nombre: <input type="text" name="nombre">
                  </div>
                  <div class="modal-footer">
                    <button type="button" id="guardar_cargo" class="btn btn-primary">Save changes</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  </div>
                </form>
            </div>
          </div>
        </div>
    </div>
</div>
@endsection
