<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imobilizado extends Model
{
    protected $primaryKey = 'imob_id';
    protected $table = 'imobilizado';
    public $timestamps = false;

    protected $fillable = ['imob_descricao', 'imob_dados', 'imob_depreciavel','imob_vida_util','imob_ativo','imob_valor','imob_aquisicao'];

    public function getDepreciabilityRate(){

        return round((1 / $this->imob_vida_util)/365,7);

    }

    public function getUses(){

      $uses = 0;

      $uses = $uses + Custo::where('lancamento_imobilizado', $this->imob_id)->count();
      $uses = $uses + Receita::where('lancamento_imobilizado', $this->imob_id)->count();

      return $uses;

    }

    public function roundValue($value){
        return round($value, 2);
    }

}
