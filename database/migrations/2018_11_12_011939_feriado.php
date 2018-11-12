<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Feriado extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
            CREATE TABLE Feriado(
                Feriado_id serial NOT NULL,
                Feriado_data date NOT NULL,
                Feriado_nome varchar(500) NOT NULL,
                Feriado_tipo varchar(250) NOT NULL,
                CONSTRAINT Feriado_pk PRIMARY KEY (Feriado_id)
            
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
        DB::statement("DROP TABLE Feriado;");
    }
}
