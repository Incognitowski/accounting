<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lancamento extends Model
{
    protected $primaryKey = 'lancamento_id';
    protected $table = 'lancamento';
    public $timestamps = false;

    protected $fillable = ['lancamento_conta', 'lancamento_data'];

}
