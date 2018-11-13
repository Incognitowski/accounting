<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SalarioFamilia extends Model
{
    protected $table = "SalarioFamilia";
    protected $primaryKey = "SalarioFamilia_id";
    public $timestamps = false;

    protected $fillable = [
        "SalarioFamilia_data_inicio",
        "SalarioFamilia_data_fim",
        "SalarioFamilia_dados"
    ];

}
