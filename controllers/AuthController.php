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
      
      
      return true;
    }
    
    // End region
  }
?>