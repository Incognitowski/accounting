<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Vale extends Model
{
    protected $table = "vale";
    protected $primaryKey = "vale_id";
    public $timestamps = false;

    protected $fillable = [
        "vale_funcionario",
        "vale_data",
        "vale_valor"
    ];

    public function readableDate(){

    	$date = Carbon::createFromFormat('Y-m-d', $this->vale_data);

    	return $date->format('d/m/Y');

    }

    public function readableValue(){

    	$value = number_format($this->vale_valor, 2, ',', '.');

    	return "R$ " . $value;

    }

}
