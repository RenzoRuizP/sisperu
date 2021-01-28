@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-12 p-0 p-md-1">
        <div class="card">
            <div class="card-body">
                <div class="col-12">
                    <div class="form-group row mb-3">
                        <label class="col-form-label col-sm-4 font-weight-bold text-right">Buscar Paciente:</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control ui-autocomplete-input" placeholder="Nombre, DNI" id="contacto_cita" autocomplete="off">
                        </div>
                        <div class="col-sm-1">
                            <a id="bs-cont" href="" class="btn btn-primary tooltiper tooltipstered"><i class="uil-search"></i></a>
                            <a class="btn btn-primary verContacto tooltiper tooltipstered" href="javascript:void(0)"><i class="uil-plus"></i></a>
                        </div>
                    </div>
                </div>
                <hr>
               
                @isset($paciente)                           
                <h3>{{$paciente->persona->nombre_completo()}}</h3>  <!-- lo que es php y echo se convierte en corchetes dobles-->
                <ul class="nav nav-tabs nav-bordered mb-3">
                    <li class="nav-item">
                        <a href="#personal" data-toggle="tab" aria-expanded="false" class="nav-link active">
                            <span class="d-none d-md-block">Datos Personales</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#antecedentes" data-toggle="tab" aria-expanded="false" class="nav-link">
                            <span class="d-none d-md-block">Anamnesis & Antecedentes</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#adaptacion" data-toggle="tab" aria-expanded="false" class="nav-link">
                            <span class="d-none d-md-block">Adaptación</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#controles" data-toggle="tab" aria-expanded="false" class="nav-link">
                            <span class="d-none d-md-block">Controles</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#historial" data-toggle="tab" aria-expanded="false" class="nav-link">
                            <span class="d-none d-md-block">Historial</span>
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active show" id="personal">
                        <form id="frmDP" class="col-sm-12 form-horizontal">
                            <input type="hidden" name="id_persona" value="">
                            <input type="hidden" name="id_usuario" value="">
                            <input type="hidden" name="clase" value="Evolucion">
                            <input type="hidden" name="action" value="updatePersonalInfo">
                            <div class="form-group row">
                                <label for="" class="col-form-label text-right font-weight-bold col-2">Nombres</label>
                                <div class="col-4">
                                    <input type="text" name="nombres_persona" class="form-control" value="{{$paciente->persona->nombres}}">
                                </div>
                                <label for="" class="col-form-label text-right font-weight-bold col-2">Apellidos</label>
                                <div class="col-4">
                                    <input type="text" name="apellidos_persona" class="form-control" value="{{$paciente->persona->apellidos}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-form-label text-right font-weight-bold col-2">DNI</label>
                                <div class="col-4">
                                    <input type="text" class="form-control" name="dni_persona" value="{{$paciente->persona->numero_documento}}">
                                </div>
                                <label for="" class="col-form-label text-right font-weight-bold col-2">Estado Civil</label>
                                <div class="col-4">
                                    <select name="cboEC" id="cboEC" class="form-control">
                                        <option value="">Elige</option>
                                        @foreach($estadosCiviles as $key => $estadoCivil)
                                            <option value="{{$key}}" 
                                                    {{
                                                        $paciente->persona->estado_civil == $key?'selected':''
                                                    }}
                                                    >{{$estadoCivil}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-form-label text-right font-weight-bold col-2">Fecha Nac.</label>
                                <div class="col-2">
                                    <input type="text" data-provide="datepicker" data-date-format="dd/mm/yyyy" class="form-control" name="fecha_nac_persona" value="{{$paciente->persona->fecha_nacimiento}}">
                                </div>
                                <label for="" class="col-form-label text-right font-weight-bold col-2">Edad</label>
                                <div class="col-1">
                                    <input type="text" disabled class="form-control" value="{{$paciente->persona->edad}}">
                                </div>
                                <label for="" class="col-form-label text-right font-weight-bold col-2">Telefono</label>
                                <div class="col-3">
                                    <input type="text" class="form-control" name="telefono_persona" value="{{$paciente->persona->telefono}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-form-label text-right font-weight-bold col-2">Direccion</label>
                                <div class="col-10">
                                    <input type="text" class="form-control" name="direccion_persona" value="{{$paciente->persona->direccion}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-form-label text-right font-weight-bold col-2">Departamento</label>
                                <input type="hidden" id="id_dep" value="">
                                <div class="col-2">
                                    <select id="departamento" name="departamento_persona" class="form-control">
                                        <option value=""> - Elija - </option>
                                        <option value=""></option>
                                    </select>
                                </div>
                                <label for="" class="col-form-label text-right font-weight-bold col-2">Provincia</label>
                                <input type="hidden" id="id_pro" value="">
                                <div class="col-2">
                                    <select id="provincia" name="provincia_persona" class="form-control">
                                        <option value="{{$departamentos[0]->provincias[0]->id}}"
                                            {{
                                                $paciente->persona->distrito_id == $departamentos[0]->provincias[0]->distritos[0]->id?'selected':''
                                            }}
                                            >{{$departamentos[0]->provincias[0]->distritos[0]->nombre}}
                                        </option>
                                    </select>
                                </div>
                                <label for="" class="col-form-label text-right font-weight-bold col-2">Distrito</label>
                                <!--<input type="hidden" id="id_dis" value="">-->
                                <div class="col-2">
                                    <select id="distrito" name="distrito_persona" class="form-control">
                                      
                                        <option value="{{$paciente->persona->distrito_id}}"
                                            {{
                                                $paciente->persona->distrito_id == $departamentos[0]->provincias[0]->distritos[0]->id?'selected':''
                                            }}
                                            >{{$departamentos[0]->provincias[0]->distritos[0]->nombre}}
                                        </option>
                                    

                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-form-label text-right font-weight-bold col-2">Usa Smartphone?</label>
                                <div class="col-2 pt-1">
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="smart1" name="smart_persona" class="custom-control-input" value="1">
                                        <label class="custom-control-label" for="smart1">Si</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="smart2" name="smart_persona" class="custom-control-input" value="0">
                                        <label class="custom-control-label" for="smart2">No</label>
                                    </div>
                                </div>
                                <label for="" class="col-form-label text-right font-weight-bold col-2">Celular</label>
                                <div class="col-2">
                                    <input type="text" class="form-control" name="celular_persona" value="{{$paciente->persona->celular}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-form-label text-right font-weight-bold col-2">Correo</label>
                                <div class="col-4">
                                    <input type="text" class="form-control" name="email_persona" value="{{$paciente->persona->email}}">
                                </div>
                                <label for="" class="col-form-label text-right font-weight-bold col-2">Profesión</label>
                                <div class="col-4">
                                    <input type="text" name="profesion_persona" class="form-control" value="{{$paciente->persona->profesion}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-form-label text-right font-weight-bold col-2">Acompañante</label>
                                <div class="col-4">
                                    <input type="text"  value="" name="acompanante_persona" class="form-control">
                                </div>
                                <label for="" class="col-form-label text-right font-weight-bold col-2">Celular</label>
                                <div class="col-4">
                                    <input type="text" name="celular_acompanante_persona"  value="" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-form-label text-right font-weight-bold col-2">Tipo Paciente</label>
                                <div class="col-4">
                                    <select name="cboTipoPaciente" name="cboTipoPaciente" class="form-control" >
                                        <option>Elige</option>
                                        @foreach($tiposPacientes as $key => $tipoPaciente)
                                            <option value="{{$key}}" 
                                                {{
                                                    $paciente->tipo_paciente == $key?'selected':''

                                                }}
                                            >{{$tipoPaciente}}
                                        </option>
                                        @endforeach
                                        
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-form-label text-right font-weight-bold col-2">Código Puntos Medical</label>
                                <div class="col-4">
                                    <input type="text"  value="" name="cod_puntos_medical" class="form-control">
                                </div>
                                <label for="" class="col-form-label text-right font-weight-bold col-2">Puntos Disponibles</label>
                                <div class="col-2">
                                    <input type="text" name="puntos_medical" disabled  value="" class="form-control bg-success text-light text-center">
                                </div>
                                <div class="col-2">
                                    <button class="btn btn-outline-primary btn-rounded" type="button" data-toggle="modal" data-target="#modalMovimientos" data-cod_puntos_medical="">Ver Movimientos</button>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-12 text-right">
                                    <button class="btn-primary btn" type="submit">Guardar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane" id="antecedentes">
                        <form id="frmAA">
                            <input type="hidden" name="id_persona" value="">
                            <input type="hidden" name="id_usuario" value="">
                            <input type="hidden" name="clase" value="Evolucion">
                            <input type="hidden" name="action" value="updateAnamnesis">
                            <div class="col-sm-12 form-horizontal">
                                <div class="form-group row">
                                    <label for="" class="col-form-label text-right font-weight-bold col-2">Motivo Consulta</label>
                                    <div class="col-6 pt-1">
                                        <div class="custom-control custom-checkbox custom-control-inline">
                                            <input type="checkbox" id="" name="" value="" class="custom-control-input">
                                            <label class="custom-control-label" for=""></label>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 form-horizontal group-box">
                                <span class="gb-title">Antecedentes</span>
                                <div class="form-group row mt-3">
                                   <div class="col-8">
                                        <div class="row">
                                     
                                            <label class="col-form-label col-3"></label>
                                            <div class="col-3 pt-1">
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="" name="" class="custom-control-input" value="1">
                                                    <label class="custom-control-label" for="">Si</label>
                                                </div>
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="antecedenteNo" name="antecedente" class="custom-control-input" value="0">
                                                    <label class="custom-control-label" for="">No</label>
                                                </div>
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="" name="" class="custom-control-input" value="-1">
                                                    <label class="custom-control-label" for="antecedenteNa">N.A.</label>
                                                </div>
                                            </div>
                                        
                                     
                                        </div>
                                   </div>
                                   <div class="col-4">
                                      
                                            <div class="row">
                                                <label class="col-form-label col-6"></label>
                                                <div class="col-6 pt-1">
                                                    <div class="custom-control custom-checkbox custom-control-inline">
                                                        <input type="checkbox" id="antecedente_2" name="" class="custom-control-input" value="">
                                                        <label class="custom-control-label" for=""></label>
                                                    </div>
                                                    <div class="custom-control custom-checkbox custom-control-inline">
                                                        <input type="checkbox" id="" name=""  class="custom-control-input" value="OI">
                                                        <label class="custom-control-label" for=""></label>
                                                    </div>
                                                               
                                                </div>
                                            </div>
                                      
                                   </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-form-label text-right font-weight-bold col-2">¿Desde cuando oye mal?.</label>
                                    <div class="col-2">
                                        <input type="text" class="form-control" name="fecha_perdida" data-provide="datepicker" data-date-format="dd/mm/yyyy" value="">
                                    </div>
                                    <label for="" class="col-form-label text-right font-weight-bold col-2">¿Por qué vino a este centro?</label>
                                    <div class="col-6">
                                        <input type="text" class="form-control" name="txtMotivo" value="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-form-label text-right font-weight-bold col-2">Audiometria Anterior.</label>
                                    <div class="col-2 mt-1 text-center">
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="audiometria1" name="audiometria" value="1" class="custom-control-input">
                                            <label class="custom-control-label" for="">Si</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="audiometria2" name="audiometria" value="0"  class="custom-control-input">
                                            <label class="custom-control-label" for="audiometria2">No</label>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <input type="text" class="form-control" data-provide="datepicker" name="fecha_audiometria" data-date-format="dd/mm/yyyy" value="">
                                    </div>
                                    
                                </div>
                                <div class="form-group row">
                                    <div class="col-6">
                                        <div class="row">
                                            
                                            <label for="" class="col-form-label text-right font-weight-bold col-4">Operación Anterior O.D.</label>
                                            <div class="col-4 mt-1 text-center">
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="operacion_od1" name="operacion_od" value="1" class="custom-control-input">
                                                    <label class="custom-control-label" for="operacion_od1">Si</label>
                                                </div>
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="operacion_od2" name="operacion_od" value="0" class="custom-control-input">
                                                    <label class="custom-control-label" for="operacion_od2">No</label>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <textarea class="summernote-basic" name="txt_operacion_od"></textarea>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="row">
                                            
                                            <label for="" class="col-form-label text-right font-weight-bold col-4">Operación Anterior O.I.</label>
                                            <div class="col-4 mt-1 text-center">
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="operacion_oi1" name="operacion_oi" value="1" class="custom-control-input">
                                                    <label class="custom-control-label" for="operacion_oi1">Si</label>
                                                </div>
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="operacion_oi2" name="operacion_oi" value="0" class="custom-control-input">
                                                    <label class="custom-control-label" for="operacion_oi2">No</label>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <textarea class="summernote-basic" name="txt_operacion_oi"></textarea>
                                            </div>
                                        </div>
                                        </div>
                                    
                                </div>
                                <div class="form-group row">
                                    <div class="col-6">
                                        <div class="row">
                                            
                                            <label for="" class="col-form-label text-right font-weight-bold col-4">Audifono Previo O.D.</label>
                                            <div class="col-4 mt-1 text-center">
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="audifono_od1" name="audifono_od" value="1" class="custom-control-input">
                                                    <label class="custom-control-label" for="audifono_od1">Si</label>
                                                </div>
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="audifono_od2" name="audifono_od" value="0" class="custom-control-input">
                                                    <label class="custom-control-label" for="audifono_od2">No</label>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                               <div class="form-group row">
                                                   <label for="" class="col-form-label text-right font-weight-bold col-4">Desde</label>
                                                   <div class="col-8">
                                                       <input type="text" class="form-control" name="fecha_audiifono_od" value="" data-provide="datepicker" data-date-format="dd/mm/yyyy" >
                                                   </div>
                                               </div>
                                               <div class="form-group row">
                                                   <label for="" class="col-form-label text-right font-weight-bold col-4">Marca</label>
                                                   <div class="col-8">
                                                       <input type="text" class="form-control" name="txt_marca_od" value="">
                                                   </div>
                                               </div>
                                               <div class="form-group row">
                                                   <label for="" class="col-form-label text-right font-weight-bold col-4">Modelo</label>
                                                   <div class="col-8">
                                                       <input type="text" class="form-control" name="txt_modelo_od" value="">
                                                   </div>
                                               </div>
                                               <div class="form-group row">
                                                   <label for="" class="col-form-label text-right font-weight-bold col-4">Adquirido en</label>
                                                   <div class="col-8">
                                                       <input type="text" class="form-control" name="txt_adquirido_od" value="">
                                                   </div>
                                               </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="row">
                                            
                                            <label for="" class="col-form-label text-right font-weight-bold col-4">Audifono Previo O.I.</label>
                                            <div class="col-4 mt-1 text-center">
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="audifono_oi1" name="audifono_oi" value="1" class="custom-control-input">
                                                    <label class="custom-control-label" for="audifono_oi1">Si</label>
                                                </div>
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="audifono_oi2" name="audifono_oi" value="0" class="custom-control-input">
                                                    <label class="custom-control-label" for="audifono_oi2">No</label>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group row">
                                                   <label for="" class="col-form-label text-right font-weight-bold col-4">Desde</label>
                                                   <div class="col-8">
                                                       <input type="text" class="form-control" name="fecha_audiifono_oi" value="" data-provide="datepicker" data-date-format="dd/mm/yyyy" >
                                                   </div>
                                               </div>
                                               <div class="form-group row">
                                                   <label for="" class="col-form-label text-right font-weight-bold col-4">Marca</label>
                                                   <div class="col-8">
                                                       <input type="text" class="form-control" name="txt_marca_oi" value="">
                                                   </div>
                                               </div>
                                               <div class="form-group row">
                                                   <label for="" class="col-form-label text-right font-weight-bold col-4">Modelo</label>
                                                   <div class="col-8">
                                                       <input type="text" class="form-control" name="txt_modelo_oi" value="">
                                                   </div>
                                               </div>
                                               <div class="form-group row">
                                                   <label for="" class="col-form-label text-right font-weight-bold col-4">Adquirido en</label>
                                                   <div class="col-">
                                                       <input type="text" class="form-control" name="txt_adquirido_oi" value="">
                                                   </div>
                                               </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <label for="" class="form-col-label text-right font-weight-bold col-2">Otros Antecedentes</label>
                                            <div class="col-10">
                                                
                                                <textarea name="txt_otros_antecedentes" class="summernote-basic" cols="30" rows="10"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 form-horizontal group-box">
                                <span class="gb-title">Sintomas</span>
                                <div class="form-group row mt-3">
                                    <div class="col-8">
                                        <div class="row">
                                       
                                            <label class="col-form-label col-2"></label>
                                            <div class="col-4 pt-1">
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="sintomas" name="" class="custom-control-input" value="2">
                                                    <label class="custom-control-label" for="">Bueno</label>
                                                </div>
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="" name="" class="custom-control-input" value="1">
                                                    <label class="custom-control-label" for="">Regular</label>
                                                </div>
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="" name="" class="custom-control-input" value="0">
                                                    <label class="custom-control-label" for="">Malo</label>
                                                </div>
                                            </div>
                                        
                                        </div>
                                   </div>
                                   <div class="col-4">
                                        <h4>Compresión Palabras</h4>
                                       
                                            <div class="row">
                                                <label class="col-form-label col-4"></label>
                                                <div class="col-8 pt-1">
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" id="" name="" class="custom-control-input" value="2">
                                                        <label class="custom-control-label" for="">Bueno</label>
                                                    </div>
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" id="" name="" class="custom-control-input" value="1">
                                                        <label class="custom-control-label" for="">Regular</label>
                                                    </div>
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" id="" name="" class="custom-control-input" value="0">
                                                        <label class="custom-control-label" for="">Malo</label>
                                                    </div>          
                                                </div>
                                            </div>
                                      
                                   </div>
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <div class="col-12 text-right">
                                    <button class="btn btn-primary" type="submit">Guardar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane" id="adaptacion">
                        <form id="frmA" action="">
                            <input type="hidden" name="id_usuario" value="">
                            <input type="hidden" name="id_persona" id="id_persona" value="">
                            <input type="hidden" name="clase" value="Evolucion">
                            <input type="hidden" name="action" value="addAdaptacion">
                            <div class="col-sm-12 form-horizontal group-box">
                                <span class="gb-title">Oído Derecho</span>
                                <div class="form-group row mt-3">
                                    <label for="" class="col-form-label text-right font-weight-bold col-2">Tipo Venta</label>
                                    <div class="col-10 pt-1">
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="tipoVenta1_od" name="tipo_venta_od" class="custom-control-input" value="1">
                                            <label class="custom-control-label" for="tipoVenta1_od">Licitación</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="tipoVenta2_od" name="tipo_venta_od" class="custom-control-input" value="2">
                                            <label class="custom-control-label" for="tipoVenta2_od">Particular</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-form-label text-right font-weight-bold col-2">Tipo</label>
                                    <div class="col-10 pt-1">
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="tipoAdaptacion1_od" name="tipo_adaptacion_od" class="rbTipoAdaptacion custom-control-input" value="1">
                                            <label class="custom-control-label" for="tipoAdaptacion1_od">Audífono</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="tipoAdaptacion2_od" name="tipo_adaptacion_od" class="rbTipoAdaptacion custom-control-input" value="2">
                                            <label class="custom-control-label" for="tipoAdaptacion2_od">AdHear</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="tipoAdaptacion3_od" name="tipo_adaptacion_od" class="rbTipoAdaptacion custom-control-input" value="3">
                                            <label class="custom-control-label" for="tipoAdaptacion3_od">Implante</label>
                                        </div>
                                    </div>
                                </div>
                                <div id="adaptacionImplante" style="display:none">
                                    <h5>Componente Interno</h5>
                                    <div class="form-group row">
                                        <label for="" class="col-form-label text-right font-weight-bold col-2">Serie</label>
                                        <div class="col-4">
                                            <input type="text" class="form-control serie_adaptacion" name="txt_serie_ci_od"  value="">
                                            <input type="hidden" name="is_asigned_ci_od" value=""> 
                                        </div>
                                       
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-form-label text-right font-weight-bold col-2">Tecnología</label>
                                        <div class="col-2">
                                            <input type="text" class="form-control" name="txt_tecnologia_ci_od" value="">
                                        </div>
                                        <label for="" class="col-form-label text-right font-weight-bold col-2">Cirugía</label>
                                        <div class="col-2">
                                            <input type="text" class="form-control" data-provide="datepicker" data-date-format="dd/mm/yyyy" name="txt_cirugia_od" value="">
                                        </div>
                                        <label for="" class="col-form-label text-right font-weight-bold col-2">Doctor</label>
                                        <div class="col-2">
                                            <select name="cboDoctor_od" class="form-control select2" data-toggle="select2">
                                                <option value="0">Elige un Doctor</option>
                                                    <option value="" ></option>
                                            </select>
                                        </div>
                                    </div>
                                    <h5>Componente Externo</h5>
                                    <div class="form-group row">
                                        <label for="" class="col-form-label text-right font-weight-bold col-2">Serie</label>
                                        <div class="col-4">
                                            <input type="text" class="form-control serie_adaptacion" name="txt_serie_ce_od" value="">
                                            <input type="hidden" name="is_asigned_ce_od" value="">
                                        </div>
                                       
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-form-label text-right font-weight-bold col-2">Tecnología</label>
                                        <div class="col-2">
                                            <input type="text" class="form-control" name="txt_tecnologia_ce_od" value="">
                                        </div>
                                        <label for="" class="col-form-label text-right font-weight-bold col-2">Encedido</label>
                                        <div class="col-2">
                                            <input type="text" class="form-control" name="txt_encendido_ce_od" data-provide="datepicker" data-date-format="dd/mm/yyyy" value="">
                                        </div>
                                    </div>
                                    
                                </div>
                                <div id="adaptacionAudifono" style="display:none">
                                    <div class="form-group row">
                                        <label for="" class="col-form-label text-right font-weight-bold col-2">Serie</label>
                                        <div class="col-4">
                                            <input type="text" class="form-control serie_adaptacion" name="txt_serie_audifono_od" value="">
                                            <input type="hidden" name="is_asigned_audifono_od" value="">
                                        </div>
                                       
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-form-label text-right font-weight-bold col-2">Modelo</label>
                                        <div class="col-4">
                                            <input type="text" class="form-control" name="txt_modelo_audifono_od" value="">
                                        </div>
                                        <label for="" class="col-form-label text-right font-weight-bold col-2">Tecnología</label>
                                        <div class="col-4">
                                            <input type="text" class="form-control" name="txt_tecnologia_audifono_od" value="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-form-label text-right font-weight-bold col-2">Adaptación</label>
                                        <div class="col-4">
                                            <input type="text" class="form-control" name="txt_fecha_adaptacion_od" disabled data-provide="datepicker" data-date-format="dd/mm/yyyy" value="">
                                        </div>
                                        
                                        <label for="" class="col-form-label text-right font-weight-bold col-2">Contrato</label>
                                        <div class="col-4">
                                            <a class="btn btn-none verSerie" data-href=""><i class="uil uil-search text-primary h4"></i></a>
                                        </div>
                                        
                                    </div>
                                  
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-form-label text-right font-weight-bold col-2">Detalle Evolución</label>
                                    <div class="col-8">
                                        <textarea name="txt_detalle_od" class="summernote-basic"  cols="30" rows="10"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-form-label text-right font-weight-bold col-2">Próximo Control</label>
                                    <div class="col-4">
                                        <input type="text" class="form-control" name="txt_proximo_od" data-provide="datepicker" data-date-format="dd/mm/yyyy" value="">
                                    </div>
                                    <label for="" class="col-form-label text-right font-weight-bold col-2">Nivel de Satisfacción</label>
                                    <div class="col-4 pt-1">
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="satisfaAdaptacion1_od" name="satisfaAdaptacion_od" class="custom-control-input" value="3">
                                            <label class="custom-control-label" for="satisfaAdaptacion1_od">Bueno</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="satisfaAdaptacion2_od" name="satisfaAdaptacion_od" class="custom-control-input" value="2" >
                                            <label class="custom-control-label" for="satisfaAdaptacion2_od">Regular</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="satisfaAdaptacion3_od" name="satisfaAdaptacion_od" class="custom-control-input" value="1">
                                            <label class="custom-control-label" for="satisfaAdaptacion3_od">Malo</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 form-horizontal group-box">
                                <span class="gb-title">Oído Izquierdo</span>
                                <div class="form-group row mt-3">
                                    <label for="" class="col-form-label text-right font-weight-bold col-2">Tipo Venta</label>
                                    <div class="col-10 pt-1">
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="tipoVenta1_oi" name="tipo_venta_oi" class="custom-control-input" value="1">
                                            <label class="custom-control-label" for="tipoVenta1_oi">Licitación</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="tipoVenta2_oi" name="tipo_venta_oi" class="custom-control-input" value="2">
                                            <label class="custom-control-label" for="tipoVenta2_oi">Particular</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-form-label text-right font-weight-bold col-2">Tipo</label>
                                    <div class="col-10 pt-1">
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="tipoAdaptacion1_oi" name="tipo_adaptacion_oi" class="rbTipoAdaptacion custom-control-input" value="1">
                                            <label class="custom-control-label" for="tipoAdaptacion1_oi">Audífono</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="tipoAdaptacion2_oi" name="tipo_adaptacion_oi" class="rbTipoAdaptacion custom-control-input" value="2" >
                                            <label class="custom-control-label" for="tipoAdaptacion2_oi">AdHear</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="tipoAdaptacion3_oi" name="tipo_adaptacion_oi" class="rbTipoAdaptacion custom-control-input" value="3" >
                                            <label class="custom-control-label" for="tipoAdaptacion3_oi">Implante</label>
                                        </div>
                                    </div>
                                </div>
                                <div id="adaptacionImplante">
                                    <h5>Componente Interno</h5>
                                    <div class="form-group row">
                                        <label for="" class="col-form-label text-right font-weight-bold col-2">Serie</label>
                                        <div class="col-4">
                                            <input type="text" class="form-control serie_adaptacion" name="txt_serie_ci_oi" value="">
                                            <input type="hidden" name="is_asigned_ci_oi" value="">
                                        </div>
                                       
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-form-label text-right font-weight-bold col-2">Tecnología</label>
                                        <div class="col-2">
                                            <input type="text" class="form-control" name="txt_tecnologia_ci_oi" value="">
                                        </div>
                                        <label for="" class="col-form-label text-right font-weight-bold col-2">Cirugía</label>
                                        <div class="col-2">
                                            <input type="text" class="form-control" name="txt_cirugia_oi" data-provide="datepicker" data-date-format="dd/mm/yyyy" value="">
                                        </div>
                                        <label for="" class="col-form-label text-right font-weight-bold col-2">Doctor</label>
                                        <div class="col-2">
                                            <select name="cboDoctor_oi" class="form-control select2" data-toggle="select2">
                                                <option value="0">Elige un Doctor</option>
                                                    
                                                    <option value="" ></option>
                                            </select>
                                        </div>
                                    </div>
                                    <h5>Componente Externo</h5>
                                    <div class="form-group row">
                                        <label for="" class="col-form-label text-right font-weight-bold col-2">Serie</label>
                                        <div class="col-4">
                                            <input type="text" class="form-control serie_adaptacion" name="txt_serie_ce_oi" value="">
                                            <input type="hidden" name="is_asigned_ce_oi" value="">
                                        </div>
                                       
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-form-label text-right font-weight-bold col-2">Tecnología</label>
                                        <div class="col-2">
                                            <input type="text" class="form-control" name="txt_tecnologia_ce_oi" value="">
                                        </div>
                                        <label for="" class="col-form-label text-right font-weight-bold col-2">Encedido</label>
                                        <div class="col-2">
                                            <input type="text" class="form-control" name="txt_encendido_oi" data-provide="datepicker" data-date-format="dd/mm/yyyy" value="">
                                        </div>
                                    </div>
                                    
                                </div>
                                <div id="adaptacionAudifono">
                                    <div class="form-group row">
                                        <label for="" class="col-form-label text-right font-weight-bold col-2">Serie</label>
                                        <div class="col-4">
                                            <input type="text" class="form-control serie_adaptacion" name="txt_serie_audifono_oi" value="">
                                            <input type="hidden" name="is_asigned_audifono_oi" value="">
                                        </div>
                                       
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-form-label text-right font-weight-bold col-2">Modelo</label>
                                        <div class="col-4">
                                            <input type="text" class="form-control" name="txt_modelo_audifono_oi" value="">
                                        </div>
                                        <label for="" class="col-form-label text-right font-weight-bold col-2">Tecnología</label>
                                        <div class="col-4">
                                            <input type="text" class="form-control" name="txt_tecnologia_audifono_oi" value="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-form-label text-right font-weight-bold col-2">Adaptación</label>
                                        <div class="col-4">
                                            <input type="text" class="form-control" name="txt_fecha_adaptacion_oi" disabled data-provide="datepicker" data-date-format="dd/mm/yyyy" value="">
                                        </div>
                                       
                                        <label for="" class="col-form-label text-right font-weight-bold col-2">Contrato</label>
                                        <div class="col-4">
                                            <a class="btn btn-none verSerie "  data-href=""><i class="uil uil-search text-primary h4"></i></a>
                                        </div>
                                       
                                    </div>
                                  
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-form-label text-right font-weight-bold col-2">Detalle Evolución</label>
                                    <div class="col-8">
                                        <textarea name="txt_detalle_oi" class="summernote-basic"  cols="30" rows="10"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-form-label text-right font-weight-bold col-2">Próximo Control</label>
                                    <div class="col-4">
                                        <input type="text" class="form-control" name="txt_proximo_oi" data-provide="datepicker" data-date-format="dd/mm/yyyy" value="">
                                    </div>
                                    <label for="" class="col-form-label text-right font-weight-bold col-2">Nivel de Satisfacción</label>
                                    <div class="col-4 pt-1">
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="satisfaAdaptacion1_oi" name="satisfaAdaptacion_oi" class="custom-control-input" value="3">
                                            <label class="custom-control-label" for="satisfaAdaptacion1_oi">Bueno</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="satisfaAdaptacion2_oi" name="satisfaAdaptacion_oi" class="custom-control-input" value="2">
                                            <label class="custom-control-label" for="satisfaAdaptacion2_oi">Regular</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="satisfaAdaptacion3_oi" name="satisfaAdaptacion_oi" class="custom-control-input" value="1">
                                            <label class="custom-control-label" for="satisfaAdaptacion3_oi">Malo</label>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="form-group row">
                                <div class="col-12 text-right">
                                    <button class="btn btn-outline-info" type="button" id="getContrato">Asignar Series</button>
                                    <button class="btn btn-primary" type="submit">Guardar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane" id="controles">
                        <form id="frmC">
                            <input type="hidden" name="id_usuario" value="">
                            <input type="hidden" name="id_persona" value="">
                            <input type="hidden" name="clase" value="Evolucion">
                            <input type="hidden" name="action" value="addControl">
                            <div class="col-sm-12 form-horizontal group-box">
                                <span class="gb-title">Oído Derecho</span>
                                <div class="form-group row mt-3">
                                    <label for="" class="col-form-label text-right font-weight-bold col-2">Tipo Venta</label>
                                    <div class="col-10 pt-1">
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="tipoVenta1" disabled value="1" name="tipo_venta_od" class="custom-control-input">
                                            <label class="custom-control-label" for="tipoVenta1">Licitación</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="tipoVenta2" disabled value="2" name="tipo_venta_od" class="custom-control-input">
                                            <label class="custom-control-label" for="tipoVenta2">Particular</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-form-label text-right font-weight-bold col-2">Tipo</label>
                                    <div class="col-10 pt-1">
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="tipoAdaptacion1" disabled name="tipo_adaptacion_od" class="custom-control-input">
                                            <label class="custom-control-label" for="tipoAdaptacion1">Audífono</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="tipoAdaptacion2" disabled name="tipo_adaptacion_od" class="custom-control-input">
                                            <label class="custom-control-label" for="tipoAdaptacion2">AdHear</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="tipoAdaptacion3" disabled name="tipo_adaptacion_od" class="custom-control-input">
                                            <label class="custom-control-label" for="tipoAdaptacion3">Implante</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    
                                    <label for="" class="col-form-label text-right font-weight-bold col-2">Detalle Evolución</label>
                                    <div class="col-8">
                                        <textarea name="txt_detalle_od" class="summernote-basic"  cols="30" rows="10"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-form-label text-right font-weight-bold col-2">Próximo Control</label>
                                    <div class="col-4">
                                        <input type="text" class="form-control" data-provide="datepicker" data-date-format="dd/mm/yyyy" value="" name="txt_proximo_od">
                                    </div>
                                    <label for="" class="col-form-label text-right font-weight-bold col-2">Nivel de Satisfacción</label>
                                    <div class="col-4 pt-1">
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="satisfaControl_od1" name="satisfaControl_od" class="custom-control-input" value="3">
                                            <label class="custom-control-label" for="satisfaControl_od1">Bueno</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="satisfaControl_od2" name="satisfaControl_od" class="custom-control-input" value="2">
                                            <label class="custom-control-label" for="satisfaControl_od2">Regular</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="satisfaControl_od3" name="satisfaControl_od" class="custom-control-input" value="1">
                                            <label class="custom-control-label" for="satisfaControl_od3">Malo</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 form-horizontal group-box">
                                <span class="gb-title">Oído Izquierdo</span>
                                <div class="form-group row mt-3">
                                    <label for="" class="col-form-label text-right font-weight-bold col-2">Tipo Venta</label>
                                    <div class="col-10 pt-1">
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="tipoVenta1" disabled name="tipo_venta_oi" class="custom-control-input">
                                            <label class="custom-control-label" for="tipoVenta1">Licitación</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="tipoVenta2" disabled name="tipo_venta_oi" class="custom-control-input">
                                            <label class="custom-control-label" for="tipoVenta2">Particular</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-form-label text-right font-weight-bold col-2">Tipo</label>
                                    <div class="col-10 pt-1">
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="tipoControl1"  disabled name="tipo_adaptacion_oi" class="custom-control-input">
                                            <label class="custom-control-label" for="tipoControl1">Audífono</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="tipoControl2"  disabled name="tipo_adaptacion_oi" class="custom-control-input">
                                            <label class="custom-control-label" for="tipoControl2">AdHear</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="tipoControl3"  disabled name="tipo_adaptacion_oi" class="custom-control-input">
                                            <label class="custom-control-label" for="tipoControl3">Implante</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    
                                    <label for="" class="col-form-label text-right font-weight-bold col-2">Detalle Evolución</label>
                                    <div class="col-8">
                                        <textarea name="txt_detalle_oi" class="summernote-basic"  cols="30" rows="10"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-form-label text-right font-weight-bold col-2">Próximo Control</label>
                                    <div class="col-4">
                                        <input type="text" class="form-control" data-provide="datepicker" data-date-format="dd/mm/yyyy" value="" name="txt_proximo_oi">
                                    </div>
                                    <label for="" class="col-form-label text-right font-weight-bold col-2">Nivel de Satisfacción</label>
                                    <div class="col-4 pt-1">
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="satisfaControl_oi1" name="satisfaControl_oi" class="custom-control-input" value="3">
                                            <label class="custom-control-label" for="satisfaControl_oi1">Bueno</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="satisfaControl_oi2" name="satisfaControl_oi" class="custom-control-input" value="2">
                                            <label class="custom-control-label" for="satisfaControl_oi2">Regular</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="satisfaControl_oi3" name="satisfaControl_oi" class="custom-control-input" value="1">
                                            <label class="custom-control-label" for="satisfaControl_oi3">Malo</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-12 text-right">
                                    <button class="btn btn-primary" type="submit">Guardar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane" id="historial">
                        <div class="col-sm-12 form-horizontal group-box">
                            <span class="gb-title">Datos Personales / Anamnesis & Antecedentes</span>
                            <div class="row mt-3">
                                <div class="col-12 table-responsive">
                                    
                                    <table class="datatable table table-sm table-bordered" data-order="[]">
                                        <thead>
                                            <tr class="bg-primary text-light">
                                                <th>Fecha</th>
                                                <th>Tipo</th>
                                                <th>Usuario</th>
                                                <th>Detalle</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                          
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 form-horizontal group-box">
                            <span class="gb-title">Oído Derecho</span>
                            <div class="form-group row mt-3">
                                <label for="" class="col-form-label text-right font-weight-bold col-2">Tipo Venta</label>
                                <div class="col-10 pt-1">
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="tipoVenta1_od" disabled name="tipo_venta_od" class="custom-control-input" value="1" >
                                        <label class="custom-control-label" for="tipoVenta1_od">Licitación</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="tipoVenta2_od" disabled name="tipo_venta_od" class="custom-control-input" value="2" >
                                        <label class="custom-control-label" for="tipoVenta2_od">Particular</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-form-label text-right font-weight-bold col-2">Tipo</label>
                                <div class="col-10 pt-1">
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="tipoAdaptacion1_od" disabled name="tipo_adaptacion_od" class="rbTipoAdaptacion custom-control-input" value="1" >
                                        <label class="custom-control-label" for="tipoAdaptacion1_od">Audífono</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="tipoAdaptacion2_od" disabled name="tipo_adaptacion_od" class="rbTipoAdaptacion custom-control-input" value="2">
                                        <label class="custom-control-label" for="tipoAdaptacion2_od">AdHear</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="tipoAdaptacion3_od" disabled name="tipo_adaptacion_od" class="rbTipoAdaptacion custom-control-input" value="3">
                                        <label class="custom-control-label" for="tipoAdaptacion3_od">Implante</label>
                                    </div>
                                </div>
                            </div>
                            <div id="adaptacionImplante">
                                <div class="row">
                                    <div class="col-6">
                                        <h5>Componente Interno</h5>
                                        <div class="form-group row">
                                            <label for="" class="col-form-label text-right font-weight-bold col-2">Tecnología</label>
                                            <div class="col-2">
                                                <input disabled type="text" class="form-control" value="">
                                            </div>
                                            
                                        </div>
                                        <div class="form-group row">
                                            <label for="" class="col-form-label text-right font-weight-bold col-2">Serie</label>
                                            <div class="col-4">
                                                <input disabled type="text" class="form-control" value="">
                                            </div>
                                           
                                        </div>
                                        
                                    </div>
                                    <div class="col-6">
                                        
                                        <h5>Componente Externo</h5>
                                        <div class="form-group row">
                                            <label for="" class="col-form-label text-right font-weight-bold col-2">Tecnología</label>
                                            <div class="col-2">
                                                <input disabled type="text" class="form-control" value="">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="" class="col-form-label text-right font-weight-bold col-2">Serie</label>
                                            <div class="col-4">
                                                <input disabled type="text" class="form-control" value="">
                                            </div>
                                           
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="adaptacionAudifono">
                                <div class="form-group row">
                                    <label for="" class="col-form-label text-right font-weight-bold col-2">Modelo</label>
                                    <div class="col-4">
                                        <input disabled type="text" class="form-control" value="">
                                    </div>
                                    <label for="" class="col-form-label text-right font-weight-bold col-2">Tecnología</label>
                                    <div class="col-4">
                                        <input disabled type="text" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-form-label text-right font-weight-bold col-2">Serie</label>
                                    <div class="col-4">
                                        <input disabled type="text" class="form-control" value="">
                                    </div>
                                   
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 table-responsive">
                                    
                                    <table class="table table-sm table-bordered datatable" data-order="[]">
                                        <thead>
                                            <tr class="bg-primary text-light">
                                                <th>Fecha</th>
                                                <th>Tipo</th>
                                                <th>Usuario</th>
                                                <th>Detalle</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          
                                            <tr>
                                                <td></td>
                                                <td>/td>
                                                <td></td>
                                                <td></td>
                                                <td>></td>
                                            </tr>
                                           
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 form-horizontal group-box">
                            <span class="gb-title">Oído Izquierdo</span>
                            <div class="form-group row mt-3">
                                <label for="" class="col-form-label text-right font-weight-bold col-2">Tipo Venta</label>
                                <div class="col-10 pt-1">
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="tipoVenta1_oi" disabled name="tipo_venta_oi" class="custom-control-input" value="1">
                                        <label class="custom-control-label" for="tipoVenta1_oi">Licitación</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="tipoVenta2_oi" disabled name="tipo_venta_oi" class="custom-control-input" value="2">
                                        <label class="custom-control-label" for="tipoVenta2_oi">Particular</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-form-label text-right font-weight-bold col-2">Tipo</label>
                                <div class="col-10 pt-1">
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="tipoAdaptacion1_oi" disabled name="tipo_adaptacion_oi" class="rbTipoAdaptacion custom-control-input" value="1">
                                        <label class="custom-control-label" for="tipoAdaptacion1_oi">Audífono</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="tipoAdaptacion2_oi" disabled name="tipo_adaptacion_oi" class="rbTipoAdaptacion custom-control-input" value="2">
                                        <label class="custom-control-label" for="tipoAdaptacion2_oi">AdHear</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="tipoAdaptacion3_oi" disabled name="tipo_adaptacion_oi" class="rbTipoAdaptacion custom-control-input" value="3" >
                                        <label class="custom-control-label" for="tipoAdaptacion3_oi">Implante</label>
                                    </div>
                                </div>
                            </div>
                            <div id="adaptacionImplante">
                                <div class="row">
                                    <div class="col-6">
                                        <h5>Componente Interno</h5>
                                        <div class="form-group row">
                                            <label for="" class="col-form-label text-right font-weight-bold col-2">Tecnología</label>
                                            <div class="col-2">
                                                <input disabled type="text" class="form-control" value="">
                                            </div>
                                            
                                        </div>
                                        <div class="form-group row">
                                            <label for="" class="col-form-label text-right font-weight-bold col-2">Serie</label>
                                            <div class="col-4">
                                                <input disabled type="text" class="form-control" value="">
                                            </div>
                                           
                                        </div>
                                        
                                    </div>
                                    <div class="col-6">
                                        
                                        <h5>Componente Externo</h5>
                                        <div class="form-group row">
                                            <label for="" class="col-form-label text-right font-weight-bold col-2">Tecnología</label>
                                            <div class="col-2">
                                                <input disabled type="text" class="form-control" value="">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="" class="col-form-label text-right font-weight-bold col-2">Serie</label>
                                            <div class="col-4">
                                                <input disabled type="text" class="form-control" value="">
                                            </div>
                                           
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="adaptacionAudifono">
                                <div class="form-group row">
                                    <label for="" class="col-form-label text-right font-weight-bold col-2">Modelo</label>
                                    <div class="col-4">
                                        <input disabled type="text" class="form-control" value="">
                                    </div>
                                    <label for="" class="col-form-label text-right font-weight-bold col-2">Tecnología</label>
                                    <div class="col-4">
                                        <input disabled type="text" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-form-label text-right font-weight-bold col-2">Serie</label>
                                    <div class="col-4">
                                        <input disabled type="text" class="form-control" value="">
                                    </div>
                                   
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 table-responsive">
                                    
                                    <table class="table table-sm table-bordered datatable"  data-order="[]">
                                        <thead>
                                            <tr class="bg-primary text-light">
                                                <th>Fecha</th>
                                                <th>Tipo</th>
                                                <th>Usuario</th>
                                                <th>Detalle</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                           
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 form-horizontal group-box">
                            <span class="gb-title">Actividad Reciente</span>
                            <div class="row mt-3">
                                <div class="col-12 table-responsive">
                                    <table class="table table-bordered datatable" data-order="[]">
                                        <thead>
                                            <tr class="bg-primary text-light">
                                                <th><b>Fecha</b></th>
                                                <th><b>Detalle</b></th>
                                                <th><b>Accion</b></th>
                                                <th><b>Nº Documento</b></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>

                                          
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
           @endisset
            </div>
        </div>
    </div>
</div>
@endsection
