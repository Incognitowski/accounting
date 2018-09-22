<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conta extends Model
{
    protected $primaryKey = 'conta_id';
    protected $table = 'conta';
    public $timestamps = false;

    protected $fillable = ['conta_codigo', 'conta_descricao', 'conta_superconta'];

    public function getUses(){

      $uses = 0;

      $uses = $uses + Lancamento::where('lancamento_conta', $this->conta_id)->count();
      $uses = $uses + Conta::where('conta_superconta',$this->conta_id)->count();

      return $uses;

    }
}
