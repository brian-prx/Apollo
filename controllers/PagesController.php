<?php 
	class PagesController extends AppController
	{
		// Region variables
		
		public $name = 'Pages';
		
		// End region
		
		// Region public functions
		
		public function __construct()
		{
			parent::__construct();
		}
		
		public function display( $params )
		{
			$result = null;
			
			$sql = 'SELECT name, title, content FROM ' . strtolower( $this->name ) . ' WHERE name=\'' . $params['name'] . '\';';
			
						
			$db_result = $this->modules['Db']->query( $sql );
			
			$result = mysql_fetch_assoc( $db_result );
			
			return $result;
		}
		
		// End region
	}
?>