<?php
	class ModRouter extends ModController
	{
		// Region variables
		
		public $name = 'Router';
		public $description = 'Router Module';
		public $routes = array();
		
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
		 * @param array $routes
		 */
		public function search( $url, $routes )
		{
			foreach ( $routes as $path => $arr )
				if ( $url === $path ) return $arr;
		}
		
		/**
		 * 
		 * Url redirection
		 * 
		 * @param string $url
		 */
		public function redirect( $url )
		{
			try
			{
				if ( $url !== null )
					header('Location: ' . $url );
			}
			catch( Exception $e )
			{
				throw $e;
			}
		}
	}
?>