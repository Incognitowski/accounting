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

    public function roundValue($value){
        return round($value, 2);
    }

}
