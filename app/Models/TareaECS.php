<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TareaECS extends Model
{
    protected $table = "tarea_ecs";
    protected $primaryKey = "Id";
    public $timestamps = false;

    public static function ListarPorVersionECSId($VersionICSId){
//        DB::enableQueryLog();
        $ListadoTarea = TareaECS::where('VersionECSId',$VersionICSId)->get();
//        dd(DB::getQueryLog());
        return $ListadoTarea;
    }


    //Relations
    public static function Agregar(TareaECS $ObjTarea)
    {
        return $ObjTarea->save();
    }

    public static function Editar(TareaECS $ObjTarea)
    {
        return $ObjTarea->save();
    }

    public function Miembro(){
        return $this->hasOne('App\Models\MiembroProyecto', 'Id','MiembroResponsableId')->with('Usuario');
    }

    public function Padre(){
        return $this->hasOne('App\Models\TareaECS', 'Id','TareaPadreId');
    }
}
