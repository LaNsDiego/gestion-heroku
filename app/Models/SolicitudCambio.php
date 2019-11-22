<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class SolicitudCambio extends Model
{
    protected $table = 'solicitud_cambio';
    public $timestamps = false;
    protected $primaryKey = 'Id';

    public function Guardar(){
        if($this->save()){
            return $this->id;
        }
        return 0 ;
        
    }
    public static function Editar(SolicitudCambio $objsolicitudcambio)
    {
        if($objsolicitudcambio->save())
        {
            return $objsolicitudcambio->Id;
        }
        return 0;
    }

    public static function Listar($UsuarioId){
   
        $solicitudcambio = DB::table('solicitud_cambio')
                            ->join('proyecto', 'solicitud_cambio.Proyectoid', '=', 'Proyecto.Id')
                            ->select('solicitud_cambio.*', 'proyecto.Nombre as Nombre_Proyecto')
                            ->where('solicitud_cambio.MiembroSolicitanteId', $UsuarioId)
                            ->orderBy('solicitud_cambio.Id','DESC')
                            ->get();
       
                            
        return $solicitudcambio;
    }

    public static function ObtenerPorId($SolicitudId){

        $solicitudcambio = DB::table('solicitud_cambio')
                            ->join('usuario', 'solicitud_cambio.MiembroSolicitanteId', '=', 'usuario.Id')
                            ->select('solicitud_cambio.*', 'usuario.Usuario as Usuario_Solicitante')
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
