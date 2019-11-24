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


}

?>