<?php

namespace App\Http\Controllers;


use App\Models\SolicitudCambio as SolicitudCambio;
use App\Models\Cronograma as Cronograma;
use App\Models\CronogramaFase as CronogramaFase;
use App\Models\CronogramaElementoConfiguracion as CronogramaElementoConfiguracion;
use App\Models\MiembroProyecto as MiembroProyecto;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class OrdenCambioController extends Controller
{
    public function FrmListar(){

        // $ListadoSolicitud = SolicitudCambio::ListarSolicitud(1);
        return view('OrdenCambio.listar');

    }
    public function FrmAgregar(){
        
        $ListadoSolicitud = SolicitudCambio::ListarSolucitudesAceptadas(1);
    
        return view('OrdenCambio.agregar', ['ListadoSolicitud' => $ListadoSolicitud]);
    }


    public function ActFasePorProyecto(Request $request){

        $objSolicitud = SolicitudCambio::ObtenerSolicitudPorId($request->SolicitudCambioId);
        $objCronograma = Cronograma::ObtenerPorProyectoId($objSolicitud->ProyectoId);
        $ListadoFase = CronogramaFase::ListarFasePorCronograma($objCronograma->Id);
        $Fases = '';
        foreach ($ListadoFase as $be) {
            $Fases .= '
                <option value="'.$be->Id.'">'.$be->Nombre.'</option>  
            ';
        }
        return $Fases;
    
      
  
    }

    public function ActMiembrosPorProyeto(Request $request){

        $objSolicitud = SolicitudCambio::ObtenerSolicitudPorId($request->SolicitudCambioId);
        $ListadoProyecto = MiembroProyecto::ListarMiembrosPorProyectoId($objSolicitud->ProyectoId);
        
        $MiembroProyecto = '';
        foreach ($ListadoProyecto as $be) {
            $MiembroProyecto .= '
                <option value="'.$be->Id.'">'.$be->Nombre_Usuario.'</option>  
            ';
        }
        return $MiembroProyecto;
    
      
  
    }

    public function ActECSPorFase(Request $request){

        $ECS = CronogramaElementoConfiguracion::ListarPorCronogramaFaseId($request->FaseId);
        // dd(DB::getQueryLog());
        $combo = '';
        foreach($ECS as $be){
            $combo.= '<option value="'.$be->Id.'">'.$be->Nombre.'</option>';
        }
        return $combo;

    }
    
    
}
