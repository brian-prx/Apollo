<?php
	class AppController
	{
		// Region variables
		
		public $name = 'App';
		
		private $form_data = array();
		
		private $vars = array();
		
		protected $modules = array();
		
		// End region
		
		// Region public functions
		
		/**
		 * 
		 * AppController constructor
		 * 
		 */
		public function __construct()
		{
			$this->modules = ModController::loadModules();
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
		public function index()
		{
			$results = array();

			$sql = 'SELECT * FROM ' . strtolower( $this->name ) . ';';

			$db_results = $this->modules['Db']->query( $sql );

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
		 * @param array $params
		 */
		public function edit( $params )
		{
			if ( empty( $this->form_data ) )
			{
				$result = null;
				
				$sql = 'SELECT * FROM ' . strtolower( $this->name ) . ' WHERE id=' . $params .';';
				
				$db_results = $this->modules['Db']->query( $sql );
				
				$row = mysql_fetch_assoc( $db_results );
	
				$result = $row;
	
				return $result;
			}
			return $this->modules['Db']->update( $this->name, $this->form_data );
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
		
		// Region private function
		
		/**
		 * 
		 * Set data retrieved from form
		 * 
		 * @param array $data
		 */
		public function setFormData( $data )
		{
			$this->form_data = $data;
		}
		
		// End region
	}
?>