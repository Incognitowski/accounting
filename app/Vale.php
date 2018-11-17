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

    public function funcionario(){
        return $this->belongsTo('App\Funcionario','vale_funcionario','funcionario_id');
    }

    public function readableDate(){

    	$date = Carbon::createFromFormat('Y-m-d', $this->vale_data);

    	return $date->format('d/m/Y');

    }

    public function readableValue(){

    	$value = number_format($this->vale_valor, 2, ',', '.');

    	return "R$ " . $value;

    }

    public function hasBeenUsedInFolha(){

        $date = Carbon::createFromFormat('Y-m-d', $this->vale_data);

        $folhas_utilizadas = $this->funcionario->folhas()->whereMonth('folhalog_data',$date->month)->whereYear('folhalog_data',$date->year)->get();

        if(count($folhas_utilizadas)>0){
            return true;
        } else {
            return false;
        }

    }

}
