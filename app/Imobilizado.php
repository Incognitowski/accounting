<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \Carbon\Carbon as Carbon;

class Imobilizado extends Model
{
    protected $primaryKey = 'imob_id';
    protected $table = 'imobilizado';
    public $timestamps = false;

    protected $fillable = ['imob_descricao', 'imob_dados', 'imob_depreciavel','imob_vida_util','imob_ativo','imob_valor','imob_aquisicao'];

    public function getDepreciabilityRate(){

        return round((1 / $this->imob_vida_util)/365,7);

    }

    public function getDepreciacao($from, $to){
      $tz = config('app.timezone');
      $depreciability = $this->getDepreciabilityRate();
      $valor = $this->imob_valor;

      $from = Carbon::createFromFormat('Y-m-d',$from);
      $to = Carbon::createFromFormat('Y-m-d',$to);
      $aquisicao = Carbon::createFromFormat('Y-m-d',$this->imob_aquisicao);

      if($aquisicao->diffInDays($to,false)<0){
        return 0;
      }

      if($aquisicao->diffInDays($from,false)<0){
        $from = $aquisicao;
      }

      $days = $from->diffInDays($to);

      for ($i=0; $i < $days; $i++){
          $valor = $valor - ($valor*$depreciability);
      }

      $depreciacao = $this->imob_valor - $valor;

      return $depreciacao;

    }

    public function getUses(){

      $uses = 0;

      $uses = $uses + Custo::where('lancamento_imobilizado', $this->imob_id)->count();
      $uses = $uses + Receita::where('lancamento_imobilizado', $this->imob_id)->count();

      return $uses;

    }


}
