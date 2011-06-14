<?php
	include 'config/core.php';

	$filepath = 'c:\wamp\www\apollo\media\format\wmv\Wildlife.wmv';
	
	try
	{
		$MediaMod = new MediaMod($filepath);
		echo $MediaMod->mime_type;
	}
	catch(Exception $e)
	{
		// Do something...
	}
?>
