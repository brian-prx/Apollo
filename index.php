<?php
	include 'config/core.php';

	$filepaths = array(
		'c:\wamp\www\apollo\media\format\mp3\Kalimba.mp3'
	);
	
	try
	{
		$ModMedia = new ModMedia();
		$ModMedia->convertMimeTypes( $filepaths );
	}
	catch(Exception $e)
	{
		// Do something...
	}
?>
