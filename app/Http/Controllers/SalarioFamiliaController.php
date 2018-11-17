<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SalarioFamilia;
use Carbon\Carbon;

class SalarioFamiliaController extends Controller
{
    public function add(Request $req){
    	$last_salario_familia = SalarioFamilia::orderBy('salariofamilia_data_inicio', 'desc')->where('salariofamilia_data_fim',null)->first();
    	$last_salario_familia->salariofamilia_data_fim = Carbon::now()->toDateString();
    	$last_salario_familia->save();

    	$new_salario_familia = new SalarioFamilia();
    	$new_salario_familia->salariofamilia_data_inicio = Carbon::now()->toDateString();

    	$tabela_salario_familia = [];
    	foreach ($req->input('data_minimo') as $index => $value) {
    		$salario_familia = [
    			'min' => $value,
    			'max' => $req->input('data_maximo')[$index],
    			'valor' => $req->input('data_valor')[$index]
    		]; 

    		$tabela_salario_familia[] = $salario_familia;
    	}
    	$new_salario_familia->salariofamilia_dados = json_encode($tabela_salario_familia);

    	if($new_salario_familia->save()){
    		return response()->json(['success'=>true]);
    	}else{
    		return response()->json(['success'=>false]);
    	}

    }
}
