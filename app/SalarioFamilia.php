<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SalarioFamilia extends Model
{
    protected $table = "salariofamilia";
    protected $primaryKey = "salariofamilia_id";
    public $timestamps = false;

    protected $fillable = [
        "salariofamilia_data_inicio",
        "salariofamilia_data_fim",
        "salariofamilia_dados"
    ];

}
