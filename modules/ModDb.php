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
		
		protected $rec_cnt = null;
		
		protected $last_insert_id = null;
		
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
		
		/**
		 * 
		 * Issue raw sql query
		 * 
		 * @param string $sql
		 * @throws Exception
		 */
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
		 * Insert a new record
		 * 
		 * @param string $table
		 * @param array $data
		 */
		public function insert( $table, $data )
		{
		  $fields = $values = '';
		  $results = array();
		  
		  foreach ( $data as $field => $val )
		  {
		    $fields .= '`' . $field . '`,';
		    if ( is_numeric( $val ) )
		      $values .= $val . ',';
		     else
		       $values .= '\'' . $val . '\',';
		  }
		  
		  $sql = 'INSERT INTO ' . $table . ' ( ' . substr( $fields, 0, -1 ) . ' ) VALUES (' . substr( $values, 0, -1 ) . ');';
          try
          {
		    $result = $this->query( $sql );
		  
		    if ( empty( $result ) ) throw new Exception( 'Could not insert new record into ' . $table . '.' );
		  
		    $this->last_insert_id = mysql_insert_id( $this->db_link );
          }
          catch( Exception $e )
          {
            throw $e;
          }
          
          return true;
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
		
		public function delete( $name, $id )
		{
		  $sql = 'DELETE FROM ' . $name . ' WHERE id=' . $id;
		  
		  $this->db_result = $this->query( $sql );
		  
		  return $this->db_result;
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
			
			if ( $name == 'App' ) return ;
			
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
				else throw new Exception( 'Could not retrieve fields for object of type ' . $name );
			}
			catch( Exception $e )
			{
				throw $e;
			}
			
			return $fields;
		}
		
		/**
		 * 
		 * Get last inserted record id
		 * 
		 */
		public function getLastInsertId()
		{
		  if ( $this->last_insert_id ) return $this->last_insert_id;
		  return false;
		}
		
		/**
		 * 
		 * Return properties of a table
		 * 
		 * @param string $name
		 */
		public function describeTable( $name )
		{
		  $results = array();
		  
	      $sql = 'DESCRIBE `' . $name . '`';
	      $result = $this->query( $sql, $this->db_link );

	      while ( $row = mysql_fetch_assoc( $result ) )
	        $results[] = $row;
	        
	      if ( $results ) return $results;
	      else throw new Exception( 'Could not describe table: ' . $name );
		}
		
		/**
		 * 
		 * Check if field is required
		 * 
		 * @param string $name
		 */
		public function isRequired( $table, $name )
		{
		  $fields = $this->describeTable( $table );

		  foreach ( $fields as $field ) {
		    if ( $field['Field'] == $name )
		      return ( $field['Null'] == 'NO' ) ? true : false;
		  }
		}
	}
?>