<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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

}
