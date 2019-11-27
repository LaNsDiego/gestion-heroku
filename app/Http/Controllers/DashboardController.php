<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function Index()
    {
        return view('pages.home');
    }

    public function Reportes()
    {
        $JefeId = \Auth::user()->Id;
        $date = date('Y-m-d');
        $aceptados = DB::table('orden_cambio')->where('JefeId', $JefeId)->count();
        $pendientes = DB::table('orden_cambio')->where('Estado', '=', 'Pendiente')->where('JefeId', $JefeId)->count();
        $atrasados = DB::table('orden_cambio')->where('FechaTermino', '<', $date)->where('JefeId', $JefeId)->count();
        $terminados = DB::table('orden_cambio')->where('Estado', '=', 'Terminado')->where('JefeId', $JefeId)->count();
        return view('pages.reportes', [
            'datos' => array(
                'aceptados' => $aceptados,
                'pendientes' => $pendientes,
                'atrasados' => $atrasados,
                'terminados' => $terminados
            )
        ]);
    }
}
?>