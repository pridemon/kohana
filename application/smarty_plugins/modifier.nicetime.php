<?php
/**
* Модификатор nicetime: unix_timestamp, date, datetime => красивое время как на Facebook
*
* @param string $string
* @return string
*/

function nicetime($date)
{
	if(empty($date)) {
		return "Нет даты";
	}

	$periods		= array("секунд", "минут", "час", "д", "недел", "месяц", "");
	$lengths		= array("60","60","24","7","4.35","12");
	$begian			= array("у", "у", "", "ень", "ю", "", "год");
	$through		= array("ы", "ы", "а", "ня", "и", "а", "года");
	$endian			= array("", "", "ов", "ней", "ь", "ев", "лет");


	$now			= time();
	$unix_date		= $date;
	//$unix_date		= strtotime($date);

	   // check validity of date
	if(empty($unix_date)) {    
		trigger_error("Неправильная дата");
	}
	
	$past_tense	= "";
    $future_tense = "";
    
	// is it future date or past date
	if($now > $unix_date) {    
		$difference		= $now - $unix_date;
		$past_tense		= "назад";
		
	} else {
		$difference		= $unix_date - $now;
		$future_tense	= "через";
	}

	for($j = 0; $difference >= $lengths[$j] && $j < count($lengths); $j++) {
		$difference /= $lengths[$j];
	}

	$difference = round($difference);
	$difference10 = $difference % 10;
	$difference100 = $difference % 100;
	
	if (in_array($difference100, array(11,12,13,14))) {
		
		$periods[$j].= $endian[$j]; 
	
	} else {
	
		switch ( $difference10 ) {
			case 1:
			    $periods[$j].= $begian[$j];   
			    break;
			case 2: case 3: case 4:
			    $periods[$j].= $through[$j];   
			    break;
			default:
			    $periods[$j].= $endian[$j];   		    			
		}
	
	}

	return "{$future_tense} $difference $periods[$j] {$past_tense}";
}


	
function smarty_modifier_nicetime($string)
{

   if (! is_numeric($string)) 
   {
      // Попытаемся прочтитать date и datetime
      $timestamp = strtotime($string);
      if ($timestamp!==FALSE && $timestamp!=-1 /*PHP<5.1*/) 
      {
         $string = $timestamp;
      }
   }

   // Это похоже на unix_timestamp?
   if (is_numeric($string)) 
   {
   		return nicetime(strftime($string));
   }

   // Мы ещё здесь? Что-то неладно...
   trigger_error('Invalid data for date modifier!');
   return '';
}
?>
