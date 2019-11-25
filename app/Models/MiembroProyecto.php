<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MiembroProyecto extends Model
{
    protected $primaryKey ="Id";
    protected $table = 'miembro_proyecto';
    public $timestamps = false;

    public static function ListarPorProyectoId($ProyectoId)
    {
        return MiembroProyecto::where('ProyectoId',$ProyectoId)->get()->map(function($ObjMiembro){
            $ObjMiembro->Nombre = Usuario::find($ObjMiembro->UsuarioMiembroId)->Usuario;
            return $ObjMiembro;
        });
    }

    //Relations
    public function Usuario(){
        return $this->hasOne('App\Models\Usuario', 'Id','UsuarioMiembroId');
    }

    public function Rol(){
        return $this->hasOne('App\Models\Rol', 'Id','RolId');
    }

    public function Proyecto(){
        return $this->hasOne('App\Models\Proyecto', 'Id','ProyectoId');
    }

    //ADD
    public static function Agregar(MiembroProyecto $ObjMiembroProyecto)
    {
        if($ObjMiembroProyecto->save())
        {
            return $ObjMiembroProyecto->Id;
        }
        return 0;
    }

    public static function Editar(MiembroProyecto $ObjMiembroProyecto)
    {
        if($ObjMiembroProyecto->update())
        {
            return $ObjMiembroProyecto->Id;
        }
        return 0;
    }

    public static function ObtenerPorId($ObjMiembroProyecto)
    {
        return MiembroProyecto::find($ObjMiembroProyecto);
    }

    public static function Eliminar(MiembroProyecto $ObjMiembroProyecto)
    {
        return $ObjMiembroProyecto->delete();
    }

    public static function ListarMiembrosPorProyectoId($ProyectoId)
    {
        $ListadoMiembroProyecto = DB::table('miembro_proyecto')
                                ->join('usuario', 'miembro_proyecto.UsuarioMiembroId', '=', 'usuario.Id')
                                ->select('miembro_proyecto.*', 'usuario.Usuario as Nombre_Usuario')
                                ->where('miembro_proyecto.ProyectoId', $ProyectoId)
                                ->get();
        return $ListadoMiembroProyecto;
        
    }

}

?>