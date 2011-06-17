<?php
	class AppController
	{
		// Region variables
		
		public $name = 'App';
		private $vars = array();
		
		// End region
		
		// Region public functions
		
		/**
		 * 
		 * Returns a string representation of the class
		 * 
		 */
		public function __toString()
		{
			return $this->name . 'Controller';
		}
		
		/**
		 * 
		 * Add a new object
		 * 
		 */
		public function add()
		{
			return true; // Testing
		}

		/**
		 * 
		 * Get all objects
		 * 
		 * @param string $controller
		 */
		public function index( $controller )
		{
			$results = array();
			$db_results = ModDb::getAllByName( $controller );
			
			while ( $row = mysql_fetch_assoc( $db_results ) )
			{
				$results[] = $row;
			}
			
			return $results;
		}
		
		/**
		 * 
		 * Edit an object
		 * 
		 */
		public function edit()
		{
			return true;
		}
		
		/**
		 * Delete an object
		 */
		public function del()
		{
			return true;
		}
		
		/**
		 * 
		 * Set an application variable
		 * 
		 * @param string $name
		 * @param mixed $var
		 */
		public function setVar( $name, $var )
		{
			$this->vars[$name] = $var;
		}
		
		/**
		 * 
		 * Get an application variable
		 * 
		 * @param string $name
		 */
		public function getVar( $name )
		{
			return $this->vars[$name];
		}
		
		// End region
	}
?>