<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class Conta extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("CREATE TABLE Conta
        (
            Conta_id bigserial NOT NULL,
            Conta_codigo character varying(250) COLLATE pg_catalog.default NOT NULL,
            Conta_descricao text COLLATE pg_catalog.default NOT NULL,
            Conta_superconta bigint,
            CONSTRAINT Conta_pkey PRIMARY KEY (Conta_id),
            CONSTRAINT fk_conta_conta FOREIGN KEY (Conta_superconta)
                REFERENCES Conta (Conta_id) MATCH FULL
                ON UPDATE NO ACTION
                ON DELETE NO ACTION
                DEFERRABLE INITIALLY DEFERRED
                NOT VALID
        )
        WITH (
            OIDS = FALSE
        )
        TABLESPACE pg_default;
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP TABLE Conta;");
    }
}
