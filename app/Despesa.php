<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Despesa extends Model
{
    protected $primaryKey = 'lancamento_id';
    protected $table = 'despesa';
    public $timestamps = false;

    protected $fillable = ['lancamento_conta', 'lancamento_data','lancamento_valor'];
}
