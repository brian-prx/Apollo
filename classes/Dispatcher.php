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
			$this->params = $this->modules['Router']->parseUrl( $this->url );
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
			
			if ( $route = $this->modules['Router']->search( $this->modules['Router']->getUrl(), $routes ) ) {
				$this->params['controller'] = $route['controller'] . 'Controller';
				$this->params['function'] = $route['function'];
				$this->params['params'] = $route['params'];
			}
			
			// Debugging information
			//if ( $this->debug ) $this->setDebugVar( $this->params );
			
			try
			{
				// Load controller
				$controller = $this->__getController();

				if ( is_object( $controller ) )
				{
					// Is a function set? If not, set to index()
					$this->params['function'] = ( empty( $this->params['function'] ) ) ? 'index' : $this->params['function'];
					
					// Load form data
					if ( !empty( $_POST ) || $this->params['function'] == 'index' ) {
					  // Get the table fields
					  $fields = $this->modules['Db']->getFields( $controller->name );
					  $controller->setFormData( $_POST );
					}
					
					// Execute the controller's function
					$results = $controller->{$this->params['function']}( $this->params['params'] );
					
					// Get record count
					$recs = $controller->getRecordCount();
					
					if ( !$results )
						throw new Exception( $controller->name . 'Controller ' . $this->params['function'] . ' produced no results.' );
				  
				    // Debugging information
					if ( $this->debug ) $this->setDebugVar( $this->params );
					
					// Layout variables
					$layout_title = $controller->name . ' ' . $this->params['function'];
				}
				else
				{
					throw new Exception( 'Error loading ' . $this->params['controller'] );
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