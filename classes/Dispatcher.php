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
			//$this->modules['Menu']->init();

			if ( is_object( $this->modules['Db'] ) )
			{
				
			}
			
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
			
			include 'config/routes.php';
			
			if ( $route = $this->modules['Router']->search( $this->url, $routes ) ) {
				$this->params['controller'] = $route['controller'] . 'Controller';
				$this->params['function'] = $route['function'];
				$this->params['params'] = $route['params'];
			}
			
			$layout_title = 'Default Title';
			$layout_content = 'Default Content';
			
			try
			{
				// Load controller
				$controller = $this->__getController();
				
				if ( is_object( $controller ) )
				{
					// Load form data
					if ( !empty( $_POST ) ) $controller->setFormData( $_POST );
					
					// Is a function set? If not, set to index()
					$this->params['function'] = ( empty( $this->params['function'] ) ) ? 'index' : $this->params['function'];
					
					// Execute the controller's function
					$results = $controller->{$this->params['function']}( $this->params['params'] );
					
					if ( isset( $results['content'] ) ) $layout_title = base64_decode( $results['content'] );
					if ( isset( $results['title'] ) ) $layout_title = $results['title'];
					
					// Get the table fields
					$fields = $this->modules['Db']->getFields( $controller->name );

					// Get record count
					$recs = $controller->getRecordCount();
					
					if ( !$results )
						throw new Exception( $controller->name . 'Controller produced no results.' );
				  
				    // Debugging information
					if ( $this->debug ) $this->setDebugVar( false );
				}
				else
				{
					throw new Exception( 'Error loading ' . $this->params['controller'] . 'Controller.' );
				}
				
				/**
				 * Load the view file content
				 */
				if ( file_exists( 'views/' . $controller->name . '/' . $this->params['function'] . '.php' ) )
				{
					ob_start();
					include 'views/' . $controller->name . '/' . $this->params['function'] . '.php';	
					$layout_content = ob_get_clean();
				}
				else 
					throw new Exception( strtolower( ROOT_DIR . 'views/' . $controller->name . '/' . $this->params['function'] ) . '.php does not exist. Create this file to fix this problem.' );
				
				/**
				 * Include the layout
				 */
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
				    /*foreach ($GLOBALS as $vname => $val )
				      if ( $val === $var ) echo $val;
				    print "<hr />";*/
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
			$this->params['params'] = ( empty( $url_comp[2] ) ) ? array() : $url_comp[2];
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
				
			if ( empty( $this->url ) ) $this->url = '/';
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