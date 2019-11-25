<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Usuario as Usuario;

class UsuarioController extends Controller
{
    public function Listar(){
        $ListadoUsuario = Usuario::Listar();
        return view('Usuario.Listar',[
            'ListadoUsuario' => $ListadoUsuario
        ]);
    }

    public function FrmAgregar()
    {
        return view('Usuario.Agregar');
    }

    public function FrmEditar($UsuarioId)
    {
        $ObjUsuario = Usuario::ObtenerPorId($UsuarioId);
        return view('Usuario.Editar', ['Usuario' => $ObjUsuario]);
    }

    public function ActAgregar(Request $request)
    {
        try
        {
            $ObjUsuario = new Usuario();
            $ObjUsuario->Nombre = $request->input('TxtNombre');
            $ObjUsuario->Apellido = $request->input('TxtApellido');
            $ObjUsuario->Correo = strtolower($request->input('TxtCorreo'));
            $ObjUsuario->Clave = bcrypt('gestion');
            if(Usuario::Agregar($ObjUsuario) > 0)
            {
                return redirect()->action('UsuarioController@Listar');
            }
        } 
        catch (\Illuminate\Database\QueryException $e)
        {
            return redirect()->action('UsuarioController@Listar');
        }
    }

    public function ActEditar(Request $request)
    {
        $ObjUsuario = Usuario::ObtenerPorId($request->TxtId);
        $ObjUsuario->Nombre = $request->input('TxtNombre');
        $ObjUsuario->Apellido = $request->input('TxtApellido');
        if(Usuario::Editar($ObjUsuario) > 0)
        {
            return redirect()->action('UsuarioController@Listar');
        }
    }
}

?>