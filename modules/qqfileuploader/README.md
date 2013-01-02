# qqFileUploader for Kohana 3
### version 0.1

This is a Kohana 3 module for easy implementation of Andrew Valums' AJAX enabled file upload script.

## How to use

1. Get the File Uploader script from <http://valums.com/ajax-upload/>
2. Download this Kohana 3 module: <https://github.com/egeriis/qqFileUploader-for-Kohana-3/zipball/master>
3. Add the JavaScript file to your HTML document
4. Place the `qqfileuploader` module in your `modules` folder and enable it in [bootstrap.php](http://kohanaframework.org/3.0/guide/kohana/bootstrap)
5. Code ahead!

## Example

This is a simple example of how to accept a file upload. This method works for both AJAX and traditional file upload. AJAX upload is prioritized before traditional.

	public function action_upload()
	{
		if (Fileupload::exists())
		{
			$pathinfo 	= pathinfo(Fileupload::name());
			$filename 	= $pathinfo['filename'];
			$ext 		= $pathinfo['extension'];
			
			$saveName 	= md5($filename.Fileupload::size().$_GET['customer']).'.'.$ext;
						
			if (Fileupload::save($saveName))
			{
				$storage = ORM::factory('storage');
				$storage->filename = $saveName;
				$storage->save();
			}
		}
	}

Check [fileupload.php](https://github.com/egeriis/qqFileUploader-for-Kohana-3/blob/master/classes/fileupload.php) for documentation and feel free to [leave feedback](https://github.com/egeriis/qqFileUploader-for-Kohana-3/issues).

## License

MIT License. See [LICENSE](https://github.com/egeriis/qqFileUploader-for-Kohana-3/blob/master/LICENSE) for details.

#### Brought to you by <http://egeriis.me>