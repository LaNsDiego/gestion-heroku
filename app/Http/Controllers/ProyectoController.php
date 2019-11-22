<?php

namespace App\Http\Controllers;

use App\Models\Cronograma;
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
            'ListadoFase' => CronogramaFase::where('CronogramaId',$Cronograma->Id)->get(),
            'Metodologia' => Metodologia::find($Proyecto->MetodologiaId)
        ]);
    }

    public function FrmAgregar(){
        $ListadoMetodoliga = Metodologia::Listar();
        return view('Proyecto.agregar',[
            'ListadoMetodologia' => $ListadoMetodoliga
        ]);
    }

    public function ActAgregar(Request $request){
//        dd($request);
        $Proyecto = new Proyecto();
        $Proyecto->Codigo = "PRJ002";
        $Proyecto->Nombre = $request->input('Nombre');
        $Proyecto->UsuarioJefeId = $request->input('UsuarioJefeId');
        $Proyecto->FechaInicio = $request->input('FechaInicio');
        $Proyecto->FechaTermino = $request->input('FechaTermino');
        $Proyecto->MetodologiaId = $request->input('MetodologiaId');
        $Proyecto->Descripcion = $request->input('Descripcion');
        $Proyecto->Estado = 'En Progreso';
        $UsuarioId = $Proyecto->UsuarioJefeId;
        if(Proyecto::Agregar($Proyecto) > 0){ //PROYECTO
            $Cronograma = new Cronograma();
            $Cronograma->ProyectoId= $Proyecto->id;
            $Cronograma->FechaInicio= $request->input('FechaInicio');
            $Cronograma->FechaTermino= $request->input('FechaTermino');

            if(Cronograma::Agregar($Cronograma) > 0){ //CRONOGRAMA
                $ListadoCronogramaFaseId = $request->input('FasesId');
                Log::info('Cronograma creado');
                if(isset($ListadoCronogramaFaseId)){
                    foreach($ListadoCronogramaFaseId  as $CronogramaFaseId){
                        Log::info('Fase n° :'.$CronogramaFaseId);
                        $CronogramaFase = new CronogramaFase();
                        $CronogramaFase->CronogramaId = $Cronograma->id;
                        $CronogramaFase->Nombre = $CronogramaFaseId;
                        if(CronogramaFase::Agregar($CronogramaFase) > 0){//CRONOGRAMA FASE

                            $ListadoElementoId = $request->input($CronogramaFase->Nombre);
                            Log::info('imprimiendo array  elementos');
                            Log::info($ListadoElementoId);
                            foreach( $ListadoElementoId as $ElementoNombre){
                                Log::info('Elemento n°:'.$ElementoNombre);
                                $ElementoConfiguracion = new ElementoConfiguracion();
                                $ElementoConfiguracion->Codigo = "ele".$ElementoNombre;
                                $ElementoConfiguracion->Nombre = $ElementoNombre;
                                $ElementoConfiguracion->FaseId = $CronogramaFase->id;
                                if(CronogramaElementoConfiguracion::Agregar($ElementoConfiguracion) > 0){ // CRONOGRAMA ELEMENTO CONFIGURACION
                                    Log::info('ECS creada con id:'.$ElementoConfiguracion->id);
//                                return redirect()->route('proyecto.listar');
                                }else{
//                                return view('proyecto.listar',['ListadoProyecto ' => Proyecto::ListarPorUsuarioId(1)]);
//                                    return redirect()->action('ProyectoController@Listar');
                                }
//
                            }
                        }else{
////                        return view('proyecto.listar',['ListadoProyecto ' => Proyecto::ListarPorUsuarioId($UsuarioId)]);
                        }
                    }
                }

            }else{
//                return response()->json($Cronograma);
//                return view('proyecto.listar',['ListadoProyecto ' => Proyecto::ListarPorUsuarioId($UsuarioId)]);
            }

        }else{
        }
        return redirect()->route('proyecto.listar');
    }

}

?>