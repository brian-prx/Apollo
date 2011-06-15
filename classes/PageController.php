<?php
	class PageController implements IController
	{
		public $debug = true;
		private $debug_vars = array();
		private $modules = array();

		public function loadModules()
		{
			if ( empty( $this->modules ) )
			{
				if ( $dh = opendir( MOD_DIR ) )
				{
					while ( false !== ( $file = readdir( $dh ) ) )
					{
						if ( $file == '.' || $file == '..' ) continue;
						$mod_name = basename( $file, '.php' );
						$Module = new $mod_name();
						$this->modules[$Module->name] = $Module;
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
		
		public function getModuleNames()
		{
			try
			{
				foreach ( $this->modules as $Module )
					$mod_names[] = $Module->name;
			}
			catch( Exception $e)
			{
				throw $e;
			}
			
			return $mod_names;
		}
		
		public function redirect( $url )
		{
			try
			{
				if ( $url !== null )
					header('Location: ' . $url );
			}
			catch( Exception $e )
			{
				throw $e;
			}
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