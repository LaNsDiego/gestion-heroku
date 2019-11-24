@extends('layouts.default')
@section('content')

    <!-- title -->
    <div class="app-title">
        <div class="row">
            <div class="col-12">
                <h3><span class="font-weight-light">{{$ObjVersion->CronogramaEC->Nombre}}</span> <span class="font-weight-bold">{{$ObjVersion->Version}}</span> </h3>
            </div>
            <div class="col-12">
                <h6> Proyecto : <span class="font-weight-light">{{$Proyecto}}</span> </h6>
                <h6>Fase : <span class="font-weight-light">{{$Fase}}</span> </h6>
            </div>

        </div>
    </div>
    <!-- content -->
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <div class="w-100 pb-2 text-right">
                        <button type="button" class="btn btn-primary btn-sm btn-add-version" data-toggle="modal" data-target="#ModalAgregarVersion" data-cronograma-ecs="1" data-cronograma-ecs-nombre="Especificación de requerimientos" data-cronograma-fase-nombre="Inicio"><i class="fa fa-plus" aria-hidden="true"></i>Agregar Tarea</button>
                    </div>
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="pills-tarea-tab" data-toggle="pill" href="#pills-tarea" role="tab" aria-controls="pills-tarea" aria-selected="true">Tareas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-dependencias-tab" data-toggle="pill" href="#pills-dependencias" role="tab" aria-controls="pills-dependencias" aria-selected="false">Dependencias</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-tarea" role="tabpanel" aria-labelledby="pills-tarea-tab">
                            <table class="table table-hover table-bordered" >
                            <thead>
                            <tr>
                                <th class="text-center" width="25px">#</th>
                                <th>CODIGO</th>
                                <th>RESPONSABLE</th>
                                <th>DESCRIPCION</th>
                                <th>FEC. DE INICIO</th>
                                <th>FEC. DE TERMINO</th>
                                <th class="text-center">% AVANCE</th>
                                <th class="text-center" width="100px">ACCIONES</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($ListadoTarea as $Indice => $ObjTarea)
                                <tr>
                                    <td>{{$Indice + 1}}</td>
                                    <td class="text-center">{{$ObjTarea->Codigo}}</td>
                                    <td>{{$ObjTarea->Miembro->Usuario->Usuario}}</td>
                                    <td>{{$ObjTarea->Descripcion}}</td>
                                    <td>{{$ObjTarea->FechaInicio}}</td>
                                    <td>{{$ObjTarea->FechaTermino}}</td>
                                    <td>{{$ObjTarea->PorcentajeAvance}}%</td>
                                    <td>
                                        <a href="/proyecto/p{{$ObjTarea->Id}}" class="btn btn-success btn-sm text-uppercase">Ver</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="pills-dependencias" role="tabpanel" aria-labelledby="pills-profile-tab">
                            dependencias
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop