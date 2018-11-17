<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IRRF extends Model
{
    protected $table = "irrf";
    protected $primaryKey = "irrf_id";
    public $timestamps = false;

    protected $fillable = [
    	"irrf_data_inicio",
    	"irrf_data_fim",
    	"irrf_dados"
	];

	public static function getLatest(){
		return IRRF::orderBy('irrf_data_inicio', 'desc')->where('irrf_data_fim',null)->first();
	}

}
