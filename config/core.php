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