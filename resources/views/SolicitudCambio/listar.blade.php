@extends('layouts.default')
@section('content')

<!-- title -->
<div class="app-title">
    <h1><i class="fa fa-dashboard"></i> Listado de Solicitudes de Cambio </h1>
</div>
<!-- content -->
<div class="row">
  <div class="col-md-12">
    <div class="tile">
      <div class="tile-body table-responsive">
        <table class="table table-hover table-bordered" id="TableData">
          <thead>
            <tr>
              <th class="text-center" width="5%">#</th>
              <th class="text-center" width="10%">CODIGO</th>
              <th class="text-center" width="30%">PROYECTO</th>
              <th class="text-center" width="20%">Solicitante</th>
              
              <th class="text-center" width="10%">ESTADO</th>
              <th class="text-center" width="10%">FECHA</th>
              <th class="text-center" width="10%">Acciones</th>
            </tr>
          </thead>
          <tbody>

                @foreach($ListadoSolicitud as $solicitudcambio)
      
                  <tr>
                      <td class="text-center">1</td>
                      <td class="text-left">{{ $solicitudcambio->Codigo }}</td>
                      <td class="text-left">{{ $solicitudcambio->Nombre_Proyecto }}</td>
                      <td class="text-left">{{ $solicitudcambio->Nombre_Solicitante }}</td>
                      <td class="text-center">{{ $solicitudcambio->Estado == 1 ? 'Pendiente':'Realizado' }}</td>
                      <td class="text-center">{{ $solicitudcambio->Fecha }}</td>
                      <td>
                          <a href="../../SolicitudCambio/informe/{{$solicitudcambio->Id}}" class="btn btn-primary btn-sm"><i class="fa fa-pencil fa-2x m-0" aria-hidden="true"></i></a>
                          <a href="./../SolicitudCambio/edit/{{$solicitudcambio->Id}}" class="btn btn-primary btn-sm"><i class="fa fa-pencil fa-2x m-0" aria-hidden="true"></i></a>
                          
                      </td>
                  </tr>
                @endforeach
            
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@stop