<?php

use Illuminate\Database\Seeder;
use App\SalarioFamilia;
use Carbon\Carbon;

class SalarioFamiliaTableSeeder extends Seeder
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
        	"1"=>["min"=>0, "max"=>877.67, "valor"=>45],
        	"2"=>["min"=>877.68, "max"=>1319.18, "valor"=>31.71]
        ];

        $SalarioFamilia = new SalarioFamilia();

        $SalarioFamilia->salariofamilia_data_inicio = $data_hoje->toDateString();
        $SalarioFamilia->salariofamilia_dados = json_encode($data);

        $SalarioFamilia->save();
    }
}
