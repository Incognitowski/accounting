<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feriado extends Model
{
    protected $table = "Feriado";
    protected $primaryKey = "Feriado_id";
    public $timestamps = false;

    protected $fillable = [
        "Feriado_data",
        "Feriado_nome",
        "Feriado_tipo"
    ];
}
