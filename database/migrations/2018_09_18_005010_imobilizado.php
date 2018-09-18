<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class Imobilizado extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("CREATE TABLE Imobilizado
        (
            Imob_id bigserial NOT NULL,
            Imob_descricao character varying(250) COLLATE pg_catalog.default NOT NULL,
            Imob_dados text COLLATE pg_catalog.default NOT NULL,
            Imob_depreciavel boolean NOT NULL,
            Imob_vida_util integer,
            Imob_ativo boolean NOT NULL,
            Imob_valor real NOT NULL,
            Imob_aquisicao date NOT NULL,
            CONSTRAINT Imobilizado_pkey PRIMARY KEY (Imob_id)
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
        DB::statement("DROP TABLE Imobilizado;");
    }
}
