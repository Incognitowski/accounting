<?php

use Illuminate\Database\Seeder;
use App\Conta as Conta;

class ContasPrimarias extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $receita = new Conta();
        $receita->conta_codigo = "1";
        $receita->conta_descricao = "Receita";
        $receita->conta_superconta = null;
        $receita->save();

        $custo = new Conta();
        $custo->conta_codigo = "2";
        $custo->conta_descricao = "Custo";
        $custo->conta_superconta = null;
        $custo->save();

        $despesa = new Conta();
        $despesa->conta_codigo = "3";
        $despesa->conta_descricao = "Despesa";
        $despesa->conta_superconta = null;
        $despesa->save();
    }
}
