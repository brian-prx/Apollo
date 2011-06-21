<?php
  class AuthController extends AppController
  {
    // Region variables
    
    public $name = 'Auths';
    
    public $description = 'Authentication Module';
    
    // End region
    
    // Region public functions
    
    /**
     * 
     * View application permission
     * 
     */
    public function permissions()
    {
      return get_class_vars( 'UsersController' );
    }
    
    // End region
  }
?>