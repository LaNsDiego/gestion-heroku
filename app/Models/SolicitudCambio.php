<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class SolicitudCambio extends Model
{
    protected $table = 'solicitud_cambio';
    public $timestamps = false;
    protected $primaryKey = 'Id';

    public static function GuardarSolicitud(SolicitudCambio $objsolicitudcambio){
        if($objsolicitudcambio->save()){
            return $objsolicitudcambio->id;
        }
        return 0 ;
        
    }
    public static function EditarSolicitud(SolicitudCambio $objsolicitudcambio)
    {
        if($objsolicitudcambio->save())
        {
            return $objsolicitudcambio->Id;
        }
        return 0;
    }

    public static function ListarSolicitud($UsuarioId){
   
        $solicitudcambio = DB::table('solicitud_cambio')
                            ->join('proyecto', 'solicitud_cambio.Proyectoid', '=', 'Proyecto.Id')
                            ->join('miembro_proyecto', 'solicitud_cambio.MiembroSolicitanteId', '=', 'miembro_proyecto.UsuarioMiembroId')
                            ->join('usuario', 'miembro_proyecto.UsuarioMiembroId', '=', 'usuario.Id')
                            ->select('solicitud_cambio.*', 'proyecto.Nombre as Nombre_Proyecto', 'usuario.Nombre as Nombre_Solicitante', 'usuario.Apellido as Apellido_Solicitante')
                            ->where('solicitud_cambio.MiembroSolicitanteId', $UsuarioId)
                            ->orderBy('solicitud_cambio.Id','DESC')
                            ->get();
       
                            
        return $solicitudcambio;
    }

    public static function ListarSolucitudesAceptadas($UsuarioId){
   
        $solicitudcambio = DB::table('solicitud_cambio')
                            ->join('proyecto', 'solicitud_cambio.Proyectoid', '=', 'Proyecto.Id')
                            ->join('miembro_proyecto', 'solicitud_cambio.MiembroJefeId', '=', 'miembro_proyecto.UsuarioMiembroId')
                            ->join('usuario', 'miembro_proyecto.UsuarioMiembroId', '=', 'usuario.Id')
                            ->select('solicitud_cambio.*', 'proyecto.Nombre as Nombre_Proyecto', 'usuario.Nombre as Nombre_Solicitante')
                            ->where('solicitud_cambio.MiembroJefeId', $UsuarioId)
                            ->where('solicitud_cambio.Estado', 2)
                            ->orderBy('solicitud_cambio.Id','DESC')
                            ->get();
       
                            
        return $solicitudcambio;
    }

    public static function ObtenerSolicitudPorId($SolicitudId){

        $solicitudcambio = DB::table('solicitud_cambio')
                            ->join('usuario', 'solicitud_cambio.MiembroSolicitanteId', '=', 'usuario.Id')
                            ->select('solicitud_cambio.*', 'usuario.Nombre as Usuario_Solicitante')
                            ->where('solicitud_cambio.Id', $SolicitudId)
                            ->first();
                            
        return $solicitudcambio;
    }

    // public static function ListarPorUsuarioId($UsuarioId){
    //     return SolicitudCambio::where('usuariojefeid',$UsuarioId)->get();
    // }


    // public function ListarMetodologiaFase($MetodologiaId){
    //     return SolicitudCambio::where('MetodologiaId',$MetodologiaId)->get();
    // }
}
