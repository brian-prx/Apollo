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
			$this->loadModules();
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
		
		public function render()
		{
			try
			{
				$layout_title = "Change me";
				$layout_kewords = "Change me";
				$layout_description = "Change me";
				$layout_content = "";
				$layout_css = array('default');
				
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
		
		public function getModules()
		{
			return parent::getModules();
		}
	}
?>