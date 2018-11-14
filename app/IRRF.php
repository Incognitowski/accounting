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

}
