<?php

use Illuminate\Database\Seeder;
use App\Parametro;
use Carbon\Carbon;

class ParametroTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$data_hoje = Carbon::now();
        $parametro = new Parametro();
        $parametro->parametro_salario_minimo = 954.00;
        $parametro->parametro_abate_dependente = 189.59;
        $parametro->parametro_fgts = 0.08;
        $parametro->parametro_data_inicio = $data_hoje->toDateString();

        $parametro->save();
    }
}
