<?php
	class PageRequest extends PageController
	{
		private $server = null;
		private $controller = null;
		private $view = null;
		private $params = array();
		private $layout = 'default';

		public function __construct( $server )
		{
			$this->server = $server;
			parent::loadModules();
		}
		
		private function parseRedirectUrl()
		{
			if ( empty ( $this->server['REDIRECT_URL'] ) )
			{
				throw new Exception( 'Server redirect url not defined.' );
			}
			$this->Components = explode( '/', $this->Server['REDIRECT_URL'] );
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