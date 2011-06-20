<?php
	class ModAuth extends ModController
	{
		// Region variables
		
		public $name = 'Auth';
		public $description = 'User Authentication Module';
		private $auth_token = null;
		
		// End region
		
		// Region public methods
		
		public function __construct()
		{
			$this->afterConstruct();
		}
		
		public function __destruct()
		{
			
		}
		
		public function destroy()
		{
			unset( $_SESSION['auth_token'] );
		}
		
		public function authenticate( $username = null, $password = null )
		{
			if ( empty( $username ) || empty( $password ) ) return false;
			elseif ( null === $this->auth_token )
			{
				$this->auth_token = sha1( date( 'YmdHis' ) . $username . $password );
				$_SESSION['auth_token'] = $this->auth_token;
			}
				
			return true;
		}
		
		public function getAuthToken()
		{
			return $this->auth_token;
		}
		
		public function checkAuth()
		{
			return ( null !== $this->auth_token ) ? true : false;
		}
		
		public function getModuleNames()
		{
			return parent::getModuleNames();
		}
		
		public function getMethods( $name )
		{
		  $methods = get_class_methods( $name );
		  return $methods;
		}
		
		// End region
		
		// Region private methods
		
		private function afterConstruct()
		{
			if ( isset( $_SESSION['auth_token'] ) ) $this->auth_token = $_SESSION['auth_token'];
		}
		
		// End region
	}
?>