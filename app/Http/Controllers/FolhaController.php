<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Funcionario;
use App\Vale;
use App\INSS;
use App\IRRF;
use App\SalarioFamilia;
use App\Feriado;
use App\FolhaLog;
use App\Parametro;
use App\DateCalculator;
use App\INSSCalculator;
use App\IRRFCalculator;
use App\SalarioFamiliaCalculator;
use Carbon\Carbon;

class FolhaController extends Controller
{
    public function add(Funcionario $funcionario){
    	$data = [
    		'funcionario' => $funcionario
    	];
    	return view('add-folha',$data);
    }

    public function insert(Request $req){
    	$folhalog = new FolhaLog();
    	$parametros = Parametro::getLatest();
    	$funcionario = Funcionario::find((int) $req->input('folhalog_funcionario'));
        $inss_table = INSS::getLatest();
        $irrf_table = IRRF::getLatest();
        $salario_familia_table = SalarioFamilia::getLatest();

        $feriados = Feriado::getFromCurrentYear();
        $start = new Carbon('first day of this month');
        $end = new Carbon('last day of this month');
        $calc = new DateCalculator($start->toDateString(), $end->toDateString(), $feriados); 

        $folhalog->folhalog_data = Carbon::now()->toDateString();
        $folhalog->folhalog_funcionario = $req->input('folhalog_funcionario');

        $log = [];
        $salario_final = 0;

        $log['salario_base'] = (float) $funcionario->funcionario_salario_base;

        $salario_final += $funcionario->funcionario_salario_base;

        $salario_final += (float) $req->input('comissao');
        $log['comissao'] = (float) $req->input('comissao');

        $insalubridade = $funcionario->funcionario_insalubridade * $parametros->parametro_salario_minimo;
        $log['insalubridade'] = (float) $insalubridade;

        $salario_final += $insalubridade;

        $hora_extra_100 = $funcionario->getHoraExtra100();
        $hora_extra_50 = $funcionario->getHoraExtra50();

        $valor_hora_extra_50 = $hora_extra_50 * ((int) $req->input('hora_extra_50'));
        $valor_hora_extra_100 = $hora_extra_100 * ((int) $req->input('hora_extra_100'));

        $log['qtd_h_ex_100'] = (int) $req->input('hora_extra_100');
        $log['valor_h_ex_100'] = $valor_hora_extra_100;

        $log['qtd_h_ex_50'] = (int) $req->input('hora_extra_50');
        $log['valor_h_ex_50'] = $valor_hora_extra_50;

        $salario_final+= $valor_hora_extra_100;
        $salario_final+= $valor_hora_extra_50;

        $log['total_hora_extra'] = $valor_hora_extra_100 + $valor_hora_extra_50;

        $total_hora_extra = $valor_hora_extra_50 + $valor_hora_extra_100;

        $dsr = $total_hora_extra / $calc->getUsefulDays() * $calc->getSundaysAndHolidays();

        $log['dsr'] = $dsr;
        $log['domingos_e_feriados'] = $calc->getSundaysAndHolidays(); 
        $log['dias_uteis'] = $calc->getUsefulDays();

        $salario_final += $dsr;

        $salario_base = $salario_final;

        $log['salario_pos_incrementos'] = $salario_base;

        $calc_inss = new INSSCalculator($inss_table, $salario_base);

        if(!$funcionario->funcionario_recolhe_inss){

            $log['inss_faixa'] = ['min'=>0,'max'=>0,'aliquota'=>0];

            $log['inss_valor'] = 0;

            $valor_inss = 0;

        }else{

            $inss_faixa = $calc_inss->getINSSRow();

            $log['inss_faixa'] = $inss_faixa;

            $valor_inss = $calc_inss->getINSS();

            $log['inss_valor'] = $valor_inss;

        }

        
        $calc_irrf = new IRRFCalculator($irrf_table, $funcionario, $valor_inss, $salario_base, $parametros);

        $salario_final -= $valor_inss;

        $irrf_faixa = $calc_irrf->getIRRFRow();

        $log['irrf_faixa'] = $irrf_faixa;

        $valor_irrf = $calc_irrf->getIRRF();

        $log['irrf_valor'] = $valor_irrf;

        $salario_final -= $valor_irrf;

        $vales = $funcionario->monthVales();

        $log['vales'] = $vales;

        $valor_vales = $funcionario->sumVales();

        $log['valor_vales'] = $valor_vales;

        $salario_final -= $valor_vales;

        $calc_salfam = new SalarioFamiliaCalculator($salario_familia_table, $funcionario, $salario_base);

        $salario_familia_faixa = $calc_salfam->getSalarioFamiliaRow();

        $log['salario_familia_faixa'] = $salario_familia_faixa;

        $salario_familia_valor = $calc_salfam->getSalarioFamilia();

        $log['salario_familia'] = $salario_familia_valor;

        $salario_final += $salario_familia_valor;

        $log['salario_liquido'] = $salario_final; 

        $fgts = $salario_final * $parametros->parametro_fgts;

        $log['fgts'] = $fgts;

        $log['fgts_porcentagem'] = $parametros->parametro_fgts * 100;

        $folhalog->folhalog_dados = json_encode($log);

        if($folhalog->save()){
            return redirect('folha/'.$folhalog->folhalog_id);
        }else{
            return response()->json(['success'=>false]);
        }
    }

    public function view(FolhaLog $folha){

        $funcionario = Funcionario::find($folha->folhalog_funcionario);

        $folha_dados = json_decode($folha->folhalog_dados);

        $vales = [];

        foreach ($folha_dados->vales as $vale) {
            $vale_instance = new Vale();
            $vale_instance->vale_valor = $vale->vale_valor;
            $vale_instance->vale_data = $vale->vale_data; 
            $vales[] = $vale_instance;
        }

        $format_function = function($value) {
            $value = number_format($value, 2, ',', '.');

            return "R$ " . $value;
        };

        $data = [
            'folha' => $folha_dados,
            'funcionario' => $funcionario,
            'vales' => $vales,
            'money_format' => $format_function,
            'salario' => 0
        ];

        return view('view-folha', $data);

    }
}
