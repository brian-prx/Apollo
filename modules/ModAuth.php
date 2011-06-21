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
          if ( !empty( $_SESSION['auth_token'] ) )
            $this->auth_token = $_SESSION['auth_token'];
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
		 * Process authentication request
		 * 
		 * @param array $data
		 */
		public function authenticate( $data )
		{
		  try
		  {
            if ( !empty( $data ) )
            {
              $user = $this->findUser( $data['username'] );
              
              if ( sha1( $data['password'] ) == $user['pass'] )
              {
                $_SESSION['auth_token'] = sha1( $data['username'] . $data['password'] . date( 'YmdHis' ) );
                return true;
              }
            }
		  }
		  catch( Exception $e )
		  {
		    throw $e;
		  }
		  
		  return false;
		}
		
		/**
		 * 
		 * Find a user record
		 * 
		 * @param string $name
		 * @throws Exception
		 */
		public function findUser( $name )
		{
		  try
		  {
		    $sql = "SELECT * FROM users WHERE name='{$name}';";
		    $result = ModDb::rawQuery( $sql );
		    
		    if ( !empty( $result ))
		      $user = mysql_fetch_assoc( $result );
		    else
		      throw new Exception( 'Could not find user ' . $name . '.' );
		  }
		  catch( Exception $e )
		  {
		    throw $e;
		  }
		  
		  return $user;
		}
		
		/**
		 * 
		 * End authentication session
		 * 
		 */
		public function destroy()
		{
		  unset( $_SESSION['auth_token'] );
		}
		
		// End region
	}
?>