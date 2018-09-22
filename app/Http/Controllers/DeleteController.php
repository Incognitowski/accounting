<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lancamento;
use App\Custo;
use App\Receita;
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
}
