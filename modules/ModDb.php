<?php
	class ModDb extends ModController
	{
		// Region variables
		
		public $name = 'Db';
		public $description = 'Database module';
	
		const db_host = 'localhost';
		const db_name = '';
		const db_user = 'root';
		const db_pass = null;
		
		private $db_link = null;
		private $db_result = null;
		
		// End region
		
		// Region public functions
		
		/**
		 * 
		 * MySQL ModDb constructor
		 * 
		 * @throws Exception
		 */
		public function __construct()
		{
			$link = mysql_connect( 'localhost', 'root', '' );
			if ( false === $link )
			{
				throw new Exception( 'Error establishing connection to localhost.' );
			}
			if ( false === mysql_select_db( 'apollo' ) )
			{
				throw new Exception( 'Could not select db: apollo.' );
			}
			$this->db_link = $link;
		}
		
		/**
		 * 
		 * Get the MySQL resource
		 * 
		 */
		public function getDbLink()
		{
			return $this->db_link;
		}
		
		/**
		 * 
		 * Execute a raw MySQL statement. 
		 * 
		 * @param string $sql
		 */
		public function query( $sql )
		{
			try
			{
				$result = mysql_query( $sql, $this->db_link );
			}
			catch( Exception $e )
			{
				throw $e;
			}
			
			return $result;
		}
		
		public static function rawQuery( $sql )
		{
			$tmp_db_conn = mysql_connect( ModDb::db_host, ModDb::db_user, '' );
			
			if ( !$tmp_db_conn ) throw new Exception( 'Could not establishing MySQL connection to ' . ModDb::db_host . '.' );
			
			if ( false === mysql_select_db( 'apollo' ) )
				throw new Exception( 'Could not select db: apollo.' );
			
			$results = mysql_query( $sql );	
			
			return $results;
		}
		
		/**
		 * 
		 * Update a record
		 * 
		 * @param string $name
		 * @param array $params
		 */
		public function update( $name, $params )
		{
			$sql = 'UPDATE ' . strtolower( $name ) . ' SET ';
			foreach ( $params as $field => $value )
			{
				if ( $field == 'id' ) continue;
				if ( !empty( $value ) ) $sql .= $field . '=' . $value . ', ';
			}
			$sql = substr( $sql, 0, -2); // Remove the trailing ", "
			
			$sql .= ' WHERE id=' . $params['id'] . ';';
			
			try
			{
				$db_result = $this->query( $sql );
			}
			catch( Exception $e )
			{
				throw $e;
			}
			
			return $sql;
		}
		
		/**
		 * 
		 * Get table field names
		 * 
		 * @param string $name
		 * @throws Exception $e
		 */
		public function getFields( $name )
		{
			$fields = array();
			
			try 
			{
				$sql = 'SHOW COLUMNS FROM ' . $name;
				$result = $this->query( $sql );
				
				if ( $result )
				{
					while ( $row = mysql_fetch_array( $result ) )
					{
						$fields[] = $row['Field'];
					}
				}
			}
			catch( Exception $e )
			{
				throw $e;
			}
			
			return $fields;
		}
	}
?>