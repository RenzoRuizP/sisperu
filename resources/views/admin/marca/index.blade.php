@extends('layouts.app')

@section('content')


                    <div class="">
                        <div class="row">
                            <div class="col-4">
                                <button class="btn btn-primary" data-toggle = "modal" data-target="#modal_marca"> Modal
                                </button>
                            </div>
                            <div class="card col-12">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>NOMBRE</th>
                                            <th>IMAGEN</th>
                                            <th>ACCIONES</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($marcas as $marca)
                                            <tr>
                                                <td>{{$marca->id}}</td>
                                                <td>{{$marca->nombre}}</td>
                                                <td>{{$marca->imagen}}</td>
                                                <td>
                                                    <button class="btn btn-success btn-editar" data-nombre="{{$marca->nombre}}" data-id="{{$marca->id}}" data-imagen="{{$marca->imagen}}">Editar</button>
                                                    <button data-id="{{$marca->id}}" class="btn btn-danger btn-eliminar">Eliminar</button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <form method="post" id="marca_eliminar">
                                @csrf
                                @method('DELETE')
                            </form>

                            <div class="modal" tabindex="-1" role="dialog" id="modal_marca">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <form id="registrar_marca" action="{{url('mantenimiento/marca')}}" method="post">
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
                                                Nombre: <input type="text" name="nombre" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-10">
                                                imagen: <input type="file" name="imagen" id="img_input" class="form-control-file">
                                                <div> 
                                                    <img src="" id="img_preview">
                                                </div>
                                            </div>
                                        </div>
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" id="guardar_marca" class="btn btn-primary">Save changes</button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                      </div>
                                    </form>
                                </div>
                              </div>
                            </div>
                        </div>
                    </div>
@endsection
