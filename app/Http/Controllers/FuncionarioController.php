<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Funcionario;
use App\INSS;
use App\IRRF;
use App\SalarioFamilia;
use App\FolhaLog;
use App\Parametro;
use App\Vale;
use App\Feriado;
use Carbon\Carbon;

class FuncionarioController extends Controller
{
    public function view(){
    	$funcionarios = Funcionario::orderBy('funcionario_inativo','desc')->get();

    	$data = [
    		'funcionarios' => $funcionarios
    	];

    	return view('manage-funcionario',$data);
    }

    public function viewFuncionario(Funcionario $funcionario){
    	$data = [
    		'funcionario' => $funcionario
    	];

    	return view('view-funcionario',$data);
    }

    public function addView(){
    	return view('add-funcionario');
    }

    public function delete(Funcionario $funcionario){

    	$vales = Vale::where('vale_funcionario',$funcionario->funcionario_id)->get();
    	$folhas = FolhaLog::where('folhalog_funcionario',$funcionario->funcionario_id)->get();

    	if((count($vales)>0) or (count($folhas)>0)){
    		return response()->json(['success'=>false, 'msg'=>'O funcionário não pode ser excluído pois existem registros relacionados à ele.']);
    	}

    	if($funcionario->delete()){
    		return response()->json(['success'=>true, 'msg'=>'Funcionário Excluído com sucesso.']);
    	}else{
    		return response()->json(['success'=>false, 'msg'=>'O funcionário não foi excluído devido à um erro.']);
    	}

    }

}
