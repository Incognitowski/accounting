<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Funcionario;
use App\Vale;
use App\INSS;
use App\IRRF;
use App\SalarioFamilia;
use App\Feriado;
use Carbon\Carbon;

class FolhaController extends Controller
{
    public function add(Funcionario $funcionario){
    	$data = [
    		'funcionario' => $funcionario
    	];
    	return view('add-folha',$data);
    }
}
