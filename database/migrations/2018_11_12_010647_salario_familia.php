<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SalarioFamilia extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
            CREATE TABLE SalarioFamilia(
                SalarioFamilia_id serial NOT NULL,
                SalarioFamilia_data_inicio date NOT NULL,
                SalarioFamilia_data_fim date,
                SalarioFamilia_dados json NOT NULL,
                CONSTRAINT SalarioFamilia_pk PRIMARY KEY (SalarioFamilia_id)
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
        DB::statement("DROP TABLE SalarioFamilia;");
    }
}
