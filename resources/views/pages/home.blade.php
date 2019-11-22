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


<!-- <div class="row">
    <div class="col-md-12">
        <form>
            <div class="tile">
                <div class="tile-body">     
                    <div class="form-group">
                        <label class="control-label">Nombre de Proyecto</label>
                        <input class="form-control" name="nombre" type="text">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class="control-label">Fecha de Inicio</label>
                            <input class="form-control" name="fechainicio" type="date">
                        </div>
                        <div class="form-group col-md-6">
                            <label class="control-label">Fecha de Termino</label>
                            <input class="form-control" name="fechatermino" type="date">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Descripción</label>
                        <textarea class="form-control" name="descripcion" rows="4"></textarea>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Responsable</label>
                        <input class="form-control" name="responsable" type="text" readonly>
                    </div>
                </div>
                <div class="tile-footer">
                    <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Guardar</button>
                </div>
            </div>
        </form>
    </div>
</div> -->