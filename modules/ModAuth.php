<?php
	class ModAuth extends ModController
	{
		public $name = 'Auth';
		public $description = 'User Authentication Module';
		private $auth_token = null;
		
		public function __construct()
		{
			
		}
		
		public function authenticate( $username = null, $password = null )
		{
			if ( empty( $username ) || empty( $password ) ) return false;
			else $this->auth_token = sha1( $username . $password );
				
			return true;
		}
		
		public function getAuthToken()
		{
			return $this->auth_token;
		}
	}
?>