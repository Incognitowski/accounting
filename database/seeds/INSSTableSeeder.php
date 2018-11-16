<?php

use Illuminate\Database\Seeder;
use App\INSS;
use Carbon\Carbon;

class INSSTableSeeder extends Seeder
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
        	["min"=>0, "max"=>1693.72, "aliquota"=> 0.08],
        	["min"=>1693.73, "max"=>2822.90, "aliquota"=> 0.09],
        	["min"=>2822.90, "max"=>5645.80, "aliquota"=> 0.11]
        ];

        $inss = new INSS();
        $inss->inss_dados = json_encode($data);
        $inss->inss_data_inicio = $data_hoje->toDateString();

        $inss->save();

    }
}
