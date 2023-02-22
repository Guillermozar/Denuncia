<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Denuncia;
class ReporteController extends Controller
{
    public function reporte_denuncia(){

    	$denuncia =Denuncia::all();

    	return view('reporte.denuncias',compact('denuncia'));


    }
}
