<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request as Request;
use App\Imobilizado as Imobilizado;

class PostController extends Controller
{
    public function imobilizado(Request $request){
        $imobilizado = new Imobilizado();
        $imobilizado->imob_descricao = $request->input('descricao');
        $imobilizado->imob_aquisicao = $request->input('dataAquisicao');
        $imobilizado->imob_valor = $request->input('valor');
        $imobilizado->imob_valor = $request->input('valor');
        $imobilizado->imob_ativo = true;

        if($request->input('isDepreciavel')=='true'){
            $imobilizado->imob_depreciavel = true;
            $imobilizado->imob_vida_util = $request->input('vidaUtil');
        }else{
            $imobilizado->imob_depreciavel = false;
        }

        $data_fields = [];
        foreach($request->input('data_field') as $key => $value){
            $data_fields[$value] = $request->input('data_value')[$key];
        }

        $imobilizado->imob_dados = json_encode($data_fields);

        if($imobilizado->save()){
            return response()->json(['success'=>true,'imobilizado'=>url("/imobilizado/".$imobilizado->imob_id)]);
        }else{
            return response()->json(['success'=>false]);
        }
    }
}
