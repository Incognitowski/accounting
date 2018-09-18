<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class Despesa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("CREATE TABLE Despesa
        (
            Lancamento_id bigserial NOT NULL,
            Lancamento_conta bigint NOT NULL,
            Lancamento_data date NOT NULL,
            Lancamento_valor real NOT NULL
        )
            INHERITS (Lancamento)
        WITH (
            OIDS = FALSE
        )
        TABLESPACE pg_default;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP TABLE Despesa");
    }
}
