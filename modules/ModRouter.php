<?php
	class ModRouter extends ModController
	{
		// Region variables
		
		public $name = 'Router';
		public $description = 'Router Module';
		public $routes = array();
		private $url = null;
		
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
		  try
		  {
		    foreach ( $routes as $path => $arr )
			  if ( $url === $path ) return $arr;
				
			return false;
		  }
		  catch( Exception $e )
		  {
		    
		  }
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
			  if ( false === strstr( $url, ROOT_DIR ) ) $url = ROOT_DIR . $url;
			  
			  if ( $url !== null )
			    header( 'Location: ' . $url, 302 );
			}
			catch( Exception $e )
			{
				throw $e;
			}
		}
		
		/**
		 * 
		 * Parse a url
		 * 
		 * @param mixed $url
		 */
		public function parseUrl( $url )
		{
		  $params = array();
		  
		  try
		  {
            if ( is_array( $url ) )
            {
              // Do something...
            }
            else
            {
              // Strip ROOT_DIR
              if ( ROOT_DIR )
                $this->url = str_replace( ROOT_DIR , '/', $url );
              else
				throw new Exception( 'ROOT_DIR is not defined. Set in config/core.php.' );
				
			  $components = explode( '/' , $this->url );
              $params['controller'] = ( empty( $components[1] ) ) ? '' : ucfirst( $components[0] ); 
              $params['function'] = ( empty( $components[2] ) ) ? '' : $components[1];
              $params['params'] = ( empty( $components[3] ) ) ? array() : $components[2];
            }
		  }
		  catch( Exception $e )
		  {
		    throw $e;
		  }
		  
		  return $params;
		}
		
		/**
		 * 
		 * Get the parsed url
		 * 
		 */
		public function getUrl()
		{
		  return $this->url;
		}
		
		// End region
	}
?>