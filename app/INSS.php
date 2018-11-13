<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class INSS extends Model
{
    protected $table = "INSS";
    protected $primaryKey = "INSS_id";
    public $timestamps = false;

    protected $fillable = [
        "INSS_data_inicio",
        "INSS_data_fim",
        "INSS_dados"
    ];
}
