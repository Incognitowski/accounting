<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Parametro extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
            CREATE TABLE Parametro(
                Parametro_id serial NOT NULL,
                Parametro_salario_minimo float NOT NULL,
                Parametros_abate_dependente float NOT NULL,
                Parametro_fgts integer NOT NULL,
                Parametro_data_inicio date NOT NULL,
                Parametro_data_fim date,
                CONSTRAINT Parametro_pk PRIMARY KEY (Parametro_id)
            
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
        DB::statement("DROP TABLE Parametro;");
    }
}
