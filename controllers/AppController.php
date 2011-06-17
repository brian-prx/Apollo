<?php
	class AppController
	{
		// Region variables
		
		public $name = 'App';
		
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
			
		}
		
		/**
		 * 
		 * Index all objects
		 * 
		 */
		public function index( $name )
		{
			$sql = 'SELECT * FROM ' . $name;
			$result = mysql_query( $sql );
			
			if ( $result )
				return $result;
			else
				throw new Exception( $name . 'Controller produced no result for the following function: index.' );
		}
		
		/**
		 * 
		 * Edit an object
		 * 
		 */
		public function edit()
		{
			
		}
		
		/**
		 * Delete an object
		 */
		public function del()
		{
			
		}
		
		// End region
	}
?>