<?php
	/**
	 * 
	 * Customer routes
	 * 
	 * @var array
	 */
	$routes = array(
		'/' => array(
			'controller' => 'Pages',
			'function' => 'display',
			'params' => array( 'name' => 'home' ) 
		),
		'about' => array(
			'controller' => 'Pages',
			'function' => 'display',
			'params' => array( 'name' => 'about' )
		)
	);
?>