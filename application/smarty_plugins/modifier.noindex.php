<?php
/**
 * Smarty plugin
 */


function smarty_modifier_noindex($string)
{
	return noindex($string);
}

function noindex($text) {
	$text = preg_replace( "/\<a\shref=\"(.*)\"(.*)>(.+)\<\/a\>/iU", 
			"<noindex><a href=\"\\1\"\\2 rel=\"nofollow\">\\3</a></noindex>",
			
			$text); 
	
	return $text;
}


/* vim: set expandtab: */

?>
