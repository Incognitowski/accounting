<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Vale extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
            CREATE TABLE Vale(
                Vale_id serial NOT NULL,
                Vale_funcionario integer NOT NULL,
                Vale_data date NOT NULL,
                Vale_valor float NOT NULL,
                CONSTRAINT Vale_pk PRIMARY KEY (Vale_id)
            
            );
        ");

        DB::statement("
            ALTER TABLE Vale
            ADD CONSTRAINT fk_vale_funcionario 
            FOREIGN KEY (Vale_funcionario)
            REFERENCES Funcionario (Funcionario_id) 
            MATCH FULL
            ON DELETE RESTRICT 
            ON UPDATE CASCADE;
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP TABLE Vale;");
    }
}
