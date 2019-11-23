<?php

namespace App\Http\Controllers;

use App\Models\Cronograma;
use App\Models\CronogramaElementoConfiguracion;
use App\Models\CronogramaFase;
use App\Models\ElementoConfiguracion;
use App\Models\Metodologia;
use Illuminate\Http\Request;
use App\Models\Proyecto as Proyecto;
use Illuminate\Support\Facades\Log;

class ProyectoController extends Controller
{
    public function Listar(){
        $ListadoProyecto = Proyecto::get();

        return view('Proyecto.listar',[
            'ListadoProyecto' => $ListadoProyecto
        ]);
    }

    public function Ver($ProyectoId)
    {
        $Cronograma = Cronograma::ObtenerPorProyectoId($ProyectoId);
        $Proyecto = Proyecto::ObtenerPorId($ProyectoId);
        return view('Proyecto.Ver',[
            'Proyecto' => $Proyecto,
            'Cronograma' => $Cronograma,
            'ListadoFase' => CronogramaFase::ListarPorCronogramaId($Cronograma->Id),
            'Metodologia' => Metodologia::ObtenerPorId($Proyecto->MetodologiaId)
        ]);
    }

    public function FrmAgregar(){
        $ListadoMetodoliga = Metodologia::Listar();
        return view('Proyecto.agregar',[
            'ListadoMetodologia' => $ListadoMetodoliga
        ]);
    }

    public function ActAgregar( Request $request){
        $ObjProyecto = new Proyecto();
        $ObjProyecto->Codigo = "PRJ002";
        $ObjProyecto->Nombre = $request->input('Nombre');
        $ObjProyecto->UsuarioJefeId = $request->input('UsuarioJefeId');
        $ObjProyecto->FechaInicio = $request->input('FechaInicio');
        $ObjProyecto->FechaTermino = $request->input('FechaTermino');
        $ObjProyecto->MetodologiaId = $request->input('MetodologiaId');
        $ObjProyecto->Descripcion = $request->input('Descripcion');
        $ObjProyecto->Estado = 'En Progreso';
        $UsuarioId = $ObjProyecto->UsuarioJefeId;
        if(Proyecto::Agregar($ObjProyecto) > 0){ //PROYECTO
            $Cronograma = new Cronograma();
            $Cronograma->ProyectoId= $ObjProyecto->id;
            $Cronograma->FechaInicio= $request->input('FechaInicio');
            $Cronograma->FechaTermino= $request->input('FechaTermino');

            if(Cronograma::Agregar($Cronograma) > 0){ //CRONOGRAMA
                $ListadoFaseNombre = $request->input('FasesNombre');
                Log::info($request->all());
                if(isset($ListadoFaseNombre)){

                    Log::info($ListadoFaseNombre);
                    foreach($ListadoFaseNombre  as $FaseNombre){

                        $ObjCronogramaFase = new CronogramaFase();
                        $ObjCronogramaFase->CronogramaId = $Cronograma->id;
                        $ObjCronogramaFase->Nombre = $FaseNombre;
                        if(CronogramaFase::Agregar($ObjCronogramaFase) > 0){//CRONOGRAMA FASE
                            $ListadoElementoNombre = $request->input($ObjCronogramaFase->Nombre);
                            Log::info($request->all());
                            foreach( $ListadoElementoNombre as $ElementoNombre){
                                Log::info('Elemento n°:'.$ElementoNombre);
                                $ElementoConfiguracion = new CronogramaElementoConfiguracion();
                                $ElementoConfiguracion->Codigo = $ElementoNombre;
                                $ElementoConfiguracion->Nombre = $ElementoNombre;
                                $ElementoConfiguracion->CronogramaFaseId = $ObjCronogramaFase->Id;
                                if(CronogramaElementoConfiguracion::Agregar($ElementoConfiguracion) > 0){ // CRONOGRAMA ELEMENTO CONFIGURACION
                                    Log::info('ECS creada con id:'.$ElementoConfiguracion->Id);
//                                return redirect()->route('proyecto.listar');
                                }

                            }
                        }
                    }
                }

            }

        }
        return redirect()->route('proyecto.listar');
    }

}

?>