<?php

namespace App;

class IRRFCalculator 
{
    public $irrf;
    public $funcionario;
    public $base_de_calculo;

    function __construct($irrf, $funcionario, $inss, $salario, $parametro){
    	$this->irrf = $irrf;
		$this->base_de_calculo = $salario - $inss - ($parametro->parametro_abate_dependente * $funcionario->funcionario_dependentes);
    }

    public function getIRRFRow(){

    	$dados = json_decode($this->irrf->irrf_dados);

    	foreach ($dados as $irrf) {
    		if($this->base_de_calculo>$irrf->min && $this->base_de_calculo<$irrf->max){
    			return $irrf;
    		}
    	}

    	return end($dados);

    }

    public function getIRRF(){

    	$irrf = $this->getIRRFRow();

    	$valor_irrf = ($this->base_de_calculo * $irrf->aliquota) - $irrf->parcela_a_deduzir;

    	return $valor_irrf;

    }
}
