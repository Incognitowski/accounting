<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parametro extends Model
{
    protected $table = "Parametro";
    protected $primaryKey = "Parametro_id";
    public $timestamps = false;

    protected $fillable = [
        "Parametro_salario_minimo",
        "Parametro_abate_dependente",
        "Parametro_fgts",
        "Parametro_data_inicio",
        "Parametro_data_fim"
    ];

}
