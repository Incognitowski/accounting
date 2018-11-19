<?php

namespace App;

class SalarioFamiliaCalculator
{
    public $salario_familia;
    public $funcionario;
    public $salario;

    function __construct($salario_familia, $funcionario, $salario){
    	$this->salario_familia = $salario_familia;
    	$this->funcionario = $funcionario;
    	$this->salario = $salario;
    }

    public function getSalarioFamiliaRow(){

    	$dados = json_decode($this->salario_familia->salariofamilia_dados);

    	foreach ($dados as $salfam) {
    		if($this->salario>$salfam->min && $this->salario<$salfam->max){
    			return $salfam;
    		}
    	}

    	return end($dados);

    }

    public function getSalarioFamilia(){

    	$salfam = $this->getSalarioFamiliaRow();

    	if($this->salario>$salfam->max){
    		return 0;
    	}

    	$salfam_valor = $salfam->valor * $this->funcionario->funcionario_filhos_menores;

    	return $salfam_valor;

    }
}
