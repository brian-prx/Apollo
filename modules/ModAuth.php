<?php
	class ModAuth extends ModController
	{
		public $name = 'Auth';
		public $description = 'User Authentication Module';
		private $auth_token = null;
		
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
			else
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
		
		private function afterConstruct()
		{
			if ( isset( $_SESSION['auth_token'] ) ) $this->auth_token = $_SESSION['auth_token'];
		}
	}
?>