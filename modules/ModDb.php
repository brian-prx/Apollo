<?php
	class ModDb extends ModController
	{
		public $name = 'Db';
		public $description = 'Database module';
	
		private $db_host = null;
		private $db_name = null;
		private $db_user = null;
		private $db_pass = null;
		private $db_link = null;
		private $db_result = null;
		
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
		
		public function getDbLink()
		{
			return $this->db_link;
		}
		
		/**
		 * 
		 * Get all records by name
		 * 
		 */
		public static function getAllByName( $name )
		{
			$result = array();
			$link = mysql_connect( 'localhost', 'root', '' );
			
			if ( false === $link )
				throw new Exception( 'Error establishing connection to localhost.' );
			if ( false === mysql_select_db( 'apollo' ) )
				throw new Exception( 'Could not select db: apollo.' );

			$mysql_safe = mysql_real_escape_string( 'SELECT * FROM ' . strtolower( $name ) );
			$dresult = &mysql_query( $mysql_safe );
			
			return $dresult;
			
			
			if ( $result )
				return $result;
			else
				throw new Exception( $name . 'Controller produced no result for the following function: index()' );
		}
		
		/**
		 * 
		 * Execute a raw MySQL statement
		 * 
		 * @param string $sql
		 */
		public function query( $sql )
		{
			try
			{
				$sql_safe = mysql_real_escape_string( $sql, $this->db_link );
				return mysql_query( $sql_safe, $this->db_link );
			}
			catch( Exception $e )
			{
				throw $e;
			}
			
		}
		
		/**
		 * 
		 * Get table field names
		 * 
		 * @param string $name
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
						$fields[] = $row;
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