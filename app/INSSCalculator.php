<?php

namespace App;

class INSSCalculator
{
    public $inss;
    public $salario;

    function __construct($inss, $salario){
    	$this->inss = $inss;
    	$this->salario = $salario;
    }

    public function getINSSRow(){

    	$dados = json_decode($this->inss->inss_dados);

    	foreach ($dados as $inss) {
    		if($this->salario>$inss->min && $this->salario<$inss->max){
    			return $inss;
    		}
    	}

    	return end($dados);

    }

    public function getINSS(){

    	$inss = $this->getINSSRow();

    	if($this->salario>$inss->max){
    		$sal_base = $inss->max;
    	}else{
    		$sal_base = $this->salario;
    	}

    	return $sal_base * $inss->aliquota;

    }
}
