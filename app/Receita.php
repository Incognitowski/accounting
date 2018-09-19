<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Receita extends Model
{
    protected $primaryKey = 'lancamento_id';
    protected $table = 'receita';
    public $timestamps = false;

    protected $fillable = ['lancamento_conta', 'lancamento_data','lancamento_imobilizado','lancamento_valor'];
}
