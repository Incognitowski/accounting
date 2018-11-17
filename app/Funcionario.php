<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    protected $table = "funcionario";
    protected $primaryKey = "funcionario_id";
    public $timestamps = false;

    protected $fillable = [
        "funcionario_nome",
        "funcionario_cargo",
        "funcionario_dependentes",
        "funcionario_insalubridade",
        "funcionario_salario_base",
        "funcionario_filhos_menores",
        "funcionario_abate_inss",
    ];

}
