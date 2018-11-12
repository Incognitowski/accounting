<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FolhaLog extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
            CREATE TABLE FolhaLog(
                FolhaLog_id serial NOT NULL,
                FolhaLog_funcionario integer NOT NULL,
                FolhaLog_data date NOT NULL,
                FolhaLog_dados json NOT NULL,
                CONSTRAINT FolhaLog_pk PRIMARY KEY (FolhaLog_id)
            );
        ");

        DB::statement("
            ALTER TABLE FolhaLog 
            ADD CONSTRAINT fk_folhalog_funcionario 
            FOREIGN KEY (FolhaLog_funcionario)
            REFERENCES Funcionario (Funcionario_id) 
            MATCH FULL
            ON DELETE NO ACTION 
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
        DB::statement("DROP TABLE FolhaLog;");
    }
}
