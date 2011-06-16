<?php
	class Dispatcher
	{
		// Region variables
	
		public $debug = true;
		public $auth_flag = false;
		private $debug_vars = array();
		private $modules = array();
		private $server = null;
		private $layout = 'default';
		private $params = array();
		private $url = null;
		
		// End Region
		
		// Region public methods
		
		/**
		 * 
		 * Dispatcher constructor
		 * 
		 * @param $_SERVER $server
		 */
		public function __construct( $url )
		{
			$this->url = $url;
			$this->modules = ModController::loadModules();
			$this->baseUrl();
			$this->parseUrl();
		}
		
		/**
		 * 
		 * Return the current layout
		 */
		public function getLayout()
		{
			return $this->layout;
		}
		
		/**
		 * 
		 * Set the current layout
		 * 
		 * @param string $layout
		 */
		public function setLayout( $layout )
		{
			$this->layout = $layout;
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
		
		/**
		 * 
		 * Callback executed before rendering a page.
		 * 
		 */
		public function beforeRender()
		{
			if ( is_object( $this->modules['Auth'] ) )
			{
				if ( false === $this->modules['Auth']->checkAuth() )
				{
					// $this->redirect('/auth/login');
				}
			}
		}

		/**
		 * 
		 * Render page
		 * 
		 * @throws Exception
		 */
		public function render()
		{
			$this->beforeRender();
			
			$layout_title = 'Default Title';
			$layout_content = 'Placeholder content';
			
			try
			{
				// Load controller
				$controller = $this->__getController();
				
				$this->params['function'] = ( empty( $this->params['function'] ) ) ? 'index' : $this->params['function'];
				
				if ( is_object( $controller ) )
				{
					$result = call_user_func( $controller->__toString() . '::' . $this->params['function'], $controller->name );
				}
				else
				{
					throw new Exception( 'Error loading controller: ' . $this->params['controller'] );
				}
				
				if ( file_exists( 'views/' . $this->params['con_path'] . '/' . $this->params['function'] . '.php' ) )
				{
					$layout_content = file_get_contents( 'views/' . $this->params['con_path'] . '/' . $this->params['function'] . '.php' );
				}
				
				if ( file_exists ( 'webroot/layouts/' . $this->layout . '.php' ) )
					include 'webroot/layouts/' . $this->layout . '.php';
				else
					throw new Exception( 'Missing layout: ' . $this->layout );
			}
			catch( Exception $e )
			{
				throw $e;
			}
		}
		
		/**
		 * 
		 * Display debugging information
		 * 
		 */
		public function debug()
		{
			foreach ( $this->debug_vars as $var )
			{
				if ( is_array( $var ) || is_object( $var ) )
				{
					print "<pre>";
					print_r( $var );
					print "</pre>";
				}
				else
				{
					print $var;
				}
			}
		}
		
		/**
		 * 
		 * Debug a variable
		 * 
		 * @param mixed $var
		 */
		public function setDebugVar( $var )
		{
			$this->debug_vars[] = $var;
		}
		
		// End region
		
		// Region private methods
		
		/**
		 * 
		 * Parse a url into it's base components
		 * 
		 */
		private function parseUrl()
		{
			$url_comp = explode( '/' , $this->url );
			$this->params['controller'] = ( empty( $url_comp[0] ) ) ? '' : ucfirst( $url_comp[0] ) . 'Controller'; 
			$this->params['function'] = ( empty( $url_comp[1] ) ) ? '' : $url_comp[1];
			$this->params['con_path'] = strtolower( $url_comp[0] );
		}

		/**
		 * 
		 * Determine the base url the application runs in
		 * 
		 * @throws Exception
		 */
		private function baseUrl()
		{
			if ( ROOT_DIR )
				$this->url = str_replace( strtolower( ROOT_DIR ), '', strtolower( $this->url ) );
			else
				throw new Exception( 'ROOT_DIR is not defined. Set in config/core.php.' );
		}
		
		/**
		 * 
		 * Dynamic controller load
		 * 
		 * @throws Exception
		 */
		private function &__getController()
		{
			if ( class_exists( $this->params['controller'] ) )
			{
				$controller = new $this->params['controller']();
				return $controller;
			}
			elseif ( empty( $this->params['controller'] ) )
			{
				$controller = new AppController(); 
				return $controller;
			}
			else
				throw new Exception( 'Controller ' . $this->params['controller'] . ' does not exists. Create it in the controllers/ directory.' );
		}
		
		// End region
	}
?>