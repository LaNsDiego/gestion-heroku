@extends('layouts.default')
@section('content')

<!-- title -->
<div class="app-title">
    <div>
        <h1>{{$Proyecto->Nombre}}</h1>
        <p>{{$Proyecto->Descripcion}}</p>
    </div>
</div>
<!-- content -->
<div class="row">
  <div class="col-md-12">
    <!-- informacion del proyecto -->
    <div class="tile mb-2">
        <div class="tile-body">
            <div class="w-100 pb-2">
                <div class="d-flex justify-content-between">
                    <span class="text-uppercase">Finalización del proyecto</span>
                    <span class="p-porcentaje">55%</span>
                </div>
                <div class="bs-component mb-2">
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" style="width: 55%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
            <div class="w-100 pb-2">
                <div class="w-100">
                    <ul class="ul-list list-fecha-p">
                        <li>Fecha de inicio: <b>{{$Proyecto->FechaInicio}}</b></li>
                        <li>Fecha de finalización: <b>{{$Proyecto->FechaTermino}}</b></li>
                    </ul>
                </div>
            </div>
            <div class="w-100">
                <span class="text-uppercase">Información general de la tarea</span>
                <div class="row">
                    <div class="col-md-4">
                        <div class="box-task-item"><span>18</span> Abierto</div>
                    </div>
                    <div class="col-md-4">
                        <div class="box-task-item"><span>0</span> En progreso</div>
                    </div>
                    <div class="col-md-4">
                        <div class="box-task-item"><span>0</span> Finalizado</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- informacion del proyecto -->
    <div class="tile p-0">
        <div class="card">
            <div class="card-header card-header-m">
                <span>Metodologia :{{$Metodologia->Nombre}}</span>
            </div>
        </div>
      <div class="w-100">
        <!-- accordion -->
        <div class="accordion">
            <!-- fase -->
            <div class="card">
                @foreach($ListadoFase as $Fase)
                    <!-- header -->
                    <div class="card-header card-header-main d-flex align-items-center">
                        <a href="#" class="ml-3" data-toggle="collapse" data-target="#{{$Fase->Nombre}}">{{$Fase->Nombre}}</a>
                    </div>

                @endforeach
                @foreach($ListadoFase as $Elemento)
                    <!-- body -->
                        <div id="{{$Fase->Nombre}}" class="collapse show__x">
                            <div class="card-body">
                                <!-- accordion elementos -->
                                <div class="accordion" id="AccordionFase1Elementos">
                                    <!-- item -->
                                    <div class="card card-elemento">
                                        <div class="card-header header-elemento">
                                            <a href="#" data-toggle="collapse" data-target="#Fase1Elemento1">Elemento de configuración 1</a>
                                        </div>
                                        <div id="Fase1Elemento1" class="collapse show__x" data-parent="#AccordionFase1Elementos">
                                            <div class="card-body">
                                                <!-- versiones -->
                                                <div class="w-100 pb-2 text-right">
                                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#ModalAgregarVersion"><i class="fa fa-plus" aria-hidden="true"></i>Agregar Versión</button>
                                                </div>
                                                <!-- version -->
                                                <div class="elemento-item">
                                                    <a href="/elemento-configuracion/listar/1">
                                                        <div class="">Versión 1</div>
                                                    </a>
                                                </div>
                                                <!-- version -->

                                                <!-- versiones -->
                                            </div>
                                        </div>
                                    </div>
                                    <!-- item -->

                                </div>
                                <!-- accordion elementos -->
                            </div>
                        </div>
                @endforeach
            </div>
            <!-- fase -->

                <!-- body -->
                <div id="Fase1" class="collapse show__x">
                    <div class="card-body">
                        <!-- accordion elementos -->
                        <div class="accordion" id="AccordionFase1Elementos">
                            <!-- item -->
                            <div class="card card-elemento">
                                <div class="card-header header-elemento">
                                    <a href="#" data-toggle="collapse" data-target="#Fase1Elemento1">Elemento de configuración 1</a>
                                </div>
                                <div id="Fase1Elemento1" class="collapse show__x" data-parent="#AccordionFase1Elementos">
                                    <div class="card-body">
                                        <!-- versiones -->
                                        <div class="w-100 pb-2 text-right">
                                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#ModalAgregarVersion"><i class="fa fa-plus" aria-hidden="true"></i>Agregar Versión</button>
                                        </div>
                                        <!-- version -->
                                        <div class="elemento-item">
                                            <a href="/elemento-configuracion/listar/1">
                                                <div class="">Versión 1</div>
                                            </a>
                                        </div>
                                        <!-- version -->
                                        <!-- version -->
                                        <div class="elemento-item">
                                            <a href="/elemento-configuracion/listar/2">
                                                <div class="">Versión 2</div>
                                            </a>
                                        </div>
                                        <!-- version -->
                                        <!-- versiones -->
                                    </div>
                                </div>
                            </div>
                            <!-- item -->
                            <!-- item -->
                            <div class="card card-elemento">
                                <div class="card-header header-elemento">
                                    <a href="#" data-toggle="collapse" data-target="#Fase1Elemento2">Elemento de configuración 2</a>
                                </div>
                                <div id="Fase1Elemento2" class="collapse" data-parent="#AccordionFase1Elementos">
                                    <div class="card-body">
                                        <!-- versiones -->
                                        <div class="w-100 pb-2 text-right">
                                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#ModalAgregarVersion">Agregar Versión</button>
                                        </div>
                                        <!-- version -->
                                        <div class="elemento-item">
                                            <a href="/elemento-configuracion/listar/1">
                                                <div class="">Versión 1</div>
                                            </a>
                                        </div>
                                        <!-- version -->
                                        <!-- version -->
                                        <div class="elemento-item">
                                            <a href="/elemento-configuracion/listar/2">
                                                <div class="">Versión 2</div>
                                            </a>
                                        </div>
                                        <!-- version -->
                                        <!-- versiones -->
                                    </div>
                                </div>
                            </div>
                            <!-- item -->
                        </div>
                        <!-- accordion elementos -->
                    </div>
                </div>
            </div>
            <!-- fase -->
            <!-- fase -->
            <div class="card">
                <!-- header -->
                <div class="card-header card-header-main d-flex align-items-center">
                    <a href="#" class="ml-3" data-toggle="collapse" data-target="#Fase2">Diseño</a>
                </div>
                <!-- body -->
                <div id="Fase2" class="collapse">
                    <div class="card-body">
                        <!-- accordion elementos -->
                        <div class="accordion" id="AccordionFase2Elementos">
                            <!-- item -->
                            <div class="card card-elemento">
                                <div class="card-header header-elemento">
                                    <a href="#" data-toggle="collapse" data-target="#Fase2Elemento1">Elemento de configuración 1</a>
                                </div>
                                <div id="Fase2Elemento1" class="collapse show__x" data-parent="#AccordionFase2Elementos">
                                    <div class="card-body">
                                        <!-- versiones -->
                                        <div class="w-100 pb-2 text-right">
                                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#ModalAgregarVersion">Agregar Versión</button>
                                        </div>
                                        <!-- version -->
                                        <div class="elemento-item">
                                            <a href="/elemento-configuracion/listar/1">
                                                <div class="">Versión 1</div>
                                            </a>
                                        </div>
                                        <!-- version -->
                                        <!-- version -->
                                        <div class="elemento-item">
                                            <a href="/elemento-configuracion/listar/2">
                                                <div class="">Versión 2</div>
                                            </a>
                                        </div>
                                        <!-- version -->
                                        <!-- versiones -->
                                    </div>
                                </div>
                            </div>
                            <!-- item -->
                            <!-- item -->
                            <div class="card card-elemento">
                                <div class="card-header header-elemento">
                                    <a href="#" data-toggle="collapse" data-target="#Fase2Elemento2">Elemento de configuración 2</a>
                                </div>
                                <div id="Fase2Elemento2" class="collapse" data-parent="#AccordionFase2Elementos">
                                    <div class="card-body">
                                        <!-- versiones -->
                                        <div class="w-100 pb-2 text-right">
                                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#ModalAgregarVersion">Agregar Versión</button>
                                        </div>
                                        <!-- version -->
                                        <div class="elemento-item">
                                            <a href="/elemento-configuracion/listar/1">
                                                <div class="">Versión 1</div>
                                            </a>
                                        </div>
                                        <!-- version -->
                                        <!-- version -->
                                        <div class="elemento-item">
                                            <a href="/elemento-configuracion/listar/2">
                                                <div class="">Versión 2</div>
                                            </a>
                                        </div>
                                        <!-- version -->
                                        <!-- versiones -->
                                    </div>
                                </div>
                            </div>
                            <!-- item -->
                        </div>
                        <!-- accordion elementos -->
                    </div>
                </div>
            </div>
            <!-- fase -->
            <!-- fase -->
            <div class="card">
                <!-- header -->
                <div class="card-header card-header-main d-flex align-items-center">
                    <a href="#" class="ml-3" data-toggle="collapse" data-target="#Fase3">Implementacion</a>
                </div>
                <!-- body -->
                <div id="Fase3" class="collapse">
                <div class="card-body">
                    <!-- accordion elementos -->
                        <div class="accordion" id="AccordionFase3Elementos">
                            <!-- item -->
                            <div class="card card-elemento">
                                <div class="card-header header-elemento">
                                    <a href="#" data-toggle="collapse" data-target="#Fase3Elemento1">Elemento de configuración 1</a>
                                </div>
                                <div id="Fase3Elemento1" class="collapse show__x" data-parent="#AccordionFase3Elementos">
                                    <div class="card-body">
                                        <!-- versiones -->
                                        <div class="w-100 pb-2 text-right">
                                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#ModalAgregarVersion">Agregar Versión</button>
                                        </div>
                                        <!-- version -->
                                        <div class="elemento-item">
                                            <a href="/elemento-configuracion/listar/1">
                                                <div class="">Versión 1</div>
                                            </a>
                                        </div>
                                        <!-- version -->
                                        <!-- version -->
                                        <div class="elemento-item">
                                            <a href="/elemento-configuracion/listar/2">
                                                <div class="">Versión 2</div>
                                            </a>
                                        </div>
                                        <!-- version -->
                                        <!-- versiones -->
                                    </div>
                                </div>
                            </div>
                            <!-- item -->
                            <!-- item -->
                            <div class="card card-elemento">
                                <div class="card-header header-elemento">
                                    <a href="#" data-toggle="collapse" data-target="#Fase3Elemento2">Elemento de configuración 2</a>
                                </div>
                                <div id="Fase3Elemento2" class="collapse" data-parent="#AccordionFase3Elementos">
                                    <div class="card-body">
                                        <!-- versiones -->
                                        <div class="w-100 pb-2 text-right">
                                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#ModalAgregarVersion">Agregar Versión</button>
                                        </div>
                                        <!-- version -->
                                        <div class="elemento-item">
                                            <a href="/elemento-configuracion/listar/1">
                                                <div class="">Versión 1</div>
                                            </a>
                                        </div>
                                        <!-- version -->
                                        <!-- version -->
                                        <div class="elemento-item">
                                            <a href="/elemento-configuracion/listar/2">
                                                <div class="">Versión 2</div>
                                            </a>
                                        </div>
                                        <!-- version -->
                                        <!-- versiones -->
                                    </div>
                                </div>
                            </div>
                            <!-- item -->
                        </div>
                        <!-- accordion elementos -->
                </div>
                </div>
            </div>
            <!-- fase -->
        </div>
        <!-- accordion -->
      </div>
    </div>
  </div>
</div>
<!-- Modal Agregar Version -->
<div class="modal fade" id="ModalAgregarVersion" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Agregar Versión</h5>
        <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- form -->
        <form>
            <div class="form-group">
                <label class="control-label">Fase</label>
                <input type="text" name="fase" id="fase" class="form-control" readonly>
            </div>
            <div class="form-group">
                <label class="control-label">Elemento de configuración</label>
                <input type="text" name="elemento" id="elemento" class="form-control" readonly>
            </div>
            <div class="form-group">
                <label class="control-label">Número de versión</label>
                <input type="text" name="version" class="form-control">
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label class="control-label">Fecha de inicio</label>
                    <input type="date" name="fechainicio" class="form-control">
                </div>
                <div class="form-group col-md-6">
                    <label class="control-label">Fecha de finalización</label>
                    <input type="date" name="fechafinalizacion" class="form-control">
                </div>
            </div>
            <div class="form-group pt-2">
                <button type="submit" class="btn btn-primary text-uppercase">Crear Versión</button>
            </div>
        </form>
        <!-- form -->
      </div>
    </div>
  </div>
</div>
<!-- Modal Agregar Version -->
@stop