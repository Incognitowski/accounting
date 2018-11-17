<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class INSS extends Model
{
    protected $table = "inss";
    protected $primaryKey = "inss_id";
    public $timestamps = false;

    protected $fillable = [
        "inss_data_inicio",
        "inss_data_fim",
        "inss_dados"
    ];

    public static function getLatest(){
    	return INSS::orderBy('inss_data_inicio', 'desc')->where('inss_data_fim',null)->first();
    }
}
