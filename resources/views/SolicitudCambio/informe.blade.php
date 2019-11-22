@extends('layouts.default')
@section('content')

<!-- title -->
<div class="app-title">
    <h1><i class="fa fa-dashboard"></i> Atender Solicitud de  Cambio</h1>
</div>
<!-- content -->
<div class="row">
    <div class="col-md-12">
        <form action="/SolicitudCambio/guardar" method="post">
        <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
        {{-- <input type="hidden" value="{{$Asolicitudcambio->Id}}" name="Id" id="Id"> --}}
            
            <!-- fases -->
            <div class="tile">
                <h3 class="tile-title">Datos del Informe de Cambio</h3>
                <div class="tile-body">
                    <div class="form-group row">
                        <div class="col-md-3">
                            <label class="control-label">Costo Economico </label>
                            <input type="number" value="0.00" step="any" class="form-control text-right" name="Costo_Economico" id="Costo_Economico">
                        </div>
        
                        <div class="col-md-3">
                            <label class="control-label">Tiempo Estimado </label>
                            <input type="number" value="0" step="any" class="form-control text-right" name="Costo_Economico" id="Costo_Economico">
                        </div>

                        <div class="col-md-3">
                            <label class="control-label">Solicitud Asociado: </label>
                            <input type="text" class="form-control text-right" name="Costo_Economico" id="Costo_Economico">
                        </div>
                    </div>
                    <div class="form-group row">

                        <div class="col-md-6">
                            <label class="control-label">Descripcion </label>
                            <textarea name="Descripcion" id="Descripcion" class="form-control text-left" cols="30" rows="6"></textarea>
                        </div>

                        <div class="col-md-6">
                            <label class="control-label">Impacto del Problema </label>
                            <textarea name="ImpactoProblema" id="ImpactoProblema" class="form-control text-left" cols="30" rows="6"></textarea>
                        </div>

                                

        
        
                        <div class="col-md-12">
                        <br><br>
                            <h5 class="tile-title">Elementos de Configuración</h5>
                        </div>
        
        
                    
                        
                       
                        <div class="col-md-3">
                            <label class="control-label">Fases </label>
                            <select name="FaseIdM" id="FaseIdM" onchange="Fnc_ECS()" class="form-control">
                                    {{-- @foreach($AFase as $be)
                                    <option value="{{ $be->Id }}" >{{ $be->Nombre }}</option>
                                    @endforeach --}}
                            </select>
                        </div>
        
                        <div class="col-md-3">
                            <label class="control-label">ESC </label>
                            <select name="ESCIdM" id="ESCIdM" class="form-control">
                               
                            </select>
                        </div>
        
                        <div class="col-md-3">
                            <label class="control-label">Tiempo </label>
                            <input type="number" class="form-control" id="TiempoM" name="TiempoM">
                        </div>
        
                        <div class="col-md-3">
                            <label class="control-label">Costo </label>
                            <input type="number" step="any" class="form-control" id="CostoM" name="CostoM">
                        </div>
        
        
                        <div class="col-md-12">
                            <label class="control-label">Descripcion </label>
                            <textarea name="DescripcionM" id="DescripcionM" cols="30" rows="3" class="form-control"></textarea>
                        </div>
        
                     
                        
                        <div class="col-md-9"></div>
                        <div class="col-md-3">
                            <label class="control-label">. </label>
                            <input type="button" onclick="AddDetalleOrden();" class="form-control btn btn-info" id="" name="" value="AGREGAR">
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
                                    <tr>
                                        <td class="text-center">1</td>
                                        <td class="text-left">Caso de Uso</td>
                                        <td class="text-left">3 Horas</td>
                                        <td class="text-right">S/. 100.00</td>
                                        <td class="text-center">
                                            <a href="" class="btn btn-danger btn-sm"><i class="fa fa-trash fa-2x m-0" aria-hidden="true"></i></a>
                                        </td>
                                    </tr>
        
                                    <tr>
                                        <td class="text-center">1</td>
                                        <td class="text-left">Caso de Uso</td>
                                        <td class="text-left">3 Horas</td>
                                        <td class="text-right">S/. 100.00</td>
                                        <td class="text-center">
                                            <a href="" class="btn btn-danger btn-sm"><i class="fa fa-trash fa-2x m-0" aria-hidden="true"></i></a>
                                        </td>
                                    </tr>
        
                                    <tr>
                                        <td class="text-center">1</td>
                                        <td class="text-left">Caso de Uso</td>
                                        <td class="text-left">3 Horas</td>
                                        <td class="text-right">S/. 100.00</td>
                                        <td class="text-center">
                                            <a href="" class="btn btn-danger btn-sm"><i class="fa fa-trash fa-2x m-0" aria-hidden="true"></i></a>
                                        </td>
                                    </tr>
                           
                                    
                                </tbody>
                            </table>
                        </div>
                        
                        
                    </div>

                    <div class="form-group row">

                        <div class= "col-md-3">
                            <label class="control-label">Estado</label>
                            <select name="Estado" id="Estado" class="form-control">
                                        {{-- <option {{ $Asolicitudcambio->Estado == 1 ? 'selected':'' }} value="1">Pendiente</option>
                                        <option {{ $Asolicitudcambio->Estado == 2 ? 'selected':'' }} value="2">Aprobado</option>
                                        <option {{ $Asolicitudcambio->Estado == 3 ? 'selected':'' }} value="3">Rechazado</option> --}}
                            </select>
                        </div>
                        <div class="col-md-6"></div>
                        <div class= "col-md-3">
                            <label class="control-label">.</label>
                            
                            <button type="button"  data-toggle="modal" onclick="Fnc_ModalInforme()" class="btn btn-info form-control">GENERAR INFORME</button>
                        </div>

                        
                    </div>
                  
                </div>
                <div class="tile-footer">
                    <button class="btn btn-primary text-uppercase" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Crear Solicitud</button>
                </div>
            </div>
        </form>
    </div>
</div>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Informe de Cambio </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="">
            
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>


<script>
    function Fnc_ModalInforme(){
        $('#exampleModal').modal('show');
        Fnc_ECS();
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


    function AddDetalleOrden(){

        var FaseId = $('#FaseIdM').val();
        var ESCId = $('#ESCIdM').val();
        var Tiempo = $('#TiempoM').val();
        var Costo = $('#CostoM').val();
        var Descripcion = $('#DescripcionM').val();
        var _token = $('#_token').val();
        
        var MM_search = "AddDetelleOrden";

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
                url:   '../../SolicitudCambio/detalleinforme',
                type:  'POST',
                beforeSend: function () {
                
                },
                success:  function (data) {
                    // console.log(data);
                    $('#BlockDetalleInforme').html(data);
                }
            });
    
    }

    
</script>



@stop