<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Funcionario extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
            CREATE TABLE Funcionario(
                Funcionario_id serial NOT NULL,
                Funcionario_nome varchar(500) NOT NULL,
                Funcionario_cargo varchar(500) NOT NULL,
                Funcionario_dependentes integer NOT NULL,
                Funcionario_insalubridade float NOT NULL,
                Funcionario_salario_base float NOT NULL,
                Funcionario_filhos_menores integer NOT NULL,
                Funcionario_inativo boolean NOT NULL DEFAULT false,
                Funcionario_recolhe_inss boolean NOT NULL DEFAULT true,
                CONSTRAINT Funcionario_pk PRIMARY KEY (Funcionario_id)
            );
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP TABLE Funcionario;");
    }
}
