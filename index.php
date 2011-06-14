<?php
	include 'config/core.php';

	$filepath = 'c:\wamp\www\apollo\media\format\mp3\Kalimba.mp3';
	
	try
	{
		$mod_media = new mod_media($filepath);
	}
	catch(Exception $e)
	{
		// Do something...
	}
?>
