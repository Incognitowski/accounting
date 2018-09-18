<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conta extends Model
{
    protected $primaryKey = 'conta_id';
    protected $table = 'conta';
    public $timestamps = false;

    protected $fillable = ['conta_codigo', 'conta_descricao', 'conta_superconta'];
}
