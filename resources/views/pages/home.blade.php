@extends('layouts.default')
@section('content')
<!-- title -->
<div class="app-title">
    <h1><i class="fa fa-dashboard"></i> Escritorio</h1>
</div>
<!-- content -->
<div class="row">
  <div class="col-md-12">
    <div class="tile">
      <div class="tile-body table-responsive">
        <table class="table table-hover table-bordered" id="TableData">
          <thead>
            <tr>
              <th class="text-center" width="25px">#</th>
              <th>NOMBRE</th>
              <th>FECHA DE INICIO</th>
              <th>FECHA DE TERMINO</th>
              <th class="text-center" width="100px">Acciones</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>Proyecto X</td>
              <td>12/12/2019</td>
              <td>12/12/2019<br></td>
              <td class="text-center">
                <!-- accciones -->
                <a href="" class="btn btn-primary btn-sm"><i class="fa fa-pencil fa-2x m-0" aria-hidden="true"></i></a>
                <a href="" class="btn btn-success btn-sm Eliminar"><i class="fa fa-calendar fa-2x m-0" aria-hidden="true"></i></a>
                <!-- accciones -->
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@stop