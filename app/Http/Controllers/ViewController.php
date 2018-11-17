<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Conta;
use App\Custo;
use App\Receita;
use App\Imobilizado;
use Carbon\Carbon as Carbon;

use App\INSS;
use App\IRRF;
use App\SalarioFamilia;
use App\Parametro;
use App\Feriado;

use App\DateCalculator;

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

    public function relatorio(){

      $imobilizados = Imobilizado::all();

      $data_final = Carbon::now()->format('Y-m-d');
      $data_inicio = Carbon::now()->firstOfYear()->format('Y-m-d');

      $data = [
        'imobilizados'=>$imobilizados,
        'data_inicio'=>$data_inicio,
        'data_final'=>$data_final
      ];

      return view('build-report',$data);
    }

    public function relatorioGeral($inicio, $final){
      $imobilizados = Imobilizado::all();

      $dates = [$inicio, $final];
      $balanco = 0.0;
      $depreciacao_imobilizados = 0.0;

      $custos = Custo::whereBetween('lancamento_data',$dates)->get();
      $receitas = Receita::whereBetween('lancamento_data',$dates)->get();

      foreach ($imobilizados as $imobilizado) {
        $depreciacao_imobilizados = $depreciacao_imobilizados + $imobilizado->getDepreciacao($inicio, $final);
      }

      foreach ($receitas as $receita) {
        $balanco = $balanco + $receita->lancamento_valor;
      }

      foreach ($custos as $custo) {
        $balanco = $balanco - $custo->lancamento_valor;
      }

      $balanco = $balanco - $depreciacao_imobilizados;

      $balanco = number_format((float)$balanco, 2, ',', '.');

      $inicio = Carbon::createFromFormat('Y-m-d',$inicio);
      $final = Carbon::createFromFormat('Y-m-d',$final);

      $data = [
        'custos'=>$custos,
        'receitas'=>$receitas,
        'data_inicial'=>$inicio->format('d/m/Y'),
        'data_final'=>$final->format('d/m/Y'),
        'balanco'=>$balanco,
        'depreciacao'=>$depreciacao_imobilizados
      ];

      return view('report-geral',$data);

    }

    public function relatorioImobilizado($imobilizado, $inicio, $final){
      $imobilizado = Imobilizado::find($imobilizado);

      $dates = [$inicio, $final];
      $depreciacao_imobilizados = $imobilizado->getDepreciacao($inicio, $final);
      $balanco = 0.0;

      $custos = Custo::where('lancamento_imobilizado',$imobilizado->imob_id)
                      ->where(function($query) use ($dates){
                        $query->whereBetween('lancamento_data',$dates);
                      })
                      ->get();
      $receitas = Receita::where('lancamento_imobilizado',$imobilizado->imob_id)
                          ->where(function($query) use ($dates){
                            $query->whereBetween('lancamento_data',$dates);
                          })
                          ->get();

      foreach ($receitas as $receita) {
        $balanco = $balanco + $receita->lancamento_valor;
      }

      foreach ($custos as $custo) {
        $balanco = $balanco - $custo->lancamento_valor;
      }

      $balanco = $balanco - $depreciacao_imobilizados;

      $balanco = number_format((float)$balanco, 2, ',', '.');

      $inicio = Carbon::createFromFormat('Y-m-d',$inicio);
      $final = Carbon::createFromFormat('Y-m-d',$final);

      $data = [
        'custos'=>$custos,
        'receitas'=>$receitas,
        'data_inicial'=>$inicio->format('d/m/Y'),
        'data_final'=>$final->format('d/m/Y'),
        'balanco'=>$balanco,
        'depreciacao'=>$depreciacao_imobilizados
      ];

      return view('report-imobilizado',$data);
    }

    public function parametros(){

      $inss = INSS::getLatest();
      $irrf = IRRF::getLatest();
      $parametro = Parametro::getLatest();
      $salario_familia = SalarioFamilia::getLatest();
      $feriados = Feriado::getFromCurrentYear();

      $tabela_inss = json_decode($inss->inss_dados);
      foreach ($tabela_inss as $inss) {
        $inss->aliquota = $inss->aliquota * 100;
      }
      $inss->inss_dados = json_encode($tabela_inss);

      $tabela_irrf = json_decode($irrf->irrf_dados);
      foreach ($tabela_irrf as $irrf) {
        $irrf->aliquota = $irrf->aliquota * 100;
      }
      $irrf->irrf_dados = json_encode($tabela_irrf);

      $data = [
        "inss" => $inss,
        "irrf" => $irrf,
        "parametro" => $parametro,
        "salario_familia" => $salario_familia,
        "feriado" => $feriados
      ];

      return view("parametros",$data);

    } 

}
