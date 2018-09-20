<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Receita extends Model
{
    protected $primaryKey = 'lancamento_id';
    protected $table = 'receita';
    public $timestamps = false;

    protected $fillable = ['lancamento_conta', 'lancamento_data','lancamento_imobilizado','lancamento_valor'];

    public function conta(){
      return $this->hasOne('App\Conta','conta_id','lancamento_conta');
    }

    public function imobilizado(){
      return $this->hasOne('App\Imobilizado','imob_id','lancamento_imobilizado');
    }
}
