<?php
	class AppController
	{
		// Region variables
		
		public $name = 'App';
		
		private $form_data = array();
		
		private $vars = array();
		
		protected $modules = array();
		
		protected $skip_fields = array('id', 'last_login');
		
		protected $num_last_results = null;
		
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
			/**
			 * Return the table fields if not processing a form
			 */
			try
			{
			    $view_fields = array();
		    	$i = 0;
			  
				if ( empty( $this->form_data ) )
				{
					$fields = $this->modules['Db']->getFields( $this->name );

					foreach ( $fields as $field )
					{
						if ( in_array( $field, $this->skip_fields ) ) continue;
						$view_fields[$i]['name'] = $field;
						$view_fields[$i]['required'] = $this->modules['Db']->isNullAllow( strtolower ( $this->name ), $field );
						$i++;
					}
					return $view_fields;
				}
			}
			catch( Exception $e )
			{
				throw $e;
			}
			
			/**
			 * Insert the record
			 */
			try
			{
			  if ( !empty( $this->form_data ) )
			  {
			    return $this->modules['Db']->insert( strtolower( $this->name ), $this->form_data );
			  }
			}
			catch( Exception $e )
			{
			  throw $e;
			}
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
			
			$this->num_last_results = mysql_num_rows( $db_results );

			while ( $row = mysql_fetch_assoc( $db_results ) )
			{
				$results[] = $row;
			}
			
			return $results;
		}
		
		/**
		 * 
		 * Delete a record
		 * 
		 */
		public function del( $id )
		{
		  $result = $this->modules['Db']->delete( $this->name, $id );
		  
		  if ( $result ) $this->modules['Message']->addMessage( $this->name, $this->name . ' ' . $id . ' deleted' );
		  else $this->modules['Message']->addMessage( $this->name, 'Failed to delete ' . $this->name . ' ' . $id );
		  return $result;
		}
		
		/**
		 * 
		 * Return number of records found from last MySQL statement
		 * 
		 */
		public function getRecordCount()
		{
		  return $this->num_last_results;
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