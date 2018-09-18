<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class Custo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("CREATE TABLE Custo
        (
            Lancamento_id bigserial NOT NULL,
            Lancamento_conta bigint NOT NULL,
            Lancamento_data date NOT NULL,
            Lancamento_imobilizado bigint NOT NULL,
            Lancamento_valor real NOT NULL,
            CONSTRAINT fk_custo_imobilizado FOREIGN KEY (Lancamento_imobilizado)
                REFERENCES Imobilizado (Imob_id) MATCH FULL
                ON UPDATE NO ACTION
                ON DELETE NO ACTION
                DEFERRABLE INITIALLY DEFERRED
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
        DB::statement("DROP TABLE Custo");
    }
}
