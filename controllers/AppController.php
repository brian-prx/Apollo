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
			return $this->name;
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