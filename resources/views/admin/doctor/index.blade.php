 
 @extends('layouts.app')

@section('content')


<div class="">
    <div class="row">
        <div class="col-4">
            <button class="btn btn-primary" data-toggle = "modal" data-target="#modal_doctor"> Modal
            </button>
        </div>
        <div class="card col-12">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>ESPECIALIDAD</th>
                        <th>CMP</th>
                        <th>ACCIONES</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($doctores as $doctor)
                        <tr>
                            <td>{{$doctor->id}}</td>
                            <td>{{$doctor->especialidad}}</td>
                            <td>{{$doctor->cmp}}</td>
                            <td>
                                <button class="btn btn-success btn-editar" 
                                data-id="{{$doctor->id}}" 
                                data-cargo_id="{{$doctor->especialidad}}" 
                                data-empresa_id="{{$doctor->cmp}}"
                                >Editar</button>
                                
                                <button data-id="{{$doctor->id}}" class="btn btn-danger btn-eliminar">Eliminar</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <form method="post" id="doctor_eliminar">
            @csrf
            @method('DELETE')
        </form>

        <div class="modal" tabindex="-1" role="dialog" id="modal_doctor">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="registrar_doctor" action="{{url('mantenimiento/doctor')}}" method="post">
                    @csrf
                    
                  <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <div class="form-group row">
                        <div class="col-sm-10">
                            Especialidad: <input type="text" name="especialidad" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10">
                            CMP: <input type="text" name="cmp" class="form-control">
                        </div>
                    </div>
                   
                  </div>
                  <div class="modal-footer">
                    <button type="button" id="guardar_doctor" class="btn btn-primary">Save changes</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  </div>
                </form>
            </div>
          </div>
        </div>
    </div>
</div>
@endsection
