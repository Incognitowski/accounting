<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Conta;
use App\Custo;
use App\Receita;
use App\Imobilizado;

class ViewController extends Controller
{
    public function imobilizado(){
        return view('manage-imobilizado');
    }

    public function addImobilizado(){
        return view('add-imobilizado');
    }

    public function conta(){
        $contas = Conta::all();
        return view('manage-conta',['contas'=>$contas]);
    }

    public function addConta(){
        $contas = Conta::orderBy('conta_codigo','asc')->get();
        return view('add-conta',['contas'=>$contas]);
    }

    public function custo(){
      $custos = Custo::all();
      foreach ($custos as $custo) {
        $date = explode('-',$custo->lancamento_data);
        $date_formated = $date[2] . "/" . $date[1] . "/" . $date[0];
        $custo->lancamento_data = $date_formated;
        $custo->lancamento_valor = number_format((float)$custo->lancamento_valor, 2, ',', '.');
      }
      return view('manage-custo',['custos'=>$custos]);
    }

    public function addCusto(){
      $contas = Conta::orderBy('conta_codigo','asc')->get();
      $imobilizados = Imobilizado::all();

      return view('add-custo',['contas'=>$contas,'imobilizados'=>$imobilizados]);
    }

    public function receita(){
      $receitas = Receita::all();
      foreach ($receitas as $receita) {
        $date = explode('-',$receita->lancamento_data);
        $date_formated = $date[2] . "/" . $date[1] . "/" . $date[0];
        $receita->lancamento_data = $date_formated;
        $receita->lancamento_valor = number_format((float)$receita->lancamento_valor, 2, ',', '.');
      }
      return view('manage-receita',['receitas'=>$receitas]);
    }

    public function addReceita(){
      $contas = Conta::orderBy('conta_codigo','asc')->get();
      $imobilizados = Imobilizado::all();

      return view('add-receita',['contas'=>$contas,'imobilizados'=>$imobilizados]);
    }
}
