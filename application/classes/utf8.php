<?php defined('SYSPATH') or die('No direct script access.');

class UTF8 extends Kohana_UTF8 {
	
	public static function transliterate_to_ascii($str, $case = 0)
	{
		if ( ! isset(self::$called[__FUNCTION__]))
		{
			require APPPATH.__FUNCTION__.EXT;

			// Function has been called
			self::$called[__FUNCTION__] = TRUE;
		}

		return _transliterate_to_ascii($str, $case);

	}
	
}