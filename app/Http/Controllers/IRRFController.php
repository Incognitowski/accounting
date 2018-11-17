<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\IRRF;
use Carbon\Carbon;

class IRRFController extends Controller
{
    public function add(Request $req){

    	$irrf = IRRF::orderBy('irrf_data_inicio', 'desc')->where('irrf_data_fim',null)->first();
    	$irrf->irrf_data_fim = Carbon::now()->toDateString();
    	$irrf->save();

    	$new_irrf = new IRRF();
		$new_irrf->irrf_data_inicio = Carbon::now()->toDateString();

		$tabela_irrf = [];

		foreach ($req->input('data_minimo') as $index => $value) {
			$irrf = [
				'min'=>$value,
				'max'=>$req->input('data_maximo')[$index],
				'aliquota'=>$req->input('data_aliquota')[$index]/100,
				'parcela_a_deduzir'=>$req->input('data_desconto')[$index]
			];
			$tabela_irrf[] = $irrf;
		}

		$new_irrf->irrf_dados = json_encode($tabela_irrf);

		if($new_irrf->save()){
    		return response()->json(['success'=>true]);
    	}else{
    		return response()->json(['success'=>false]);
    	}
    }
}
