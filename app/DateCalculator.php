<?php

namespace App;

use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Feriado;

class DateCalculator
{
	public $feriados;

	public $date_start;

	public $date_end;

	function __construct($start, $end, $feriados){
		$this->feriados = $feriados;
		$this->date_start = $start;
		$this->date_end = $end;
	}

    public function getUsefulDays(){

    	$date_start = Carbon::createFromFormat('Y-m-d', $this->date_start);
    	$date_end = Carbon::createFromFormat('Y-m-d', $this->date_end);

    	return $date_start->diffInDays($date_end)+1 - $this->getSundaysAndHolidays();

    }

    public function getSundaysAndHolidays(){

    	$period = CarbonPeriod::create($this->date_start,$this->date_end);

    	$sundays_and_holidays = [];

    	foreach ($period as $date) {
    		if($date->englishDayOfWeek=='Sunday'){
    			$sundays_and_holidays[] = $date;
    		}else if($this->fitsHoliday($date)){
    			$sundays_and_holidays[] = $date;
    		}
    	}

    	return count($sundays_and_holidays);

    }

    public function fitsHoliday($date){

    	foreach ($this->feriados as $feriado) {
    		if($feriado->feriado_data==$date->toDateString()){
    			return true;
    		}
    	}

    	return false;

    }
}
