<?php
	class UsersController extends AppController
	{
		// Region variables
		
		public $name = 'Users';
		
		// End region
		
		// Region public functions
		
		public function login()
		{
		  if ( !empty( $this->form_data ) )
		  {
		    $user = $this->modules['Db']->getUser( $this->form_data['username'] );
		    if ( !empty( $user ) )
		    {
		      $result = $this->modules['Auth']->authenticate( $user, $this->form_data['password'] );
 		      if ( $result )
  		        $this->modules['Message']->addMessage( 'AuthSuccess', '' );
  		         
  		          
		    }
		    else throw new Exception( 'User ' . $this->form_data['username'] . ' not found.' );
		  }
		  return true;
		}
		
		// End Region
	}
?>