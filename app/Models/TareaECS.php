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
    public function Miembro(){
        return $this->hasOne('App\Models\MiembroProyecto', 'Id','MiembroResponsableId')->with('Usuario');
    }
}
