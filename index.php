<?php
	session_start();

	include 'config/core.php';
	include 'config/db.php';

	$PageRequest = new PageRequest( $_SERVER );
	$Modules = $PageRequest->getModules();
	
	try
	{
		if ( is_object( $Modules['Auth'] ) )
		{
			if ( !empty( $_POST['username'] ) && !empty( $_POST['password'] ) )
			{
				$Modules['Auth']->authenticate( $_POST['username'], $_POST['password'] );
			}
		}
		$PageRequest->setDebugVar( $PageRequest->dispatch() );
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