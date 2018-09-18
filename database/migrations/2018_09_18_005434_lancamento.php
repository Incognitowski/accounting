<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class Lancamento extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("CREATE TABLE Lancamento
        (
            Lancamento_id bigserial NOT NULL,
            Lancamento_conta bigint NOT NULL,
            Lancamento_data date NOT NULL,
            CONSTRAINT Lancamento_pkey PRIMARY KEY (Lancamento_id),
            CONSTRAINT fk_lancamento_conta FOREIGN KEY (Lancamento_conta)
                REFERENCES Conta (Conta_id) MATCH FULL
                ON UPDATE NO ACTION
                ON DELETE NO ACTION
                DEFERRABLE INITIALLY DEFERRED
        )
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
        DB::statement("DROP TABLE Lancamento;");
    }
}
