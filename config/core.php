<?php
	function __autoload($class)
	{
		try
		{
			if ( file_exists ( 'modules/'  . $class . '.php' ) ) include 'modules/' . $class . '.php';
			if ( file_exists ( 'classes/'  . $class . '.php' ) ) include 'classes/' . $class . '.php';
			if ( file_exists ( 'interfaces/'  . $class . '.php' ) ) include 'interfaces/' . $class . '.php';
			if ( file_exists ( 'controllers/'  . $class . '.php' ) ) include 'controllers/' . $class . '.php';
		}
		catch(Exception $e)
		{
			echo $e->getMessage();
		}
	}
	
	define( 'MOD_DIR', 'modules/' );
	define( 'ROOT_DIR', '/apollo/' );
	
	
?>