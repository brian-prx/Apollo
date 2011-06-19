<?php
  class ModMessage extends ModController
  {
    // Region variables
    
    public $name = 'Message';
    
    public $description = 'Message Module';
    
    public $messages = array();
    
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
      $this->messages[$name] = $message;
    }
    
    /**
     * 
     * Get all alert messages
     * 
     */
    public function getMessages()
    {
      return $this->messages;
    }
    
    /**
     * 
     * Get an alert message
     * 
     * @param string $name
     */
    public function getMessage( $name )
    {
      return $this->messages[$name];
    }
    
    // End region
  }
?>