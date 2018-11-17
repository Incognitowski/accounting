<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Funcionario extends Model
{
    protected $table = "funcionario";
    protected $primaryKey = "funcionario_id";
    public $timestamps = false;

    protected $fillable = [
        "funcionario_nome",
        "funcionario_cargo",
        "funcionario_dependentes",
        "funcionario_insalubridade",
        "funcionario_salario_base",
        "funcionario_filhos_menores",
        "funcionario_abate_inss",
    ];

    public function vales(){
        return $this->hasMany('App\Vale','vale_funcionario','funcionario_id');
    }

    public function folhas_de_pagamento(){
        return $this->hasMany('App\FolhaLog','folhalog_funcionario','funcionario_id');
    }

    public function monthVales(){
        $data_hoje = Carbon::now();
        return $this
                ->vales()
                ->whereMonth('vale_data',$data_hoje->month)
                ->whereYear('vale_data',$data_hoje->year)
                ->get();
    }

    public function sumVales($format = 'raw'){
        $valor_vales = 0;
        foreach ($this->monthVales() as $vale) {
            $valor_vales += $vale->vale_valor;
        }
        if($format == 'pretty'){
            return number_format($valor_vales, 2, ',', '.');
        }

        return $valor_vales;
    }

    public function hasFolhaThisMonth(){
        $data_hoje = Carbon::now();

        $folhas_esse_mes = $this->folhas_de_pagamento()->whereMonth('folhalog_data',$data_hoje->month)->whereYear('folhalog_data',$data_hoje->year)->get();
        if(count($folhas_esse_mes)>0){
            return true;
        }               
        return false;         
    }

    public function getLatestFolha(){
        $data_hoje = Carbon::now();
        $latest_folha = $this->folhas_de_pagamento()->whereMonth('folhalog_data',$data_hoje->month)->whereYear('folhalog_data',$data_hoje->year)->first();
        return $latest_folha;                      
    }

}
