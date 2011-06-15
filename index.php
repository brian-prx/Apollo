<?php
	include 'config/core.php';

	$filepath = 'c:\wamp\www\apollo\media\format\mp3\Kalimba.mp3';
	
	try
	{
		$ModMedia = new ModMedia( $filepath );
	}
	catch(Exception $e)
	{
		// Do something...
	}
?>
