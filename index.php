<?php
	session_start();

	include 'config/db.php';
	include 'config/core.php';

	$Dispatcher = new Dispatcher( $_SERVER['REQUEST_URI'] );

	try
	{
		$Dispatcher->render();
	}
	catch( Exception $e )
	{
		$layout_title = 'Apollo error';
		$layout_error_msg = $e->getMessage();
		if ( file_exists( 'webroot/layouts/application_error.php' ) )
			include 'webroot/layouts/application_error.php';
		else
			echo $e->getMessage();
	}
?>