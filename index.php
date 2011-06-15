<?php
	include 'config/core.php';
	include 'config/db.php';

	try
	{
		$PageRequest = new PageRequest( $_SERVER );
		$PageRequest->render();
	}
	catch(Exception $e)
	{
		// Do something...
	}
?>
