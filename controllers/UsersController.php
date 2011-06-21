<?php
	class UsersController extends AppController
	{
		// Region variables
		
		public $name = 'Users';
		
		public $description = 'User Controller';
		
		// End region
		
		// Region public functions
		
		/**
		 * 
		 * User's home page
		 * 
		 */
		public function home()
		{
		  return true;
		}
		
		/**
		 * 
		 * User login
		 * 
		 */
		public function login()
		{
		  try
		  {
            if ( $token = $this->modules['Auth']->getAuthtoken() )
            {
              $this->modules['Message']->addMessage( 'AuthMsg', 'You are already logged in.' );
              $this->modules['Router']->redirect( ROOT_DIR . 'users/home' );
            }
            
            if ( !empty( $this->form_data ) )
            {
              if ( $this->modules['Auth']->authenticate( $this->form_data ) )
                $this->modules['Message']->addMessage( 'AuthMsg', 'Login successful.' );
              else
                $this->modules['Message']->addMessage( 'AuthMsg', 'Login failed.' );
            }
          }
          catch( Exception $e )
          {
            throw $e;
          }

		  return true;
		}
		
		/**
		 * 
		 * User logout
		 * 
		 */
		public function logout()
		{
		  $this->modules['Auth']->destroy();
		  return true;
		}
		
		// End Region
	}
?>