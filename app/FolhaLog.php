<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

class FolhaLog extends Model
{
    protected $table = "folhalog";
    protected $primaryKey = "folhalog_id";
    public $timestamps = false;

    protected $fillable = [
        "folhalog_funcionario",
        "folhalog_data",
        "folhalog_dados"
    ];

    public function readableDate(){

    	$date = Carbon::createFromFormat('Y-m-d', $this->folhalog_data);

    	return $date->month . "/" . $date->year;

    }
}
