<?php

class Model {

    public $key = "tiba";  // Clé de 8 caractères max
	
	function __construct() {
		$this->db = new Database(DB_TYPE, DB_HOST, DB_NAME, DB_USER, DB_PASS);
		$this->db->exec("SET CHARACTER SET utf8");
		$this->db->exec("RESET MASTER");//pour suprimer les bin logs 	
	}
	
	public function check_empty($data, $fields)
	{
		$msgr = null;
		foreach ($fields as $value) {
			if (empty($data[$value])) {
				$msgr .= "$value field empty <br />";
			}
		} 
		return $msgr;
	}
	
	
	
	public function affichage($data) {
		echo '<pre>';print_r ($data);echo '</pre>';
	}
	function str_random($length)
	{
    $alphabet = "0123456789azertyuiopqsdfghjklmwxcvbnAZERTYUIOPQSDFGHJKLMWXCVBN";
    return substr(str_shuffle(str_repeat($alphabet, $length)), 0, $length);
    }
	
    function dateFR2US($date){$J = substr($date,0,2);$M = substr($date,3,2);$A = substr($date,6,4);$dateFR2US =  $A."-".$M."-".$J ;return $dateFR2US;}
	
	function dateUS2FR($date){$J = substr($date,8,2);$M = substr($date,5,2);$A = substr($date,0,4);$dateUS2FR =  $J."-".$M."-".$A ;return $dateUS2FR;}
	
	
	// calculate date difference 1
	function CalculateTimestampFromCurrDatetime($DateTime = -1) 
    {
	if ($DateTime == -1 || $DateTime == '' || $DateTime == '0000-00-00 00:00:00' || $DateTime == '0000-00-00') 
	{
		$DateTime = date("Y-m-d H:i:s");
	}
	$NewDate['year']   = substr($DateTime,0,4);
	$NewDate['month']  = substr($DateTime,5,2);
	$NewDate['day']    = substr($DateTime,8,2);
	$NewDate['hour']   = substr($DateTime,11,2);
	$NewDate['minute'] = substr($DateTime,14,2);
	$NewDate['second'] = substr($DateTime,17,2);
	return mktime($NewDate['hour'], $NewDate['minute'], $NewDate['second'], $NewDate['month'], $NewDate['day'], $NewDate['year']);
   }
   
   // calculate date difference 2
	function CalculateDateDifference($TimestampFirst, $TimestampSecond = -1)	
	{
		if ($TimestampSecond == -1) 
		{
			$TimestampSecond = CalculateTimestampFromCurrDatetime();
		}

		if ($TimestampSecond < $TimestampFirst) 
		{
			$TempTimestamp = $TimestampFirst;
			$TimestampFirst = $TimestampSecond;
			$TimestampSecond = $TempTimestamp;
			
			$NegativeDifference = true;
		}
		else 
		{
			$NegativeDifference = false;
		}

		list($Year1, $Month1, $Day1) = explode('-', date('Y-m-d', $TimestampFirst));
		list($Year2, $Month2, $Day2) = explode('-', date('Y-m-d', $TimestampSecond));
		$Time1 = (date('H',$TimestampFirst)*3600) + (date('i',$TimestampFirst)*60) + (date('s',$TimestampFirst));
		$Time2 = (date('H',$TimestampSecond)*3600) + (date('i',$TimestampSecond)*60) + (date('s',$TimestampSecond));

		$YearDiff = $Year2 - $Year1;
		$MonthDiff = ($Year2 * 12 + $Month2) - ($Year1 * 12 + $Month1);

		if($Month1 > $Month2)
		{
			$YearDiff -= 1;
		}
		elseif($Month1 == $Month2)
		{
			if($Day1 > $Day2) 
			{
				$YearDiff -= 1;
			}
			elseif($Day1 == $Day2) 
			{
				if($Time1 > $Time2) 
				{
					$YearDiff -= 1;
				}
			}
		}

		// handle over flow of month difference
		if($Day1 > $Day2) 
		{
			$MonthDiff -= 1;
		}
		elseif($Day1 == $Day2) 
		{
			if($Time1 > $Time2) 
			{
				$MonthDiff -= 1;
			}
		}

		$DateDifference = Array();
		$TotalSeconds = $TimestampSecond - $TimestampFirst;

		$WeekDiff = floor(($TotalSeconds / 604800));
		$DayDiff = floor(($TotalSeconds / 86400));

		if ($NegativeDifference == true) 
		{
			$DateDifference['years'] = ($YearDiff == 0) ? $YearDiff : -($YearDiff);
			$DateDifference['months'] = ($MonthDiff == 0) ? $MonthDiff : -($MonthDiff);
			$DateDifference['weeks'] = ($WeekDiff == 0) ? $WeekDiff : -($WeekDiff);
			$DateDifference['days'] = ($DayDiff == 0) ? $DayDiff : -($DayDiff);
		}
		else 
		{
			$DateDifference['years'] = $YearDiff;
			$DateDifference['months'] = $MonthDiff;
			$DateDifference['weeks'] = $WeekDiff;
			$DateDifference['days'] = $DayDiff;
		}
		
		return $DateDifference;
	}
   
}