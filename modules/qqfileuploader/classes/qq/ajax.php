<?php defined('SYSPATH') or die('No direct script access.');

class qq_Ajax
{
	public static function exists()
	{
		if (!isset($_GET[Fileupload::$post_name]) 
			OR !isset($_SERVER['CONTENT_LENGTH'])) return false;
		
		return true;
	}
	
	public static function size()
	{
		if (!self::exists()) return 0;
		return (int)$_SERVER['CONTENT_LENGTH'];
	}
	
	public static function name()
	{
		if (!self::exists()) return null;
		return $_GET[Fileupload::$post_name];
	}
	
	public static function save($temp, $path)
	{
/*	    $input = fopen("php://input", "r");
	    $temp = tmpfile();
	    $realSize = stream_copy_to_stream($input, $temp);
	    fclose($input);
	    
	    if ($realSize != self::size()){            
	        return false;
	    }      */
            	    
	    $target = fopen($path, "w");        
	    fseek($temp, 0, SEEK_SET);
	    stream_copy_to_stream($temp, $target);
	    fclose($target);
	    
	    return true;
	}
    
    public static function get_temp_name() 
    {
        $input = fopen("php://input", "r");
        $temp = tmpfile();
        $realSize = stream_copy_to_stream($input, $temp);
        fclose($input);
        
        if ($realSize != self::size()){            
            return false;
        }  

        return $temp;        
    }
}