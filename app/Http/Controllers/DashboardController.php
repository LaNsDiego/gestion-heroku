<?php
namespace App\Http\Controllers;

class DashboardController extends Controller
{
    public function Index()
    {
        return view('pages.home');
    }

    public function SinPermiso()
    {
        return view('pages.500');
    }
}
?>