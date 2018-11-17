<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Feriado extends Model
{
    protected $table = "feriado";
    protected $primaryKey = "feriado_id";
    public $timestamps = false;

    protected $fillable = [
        "feriado_data",
        "feriado_nome",
        "feriado_tipo"
    ];


    public static function getFromCurrentYear(){
    	return Feriado::whereYear('feriado_data',Carbon::now()->year)->get();
    }
}
