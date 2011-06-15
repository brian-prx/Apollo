<?php
	class PageRequest extends PageController
	{
		private $server = null;
		private $layout = 'default';
		private $params = array();
		private $url = null;

		public function __construct( $server )
		{
			$this->server = $server;
			parent::loadModules();
		}
		
		public function setLayout( $layout )
		{
			$this->layout = $layout;
		}
		
		public function getLayout()
		{
			return $this->layout;
		}
		
		private function beforeRender()
		{
			
		}
		
		public function dispatch()
		{
			try
			{
				$this->baseUrl();
				$url_components = explode( '/', $this->url );
				$this->params['controller'] = $url_components[0];
				$controller =& $this->__getController();
			}
			catch( Exception $e )
			{
				throw $e;
			}
		}
		
		private function baseUrl()
		{
			if ( ROOT_DIR )
				$this->url = str_replace( ROOT_DIR, '', $this->server['REDIRECT_URL'] );
			else
				throw new Exception( 'ROOT_DIR is not defined.' );
		}
		
		private function &__getController()
		{
			if ( class_exists( $this->params['controller'] ) )
			{
				$controller = new $this->params['controller']();
				return $controller;
			}
			elseif ( empty( $this->params['controller'] ) )
			{
				return new Controller();
			}
			throw new Exception( 'Class ' . $this->params['controller'] . ' does not exists. Create it in the class/ directory.' );
		}
		
		public function render()
		{
			$Modules = parent::getModules();
			$layout_content = 'Content placeholder';
			$layout_title = 'Default Title';
			
			parent::setDebugVar( $this->server );

			try
			{
				if ( is_object( $Modules['Auth'] ) )
				{
					if ( null === $Modules['Auth']->getAuthToken() )
					{
						$this->layout = 'login';
						$layout_content = file_get_contents( 'views/auth/login.php' );
					}
					else
					{
						$layout_content = 'Authentication token: ' . $Modules['Auth']->getAuthToken();
					}
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
	}
?>