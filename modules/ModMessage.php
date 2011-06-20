<?php
  class ModMessage extends ModController
  {
    // Region variables
    
    public $name = 'Message';
    
    public $description = 'Message Module';
    
    // End region
    
    // Region public functions
    
    /**
     * 
     * Add an alert message
     * 
     * @param string $name
     * @param string $message
     */
    public function addMessage( $name, $message )
    {
      $_SESSION['apollo_messages'][$name] = $message;
    }
    
    /**
     * 
     * Get all alert messages
     * 
     */
    public function getMessages()
    {
      $html = '';
      
      if ( !empty( $_SESSION['apollo_messages'] ))
      {
        $messages = $_SESSION['apollo_messages'];
        unset( $_SESSION['apollo_messages'] );
        
        $html = "<div class='message panel shadow'>";
        
        foreach ( $messages as $message )
          $html .= "<p>{$message}</li>";
        
        $html .= "</div>";
      }
        
      return $html;
    }
    
    /**
     * 
     * Get an alert message
     * 
     * @param string $name
     */
    public function getMessage( $name )
    {
      return $_SESSION['apollo_messages'][$name];
    }
    
    // End region
  }
?>