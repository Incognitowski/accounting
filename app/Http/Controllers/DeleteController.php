<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imobilizado;
use App\Receita;
use App\Custo;
use App\Conta;

class DeleteController extends Controller
{
  public function conta(Conta $conta){

    if($conta->getUses()==0){

      if($conta->delete()){
        return response()->json(['success'=>true]);
      }else{
        return response()->json(['success'=>false,'msg'=>'Não foi possível excluir está conta. Internal Error.']);
      }
    }else{
      return response()->json(['success'=>false,'msg'=>'Esta conta está ligada com lançamentos ou é herdada por outra conta.']);
    }

  }

  public function imobilizado(Imobilizado $imobilizado){

    if($imobilizado->getUses()>0){
      return response()->json(['success'=>false,'msg'=>'Este imobilizado está ligado á um lançamento.']);
    }

    if($imobilizado->delete()){
      return response()->json(['success'=>true]);
    }else{
      return response()->json(['success'=>false,'msg'=>'Não foi possível excluir o imobilizad. Internal Error']);
    }

  }

  public function receita(Receita $receita){

    if($receita->delete()){
      return response()->json(['success'=>true,'location'=>url('/receita')]);
    }else{
      return response()->json(['success'=>false,'msg'=>'Não foi possível excluir este lançamento. Internal Error']);
    }

  }

  public function custo(Custo $custo){

    if($custo->delete()){
      return response()->json(['success'=>true,'location'=>url('/custo')]);
    }else{
      return response()->json(['success'=>false,'msg'=>'Não foi possível excluir este lançamento. Internal Error']);
    }

  }

}
