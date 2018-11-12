<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class IRRF extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
            CREATE TABLE IRRF(
                IRRF_id serial NOT NULL,
                IRRF_data_inicio date NOT NULL,
                IRRF_data_fim date,
                IRRF_dados json NOT NULL,
                CONSTRAINT IRRF_pk PRIMARY KEY (IRRF_id)
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
        DB::statement("DROP TABLE IRRF;");
    }
}
