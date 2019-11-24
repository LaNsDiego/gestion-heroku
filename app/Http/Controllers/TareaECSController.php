<?php


namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\MiembroProyecto;
use App\Models\TareaECS;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class TareaECSController extends Controller
{
    public function Agregar(Request $request){
        Log::info($request->all());
        $ObjTarea = new TareaECS();
        $ObjTarea->Descripcion = $request->input('TxtNombre');
        $ObjTarea->Codigo = $request->input('TxtCodigo');
        $ObjTarea->Justificacion = $request->input('TxtJustificacion');
        $ObjTarea->FechaInicio = $request->input('TxtFechaInicio');
        $ObjTarea->FechaTermino = $request->input('TxtFechaTermino');
        $ObjTarea->MiembroResponsableId = $request->input('CmbMiembroResponsableId');
        $ObjTarea->VersionECSId = $request->input('TxtVersionECSId');
        $ObjTarea->PorcentajeAvance = 0;
        $ObjTarea->UrlEvidencia = 'github.com/lansdiego/prj1/evidencia1.php';
        TareaECS::Agregar($ObjTarea);
        return redirect()->back();
    }
}