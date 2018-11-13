<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vale extends Model
{
    protected $table = "Vale";
    protected $primaryKey = "Vale_id";
    public $timestamps = false;

    protected $fillable = [
        "Vale_funcionario",
        "Vale_data",
        "Vale_valor"
    ];

}
