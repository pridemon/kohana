<?php

function smarty_modifier_allow($resource, $privilege)
{                                  
	return A2::instance('a2')->allowed($resource, $privilege);
}

?>
