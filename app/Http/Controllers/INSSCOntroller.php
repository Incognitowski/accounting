<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon; 
use App\INSS;

class INSSCOntroller extends Controller
{
    public function add(Request $req){

    	$inss = INSS::orderBy('inss_data_inicio', 'desc')->first();
    	$inss->inss_data_fim = Carbon::now()->toDateString();
    	$inss->save();

    	$new_inss = new INSS();
    	$new_inss->inss_data_inicio = Carbon::now()->toDateString();

    	$tabela_inss = [];

    	foreach ($req->input('data_minimo') as $index => $valor) {
    	 	$inss = [
    	 		'min' => $valor,
    	 		'max' => $req->input('data_maximo')[$index],
    	 		'aliquota' => $req->input('data_aliquota')[$index]/100
    	 	];

    	 	$tabela_inss[] = $inss;
    	}

    	$new_inss->inss_dados = json_encode($tabela_inss);

    	if($new_inss->save()){
    		return response()->json(['success'=>true]);
    	}else{
    		return response()->json(['success'=>false]);
    	}
    }
}
