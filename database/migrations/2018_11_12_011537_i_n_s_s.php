<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class INSS extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
            CREATE TABLE INSS(
                INSS_id serial NOT NULL,
                INSS_data_inicio date NOT NULL,
                INSS_data_fim date,
                INSS_dados json NOT NULL,
                CONSTRAINT INSS_pk PRIMARY KEY (INSS_id)  
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
        DB::statement("DROP TABLE INSS;");
    }
}
