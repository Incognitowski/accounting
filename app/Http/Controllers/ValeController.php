<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vale;

class ValeController extends Controller
{
	public function add(Request $req){
		$vale = new Vale();

		$vale->vale_funcionario = $req->input('vale_funcionario');
		$vale->vale_data = $req->input('vale_data');
		$vale->vale_valor = $req->input('vale_valor');

		if($vale->save()){
    		return response()->json(['success'=>true]);
    	}else{
    		return response()->json(['success'=>false]);
    	}

	}

    public function delete(Vale $vale){

    	if($vale->delete()){
    		return response()->json(['success'=>true]);
    	}else{
    		return response()->json(['success'=>false]);
    	}

    }
}
