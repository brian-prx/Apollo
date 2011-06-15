<?php
	class PageController implements IController
	{
		public $debug = true;
		private $debug_vars = array();
		private $modules = array();
		private $mod_objs = array();
	
		public function loadModules()
		{
			if ( empty( $this->modules ) )
			{
				if ( $dh = opendir( MOD_DIR ) )
				{
					while ( false !== ( $file = readdir( $dh ) ) )
					{
						if ( $file == '.' || $file == '..' ) continue;
						$Module = basename( $file, '.php' );
						$this->modules[] = new $Module();
					}
				}
				else throw new Exception( 'Could not open MOD_DIR. Check permissions of ' . MOD_DIR . '. ' );
			}
		}
		
		public function initModules()
		{
			
		}
		
		public function getModules()
		{
			return $this->modules;
		}
		
		public function debug()
		{
			foreach ( $this->debug_vars as $var )
			{
				if ( is_array( $var ) || is_object( $var ) )
				{
					print "<pre>";
					print_r( $var );
					print "</pre>";
				}
				else
				{
					print $var;
				}
			}
		}
		
		public function setDebugVar( $var )
		{
			$this->debug_vars[] = $var;
		}
	}
?>