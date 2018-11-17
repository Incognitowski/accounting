<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parametro extends Model
{
    protected $table = "parametro";
    protected $primaryKey = "parametro_id";
    public $timestamps = false;

    protected $fillable = [
        "parametro_salario_minimo",
        "parametro_abate_dependente",
        "parametro_fgts",
        "parametro_data_inicio",
        "parametro_data_fim"
    ];

    public static function getLatest(){
        return Parametro::orderBy('parametro_data_inicio', 'desc')->where('parametro_data_fim',null)->first();
    }

}

