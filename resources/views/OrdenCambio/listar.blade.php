@extends('layouts.default')
@section('content')

<!-- title -->
<div class="app-title">
    <h1><i class="fa fa-dashboard"></i> Listado de Orden de Cambios </h1>
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

                
            
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@stop