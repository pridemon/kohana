<?php defined('SYSPATH') or die('No direct script access.');

class qq_Traditional
{
	public static function exists()
	{
		if (empty($_FILES[Fileupload::$post_name])) return false;
		
		$file = $_FILES[Fileupload::$post_name];
		if (!Upload::not_empty($file) 
			OR !Upload::valid($file)) return false;
			
		return true;
	}
	
	public static function size()
	{
		if (!self::exists()) return 0;
		return (int)$_FILES[Fileupload::$post_name]['size'];
	}
	
	public static function name()
	{
		if (!self::exists()) return null;
		return $_FILES[Fileupload::$post_name]['name'];
	}
	
	public static function save($path)
	{
		if (move_uploaded_file($_FILES[Fileupload::$post_name]['tmp_name'], $path)) return true;
		return false;
	}
}