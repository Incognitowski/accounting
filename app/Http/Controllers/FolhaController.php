<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Funcionario;
use App\Vale;
use App\INSS;
use App\IRRF;
use App\SalarioFamilia;
use App\Feriado;
use App\FolhaLog;
use Carbon\Carbon;

class FolhaController extends Controller
{
    public function add(Funcionario $funcionario){
    	$data = [
    		'funcionario' => $funcionario
    	];
    	return view('add-folha',$data);
    }

    public function insert(Request $req){
    	$folhalog = new FolhaLog();
    	$folhalog->folhalog_data = Carbon::now()->toDateString();
    	$folhalog->folhalog_funcionario = $req->input('folhalog_funcionario');

    	
    }
}
