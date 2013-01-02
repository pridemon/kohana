<?php defined('SYSPATH') OR die('No direct access allowed.');

 
$theme = 'default';

return array (


  // ... but most can be overridden in this automagically handled array
  'smarty_config'   => array(

    'compile_dir'     => Kohana::$cache_dir . '/smarty_compiled/' . $theme,
    'cache_dir'       => Kohana::$cache_dir . '/smarty_compiled/' . $theme,

    'template_dir'    =>  array(
      './themes/'. $theme. '/templates',
      APPPATH.'views',
      MODPATH.'smarty/views',
    ),
    
/*    'plugins_dir'     =>  array(
		APPPATH.'smarty_plugins',
		MODPATH.'smarty/smarty_plugins',
	),    */


  ),

);
