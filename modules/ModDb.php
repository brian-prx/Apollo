<?php
	class ModDb extends ModController
	{
		public $name = 'Db';
		public $description = 'Database module';
	
		private $host = null;
		private $db_name = null;
		private $db_user = null;
		private $db_pass = null;
		
		public function __construct( $host = null, $db_name = null, $db_user = null, $db_pass = null )
		{
			$this->host = $host;
			$this->db_name = $db_name;
			$this->db_user = $db_name;
			$this->db_pass = $db_pass;
		}
		
		public function getModules()
		{
			try
			{
				
			}
			catch( Exception $e )
			{
				throw $e;
			}
		}
	}
?>