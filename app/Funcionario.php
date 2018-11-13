<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    protected $table = "Funcionario";
    protected $primaryKey = "Funcionario_id";
    public $timestamps = false;

    protected $fillable = [
        "Funcionario_nome",
        "Funcionario_cargo",
        "Funcionario_dependentes",
        "Funcionario_insalubridade",
        "Funcionario_salario_base",
        "Funcionario_filhos_menores",
        "Funcionario_abate_inss",
    ];

}
