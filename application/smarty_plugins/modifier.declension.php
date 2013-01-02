<?php

/**
* Модификатор Smarty для склонения существительных по числам
* 
* @param mixed $string число
* @param mixed $f1 существительное для всех случаев
* @param mixed $f2 существительное для 1
* @param mixed $f3 существительное для 2,3,4
*/
function smarty_modifier_declension($string, $f1='', $f2='', $f3='', $nul='0')
{

	if ($string == 0) {
		return $nul;
	}

	$difference = round($string);
	$difference10 = $difference % 10;
	$difference100 = $difference % 100;
	
	if (in_array($difference100, array(11,12,13,14))) {
		
		$res = $f1;
	
	} else {
	
		switch ( $difference10 ) {
			case 1:
			    $res = $f2;  
			    break;
			case 2: case 3: case 4:
			    $res = $f3;   
			    break;
			default:
			    $res = $f1;    		    			
		}
	
	}

	return 	$string. $res;
}

?>
