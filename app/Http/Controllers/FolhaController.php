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
use App\DateCalculator;
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
        $inss = INSS::getLatest();
        $irrf = IRRF::getLatest();
        $salario_familia = SalarioFamilia::getLatest();

        $feriados = Feriados::getFromCurrentYear();
        $start = new Carbon('first day of this month');
        $end = new Carbon('last day of this month');
        $calc = new DateCalculator($start, $end, $feriados); 

    	$folhalog->folhalog_data = Carbon::now()->toDateString();
    	$folhalog->folhalog_funcionario = $req->input('folhalog_funcionario');

    	$log = [];
    	$salario_final = 0;

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
    	$log['vakir_h_ex_100'] = $valor_hora_extra_100;

    	$log['qtd_h_ex_50'] = (int) $req->input('hora_extra_50');
    	$log['vakir_h_ex_50'] = $valor_hora_extra_50;

    	$salario_final+= $valor_hora_extra_100;
    	$salario_final+= $valor_hora_extra_50;

    	$total_hora_extra = $valor_hora_extra_50 + $valor_hora_extra_100;

        $dsr = $total_hora_extra / $calc->getUsefulDays() * $calc->getSundaysAndHolidays();

        $log['dsr'] = $dsr;
        $log['domingos_e_feriados'] = $calc->getSundaysAndHolidays(); 
    	$log['dias_uteis'] = $calc->getUsefulDays();

        $salario_final += $dsr;

        $salario_base = $salario_final;



    }
}
