<?php
	include 'config/db.php';
	include 'config/core.php';

	$Dispatcher = new Dispatcher( $_SERVER['REQUEST_URI'] );

	try
	{
		$Dispatcher->render();
	}
	catch( Exception $e )
	{
		$layout_title = 'Apollo Error';
		$layout_error_msg = $e->getMessage();
		if ( file_exists( 'webroot/layouts/error.php' ) )
			include 'webroot/layouts/error.php';
		else
			echo $e->getMessage();
	}
?>