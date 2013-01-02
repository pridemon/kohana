<?php
/**
 * Smarty plugin
 */


function smarty_modifier_get($value, $index)
{
    return Arr::get($value, $index);
}

?>