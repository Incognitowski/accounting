<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FolhaLog extends Model
{
    protected $table = "FolhaLog";
    protected $primaryKey = "FolhaLog_id";
    public $timestamps = false;

    protected $fillable = [
        "FolhaLog_funcionario",
        "FolhaLog_data",
        "FolhaLog_dados"
    ];
}
