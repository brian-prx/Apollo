<?php
	class ModAuth extends ModController
	{
		// Region variables
		
		public $name = 'Auth';
		public $description = 'User Authentication Module';
		private $auth_token = null;
		
		// End region
		
		// Region public methods
		
		/**
		 * 
		 * ModAuth constructor
		 * 
		 */
		public function __construct()
		{
			$this->afterConstruct();
		}
		
		/**
		 * 
		 * ModAuth destructor
		 * 
		 */
		public function __destruct()
		{
			
		}
		
		/**
		 * 
		 * Get a user's authentication token
		 * 
		 */
		public function getAuthToken()
		{
		  return $this->auth_token;
		}
		
		/**
		 * 
		 * Check if a user is authenticated
		 * 
		 */
		public function checkAuth()
		{
		  return ( null !== $this->auth_token ) ? true : false;
		}
		
		/**
		 * 
		 * Process authentication request
		 * 
		 * @param array $user
		 * @param string $password
		 */
		public function authenticate( $user, $password )
		{
		  if ( !empty( $user ) && !empty( $password ) )
		  {
		    if ( $user['pass'] == sha1( $password ) )
		    {
		      $this->auth_token = sha1( $user . $password . date('YmdHis') );
		      return true;
		    }
		  }
		  else throw new Exception( 'Could not authenticate user ' . $user['name'] . '. Invalid password.' );
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