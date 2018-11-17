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

    public function add(Request $req){

    	$funcionario = new Funcionario();
    	$funcionario->funcionario_nome = $req->input('funcionario_nome');
    	$funcionario->funcionario_cargo = $req->input('funcionario_cargo');
    	$funcionario->funcionario_dependentes = $req->input('funcionario_dependentes');
    	$funcionario->funcionario_filhos_menores = $req->input('funcionario_filhos_menores');
    	$funcionario->funcionario_insalubridade = $req->input('funcionario_insalubridade')/100;
    	$funcionario->funcionario_inativo = $req->input('funcionario_inativo');
    	$funcionario->funcionario_recolhe_inss = $req->input('funcionario_recolhe_inss');
    	$funcionario->funcionario_salario_base = $req->input('funcionario_salario_base');

    	if($funcionario->save()){
    		return response()->json(['success'=>true, 'funcionario'=>url('/funcionario/'.$funcionario->funcionario_id)]);
    	}else{
    		return response()->json(['success'=>false]);
    	}

    }

    public function update(Funcionario $funcionario, Request $req){

        $funcionario->funcionario_nome = $req->input('funcionario_nome');
        $funcionario->funcionario_cargo = $req->input('funcionario_cargo');
        $funcionario->funcionario_dependentes = $req->input('funcionario_dependentes');
        $funcionario->funcionario_filhos_menores = $req->input('funcionario_filhos_menores');
        $funcionario->funcionario_insalubridade = $req->input('funcionario_insalubridade')/100;
        $funcionario->funcionario_inativo = $req->input('funcionario_inativo');
        $funcionario->funcionario_recolhe_inss = $req->input('funcionario_recolhe_inss');
        $funcionario->funcionario_salario_base = $req->input('funcionario_salario_base');

        if($funcionario->save()){
            return response()->json(['success'=>true]);
        }else{
            return response()->json(['success'=>false]);
        }

    }

}
