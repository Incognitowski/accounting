<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Parametro;
use Carbon\Carbon;

class ParametroController extends Controller
{
    public function add(Request $req){
    	$last_parametro = Parametro::orderBy('parametro_data_inicio', 'desc')->where('parametro_data_fim',null)->first();
    	$last_parametro->parametro_data_fim = Carbon::now()->toDateString();
    	$last_parametro->save();

    	$new_parametro = new Parametro();

    	$new_parametro->parametro_data_inicio = Carbon::now()->toDateString();
    	$new_parametro->parametro_salario_minimo = $req->input('salario_minimo');
    	$new_parametro->parametro_abate_dependente = $req->input('abate_dependente');
    	$new_parametro->parametro_fgts = $req->input('fgts')/100;

    	if($new_parametro->save()){
    		return response()->json(['success'=>true]);
    	}else{
    		return response()->json(['success'=>false]);
    	}
    }
}
