<?php
	class PageRequest
	{
		private $server = null;
		private $controller = null;
		private $view = null;
		private $layout = 'default';
		
		public function __construct( $server )
		{
			$this->server = $server;
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
				
			}
			catch( Exception $e )
			{
				throw $e;
			}
		}
	}
?>