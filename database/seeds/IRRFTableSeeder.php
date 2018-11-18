<?php

use Illuminate\Database\Seeder;
use App\IRRF;
use Carbon\Carbon;

class IRRFTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$data_hoje = Carbon::now();
        $data = [
        	["min"=>0, "max"=>1903.98, "aliquota"=>0, "parcela_a_deduzir"=>0],
        	["min"=>1903.99, "max"=>2826.65, "aliquota"=>0.075, "parcela_a_deduzir"=>142.80],
        	["min"=>2826.66, "max"=>3751.05, "aliquota"=>0.15, "parcela_a_deduzir"=>354.80],
        	["min"=>3751.06, "max"=>4664.68, "aliquota"=>0.225, "parcela_a_deduzir"=>636.13],
        	["min"=>4664.69, "max"=>99999999999999, "aliquota"=>0.275, "parcela_a_deduzir"=>869.36]
        ];

        $irrf = new IRRF();
        $irrf->irrf_dados = json_encode($data);
        $irrf->irrf_data_inicio = $data_hoje->toDateString();

        $irrf->save();

    }
}
