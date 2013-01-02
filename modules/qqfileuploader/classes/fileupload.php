<?php defined('SYSPATH') or die('No direct script access.');

/**
 * A module to easily integrate Andrew Valums' AJAX enabled file uploader in Kohana 3
 *
 * {@link https://github.com/egeriis/qqFileUploader-for-Kohana-3}
 *
 * @author Ronni Egeriis Persson {@link http://egeriis.me}
 */
class Fileupload
{
	/**
	 * The name through which the file upload is sent.
	 */
	public static $post_name = 'qqfile';
	
	/**
	 * Checks wheather a file upload exists through either AJAX or traditional upload.
	 *
	 * @return boolean
	 */
	public static function exists()
	{
		if (qq_Ajax::exists()) return true;
		if (qq_Traditional::exists()) return true;
		return false;
	}
	
	/**
	 * Get file name of the uploaded file. Returns null if no file upload is found.
	 *
	 * @return string
	 */
	public static function name()
	{
		if (qq_Ajax::exists())
		{
			return qq_Ajax::name();
		}
		else if (qq_Traditional::exists())
		{
			return qq_Traditional::name();
		}
		
		return null;
	}
	
	/**
	 * Get file size of uploaded file. Returns 0 if no file upload is found.
	 *
	 * @return int
	 */
	public static function size()
	{
		if (qq_Ajax::exists())
		{
			return qq_Ajax::size();
		}
		else if (qq_Traditional::exists())
		{
			return qq_Traditional::size();
		}
		
		return 0;
	}
	
	/**
	 * Saves the uploaded file to specified path.
	 *
	 * @param string $path
	 * @param int $chmod (default: 0644)
	 * @return boolean
	 */
	public static function save($temp_name, $path=null, $chmod=0644)
	{
		$exists = false;
		if (qq_Ajax::exists())
		{
			$exists = true;
			$class = 'qq_Ajax';
		}
		else if (qq_Traditional::exists())
		{
			$exists = true;
			$class = 'qq_Traditional';
		}
		
		if ($exists == false) return false;
		
		call_user_func(array($class, 'save'), $temp_name, $path);
		chmod($path, $chmod);
		return true;
	}
    
    public static function get_temp_name()
    {
        if (qq_Ajax::exists())
        {
            return qq_Ajax::get_temp_name();
        }
        else if (qq_Traditional::exists())
        {
            return qq_Traditional::get_temp_name();
        }
        
        return '';
    }
    
}