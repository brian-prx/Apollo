<?php
	function __autoload($class)
	{
		try
		{
			include 'modules/' . $class . '.php';
		}
		catch(Exception $e)
		{
			echo $e->getMessage();
		}

		try
		{
			include 'interfaces/' . $class . '.php';
		}
		catch(Exception $e)
		{
			echo $e->getMessage();
		}
	}
?>