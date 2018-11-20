<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Feriado;
use Carbon\Carbon;

class FeriadoController extends Controller
{
    public function add(Request $req){

    	$feriados = [];

    	foreach ($req->input('feriado_nome') as $index => $value) {
    		$feriado = [];
    		$feriado['nome'] = $value;
    		$feriado['data'] = $req->input('feriado_data')[$index];
    		$feriados[] = $feriado;
    	}

		Feriado::whereYear('feriado_data',(string)Carbon::now()->year)->delete();

    	foreach ($feriados as $feriado) {
    		Feriado::whereDate('feriado_data',$feriado['data'])->delete();
    		$new_feriado = new Feriado();
    		$new_feriado->feriado_data = $feriado['data'];
    		$new_feriado->feriado_nome = $feriado['nome'];
    		$new_feriado->save();
    	}

    	return response()->json(['success'=>true]);

    }
}
