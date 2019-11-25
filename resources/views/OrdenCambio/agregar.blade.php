@extends('layouts.default')
@section('content')

<!-- title -->
<div class="app-title">
    <h1><i class="fa fa-dashboard"></i> Crear Informe de Solicitud de Cambio</h1>
</div>
<!-- content -->
<div class="row">
    <div class="col-md-12">
        <form action="/SolicitudCambio/createinforme" method="post">
        <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
        {{-- <input type="hidden" value="{{$Asolicitudcambio->Id}}" name="Id" id="Id"> --}}
            
            <!-- fases -->
            <div class="tile">
                <h3 class="tile-title">Datos del Informe de Cambio</h3>
                <div class="tile-body">
                    <div class="form-group row">

                        <div class="col-md-3">
                            <label class="control-label">Solicitud Asociado: </label>
                            <select onchange="Fnc_FasePorProyecto();" name="SolicitudCambioId" id="SolicitudCambioId" class="form-control">
                                @foreach ($ListadoSolicitud as $be)
                            <option value="{{ $be->Id }}">{{ $be->Codigo }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-3">
                            <label class="control-label">Fecha de Aprobación: </label>
                            <input type="date" readonly class="form-control text-center" value="<?=date('Y-m-d')?>" name="Fecha" id="Fecha">
                        </div>

                        <div class="col-md-3">
                            <label class="control-label">Fecha de Inicio: </label>
                            <input type="date"  class="form-control text-center" value="" name="FechaInicio" id="FechaInicio">
                        </div>

                        <div class="col-md-3">
                            <label class="control-label">Fecha de Termino: </label>
                            <input type="date"  class="form-control text-center" value="" name="FechaTermino" id="FechaTermino">
                        </div>

   
                        
                    </div>
                    <div class="form-group row">

                        <div class="col-md-12">
                            <label class="control-label">Descripcion </label>
                            <textarea name="Descripcion" id="Descripcion" class="form-control text-left" cols="30" rows="4"></textarea>
                        </div>

                                

        
        
                        <div class="col-md-12">
                        <br><br>
                            <h5 class="tile-title">DETALLE DE INFORME</h5>
                        </div>
        
        
                    
                        
                       
                        <div class="col-md-3">
                            <label class="control-label">Fases </label>
                            <select name="FaseIdM" id="FaseIdM" onchange="Fnc_ECSPorFase()" class="form-control">
                                   
                            </select>
                        </div>
        
                        <div class="col-md-3">
                            <label class="control-label">ECS </label>
                            <select name="ECSIdM" id="ECSIdM" class="form-control">
                               
                            </select>
                        </div>
        
                        <div class="col-md-4">
                            <label class="control-label">Responsable </label>
                            <select name="Responsable" id="Responsable" class="form-control">
                                
                            </select>
                        </div>
        
                        <div class="col-md-2">
                                <label class="control-label">. </label>
                                <input type="button" onclick="AddDetalleOrden();" class="form-control btn btn-info" id="" name="" value="AGREGAR">
                            </div>
        
        
                        <div class="col-md-12">
                            <label class="control-label">Descripcion </label>
                            <textarea name="DescripcionM" id="DescripcionM" cols="30" rows="3" class="form-control"></textarea>
                        </div>
        
                     
                        
                        
                        
        
        
                        <div class="col-md-12">
                        <br>
                        </div>
                        
                        <div class="table-responsive" id="BlockDetalleInforme">
                            <table class="table">
                                <thead>
                                    <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">ECS</th>
                                    <th class="text-center">Tiempo</th>
                                    <th class="text-center">Costo</th>
                                    <th class="text-center">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                  
                               
                                    
                                </tbody>
                            </table>
                        </div>
                        
                        
                    </div>

                    
             
                  
                </div>
                <div class="tile-footer">
                    <button class="btn btn-primary text-uppercase" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Guardar Orden de Cambio</button>
                </div>
            </div>
        </form>
    </div>
</div>




<script>
    


    
    function Fnc_FasePorProyecto(){

            var SolicitudCambioId = $('#SolicitudCambioId').val();
            var _token = $('#_token').val();
            var parametros = {
                        "SolicitudCambioId" : SolicitudCambioId,
                        "_token" : _token, 
                    };

            $.ajax({

                data:  parametros,
                url:   '../../OrdenCambio/FasePorProyecto',
                type:  'POST',
                beforeSend: function () {
                
                },
                success:  function (data) {
                    
                    $('#FaseIdM').html(data);
                    Fnc_ECSPorFase();
                    Fnc_MiembrosPorProyecto();
                }
            });

    }
    
    function Fnc_ECSPorFase(){
        var FaseId = $('#FaseIdM').val();
        var _token = $('#_token').val();
        var parametros = {
                    "FaseId" : FaseId,
                    "_token" : _token, 
                };

        $.ajax({

            data:  parametros,
            url:   '../../OrdenCambio/ECSPorFase',
            type:  'POST',
            beforeSend: function () {
            
            },
            success:  function (data) {
                
                $('#ECSIdM').html(data);
            }
        });

    }

    function Fnc_MiembrosPorProyecto(){

        var SolicitudCambioId = $('#SolicitudCambioId').val();
        var _token = $('#_token').val();
        var parametros = {
                    "SolicitudCambioId" : SolicitudCambioId,
                    "_token" : _token, 
                };

        $.ajax({

            data:  parametros,
            url:   '../../OrdenCambio/MiembrosPorProyeto',
            type:  'POST',
            beforeSend: function () {
            
            },
            success:  function (data) {
                
                $('#Responsable').html(data);
            }
        });

    }



    function Fnc_ECS(){

        var FaseId = $('#FaseIdM').val();
        var _token = $('#_token').val();
        var parametros = {
                    "FaseId" : FaseId,
                    "_token" : _token, 
                };

        $.ajax({

            data:  parametros,
            url:   '../../SolicitudCambio/ViewESC',
            type:  'POST',
            beforeSend: function () {
            
            },
            success:  function (data) {
                // console.log(data);
                $('#ESCIdM').html(data);
            }
        });

    }


    function AddDetalleCambio(){

        var FaseId = $('#FaseIdM').val();
        var ESCId = $('#ESCIdM').val();
        var Tiempo = $('#TiempoM').val();
        var Costo = $('#CostoM').val();
        var Descripcion = $('#DescripcionM').val();
        var _token = $('#_token').val();
        
        var MM_search = "AddDetelleCambio";

        var parametros = {
                            "FaseId" : FaseId,
                            "ESCId" : ESCId,
                            "Tiempo" : Tiempo,
                            "Costo" : Costo,
                            "Descripcion" : Descripcion,
                            "MM_search" : MM_search, 
                            "_token" : _token, 
                        };

        $.ajax({

                data:  parametros,
                url:   '../../SolicitudCambio/AgregarDetalleInforme',
                type:  'POST',
                beforeSend: function () {
                
                },
                success:  function (data) {
                    // console.log(data);
                    $('#BlockDetalleInforme').html(data);
                    Tiempo_Costo();
                }
            });
    
    }

    function Fnc_DeleteDetalleInforme(ESCId){

    
        var _token = $('#_token').val();

        var parametros = {
                            "ESCId" : ESCId,
                            "_token" : _token, 
                        };

        $.ajax({

                data:  parametros,
                url:   '../../SolicitudCambio/EliminarDetalleInforme',
                type:  'POST',
                beforeSend: function () {
                
                },
                success:  function (data) {
                    // console.log(data);
                    $('#BlockDetalleInforme').html(data);
                    Tiempo_Costo();
                }
            });

    }

    function Tiempo_Costo(){

            var MM_search = "AddDetelleCambio";
            var _token = $('#_token').val();
            var parametros = {
                                
                                "MM_search" : MM_search, 
                                "_token" : _token, 
                            };

            $.ajax({

                    data:  parametros,
                    url:   '../../SolicitudCambio/TiempoSolicitud',
                    type:  'POST',
                    dataType: 'json',
                    beforeSend: function () {
                    
                    },
                    success:  function (data) {
                     
                        $('#Tiempo').val(data.Tiempo);
                        $('#CostoEconomico').val(data.Costo);
                    }
                });

    }

    
</script>



@stop