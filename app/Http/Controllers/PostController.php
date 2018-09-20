<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request as Request;
use App\Imobilizado as Imobilizado;
use App\Conta as Conta;
use App\Custo as Custo;
use App\Receita as Receita;

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

  public function conta(Request $request){
    $conta = new Conta();
    $conta->conta_codigo = $request->input('codigoConta');
    $conta->conta_descricao = $request->input('descricao');
    $conta->conta_superconta = $request->input('superConta');

    if($conta->save()){
      return response()->json(['success'=>true,'conta'=>url("/conta/".$conta->conta_id)]);
    }else{
      return response()->json(['success'=>false]);
    }
  }

  public function custo(Request $request){

    $custo = new Custo();
    $custo->lancamento_conta = $request->input('contaCusto');
    $custo->lancamento_data = $request->input('dataCusto');
    $custo->lancamento_imobilizado = $request->input('imobilizadoCusto');
    $custo->lancamento_valor = $request->input('valorCusto');

    if($custo->save()){
      return response()->json(['success'=>true,'custos'=>url("/custo")]);
    }else{
      return response()->json(['success'=>false]);
    }

  }

  public function receita(Request $request){

    $receita = new Receita();
    $receita->lancamento_conta = $request->input('contaReceita');
    $receita->lancamento_data = $request->input('dataReceita');
    $receita->lancamento_imobilizado = $request->input('imobilizadoReceita');
    $receita->lancamento_valor = $request->input('valorReceita');

    if($receita->save()){
      return response()->json(['success'=>true,'receitas'=>url("/receita")]);
    }else{
      return response()->json(['success'=>false]);
    }

  }


}
