<?php
	class ModRouter extends ModController
	{
		// Region variables
		
		public $name = 'Router';
		public $description = 'Router Module';
		
		public $routes = array(
			'/' => array(
				'controller' => 'Pages',
				'function' => 'display',
				'params' => array('name' => 'home') 
			)
		);
		
		// End region
		
		// Region public functions
		
		/**
		 * 
		 * Router constructor
		 * 
		 */
		public function __construct()
		{
			
		}
		
		/**
		 * 
		 * Add a temporary route
		 * 
		 * @param string $url
		 * @param array $params
		 */
		public function addRoute( $url, $params )
		{
			$this->routes[$url] = $params;
		}
		
		/**
		 * 
		 * Search for a route match
		 * 
		 * @param string $url
		 */
		public function iterate( $url )
		{
			foreach ( $this->routes as $path => $arr )
				if ( $url === $path ) return $arr;
		}
	}
?>