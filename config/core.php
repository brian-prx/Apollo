<?php
	session_start();
	
	/**
	 * 
	 * Dynamically load classes and interfaces
	 * 
	 * @param string $class
	 */
	function __autoload( $class )
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
	
	/**
	 * 
	 * Establish the MySQL connection
	 * 
	 */
	try
	{
		//$db_conn = mysql_connect( $db_host, $db_user, $db_pass );
		//if ( !$db_conn ) die( 'Could not establish db connection.' );
		//mysql_select_db( $db_name, $db_conn );
	}
	catch ( Exception $e)
	{
		throw $e;
	}
	
	/**
	 * 
	 * App settings
	 * 
	 */
	ini_set( 'include_path', 'c:\\wamp\\www' );
	
	/**
	 * 
	 * App constants
	 * 
	 */
	define( 'MOD_DIR', 'modules/' );
	define( 'ROOT_DIR', '/apollo/' );
	
?>