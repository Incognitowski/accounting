<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Conta;
use App\Custo;
use App\Receita;
use App\Imobilizado;
use Carbon\Carbon as Carbon;

class ViewController extends Controller
{
    public function main(){
      $dateToday = Carbon::now();
      $dateNextMonth = Carbon::now()->subDays(30);

      $dates = [$dateNextMonth->format('Y-m-d'),$dateToday->format('Y-m-d')];

      $custos = Custo::whereBetween('lancamento_data',$dates)->get();
      $receitas = Receita::whereBetween('lancamento_data',$dates)->get();

      $balanco = 0.0;

      foreach ($receitas as $receita) {
        $balanco = $balanco + $receita->lancamento_valor;
      }

      foreach ($custos as $custo) {
        $balanco = $balanco - $custo->lancamento_valor;
      }

      $balanco = number_format((float)$balanco, 2, ',', '.');

      $data = [
        'custos'=>$custos,
        'receitas'=>$receitas,
        'data_inicial'=>$dateToday->format('d/m/Y'),
        'data_final'=>$dateNextMonth->format('d/m/Y'),
        'balanco'=>$balanco
      ];

      return view('main',$data);
    }

    public function imobilizado(){
        $imobilizados = Imobilizado::all();
        return view('manage-imobilizado',['imobilizados'=>$imobilizados]);
    }

    public function addImobilizado(){
        return view('add-imobilizado');
    }

    public function editImobilizado(Imobilizado $imobilizado){
        $depreciacao = 100 / $imobilizado->imob_vida_util;
        $depreciacao = number_format((float)$depreciacao,2,',','.');
        return view('edit-imobilizado',['imobilizadoAtual'=>$imobilizado,'depreciacao'=>$depreciacao]);
    }

    public function conta(){
        $contas = Conta::all();
        return view('manage-conta',['contas'=>$contas]);
    }

    public function addConta(){
        $contas = Conta::orderBy('conta_codigo','asc')->get();
        return view('add-conta',['contas'=>$contas]);
    }

    public function editConta(Conta $conta){
        $contas = Conta::orderBy('conta_codigo','asc')->get();
        return view('edit-conta',['contaAtual'=>$conta,'contas'=>$contas]);
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
