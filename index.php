<?php
	include 'config/core.php';
	include 'config/db.php';

	try
	{
		$PageRequest = new PageRequest( $_SERVER );
		$PageRequest->render();
	}
	catch( Exception $e )
	{
		$layout_error_msg = $e->getMessage();
		if ( file_exists( 'webroot/layouts/application_error.php' ) )
			include 'webroot/layouts/application_error.php';
		else
			echo $e->getMessage();
	}
?>
