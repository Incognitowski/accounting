<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
}
