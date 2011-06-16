<?php
	session_start();

	include 'config/core.php';
	include 'config/db.php';

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