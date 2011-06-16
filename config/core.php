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
	
	try
	{
		$db_conn = mysql_connect( $db_host, $db_user, $db_pass );
		mysql_select_db( $db_name, $db_conn );
	}
	catch ( Exception $e)
	{
		throw $e;
	}
	define( 'MOD_DIR', 'modules/' );
	define( 'ROOT_DIR', '/apollo/' );
	
?>