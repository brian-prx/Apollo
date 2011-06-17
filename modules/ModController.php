<?php
	class ModController implements IModule, IController
	{
		// Region variables
	
		public $name = 'Mod';
		public $description = 'Parent Class';
		
		// End region
		
		// Public functions
		
		/**
		 * 
		 * Load all modules
		 * 
		 * @throws Exception
		 */
		public static function loadModules()
		{
			if ( $dh = opendir( MOD_DIR ) )
			{
				$skip = array( '.', '..', 'ModController.php' );
				while ( false !== ( $file = readdir( $dh ) ) )
				{
					if ( in_array( $file, $skip ) ) continue;
					$mod_name = basename( $file, '.php' );
					$Module = new $mod_name();
					$modules[$Module->name] = $Module;
				}
				if ( !empty( $modules ) ) return $modules;
				else return false;
			}
			else throw new Exception( 'Could not open MOD_DIR. Check permissions of ' . MOD_DIR . '. ' );
		}
		
		/**
		 * 
		 * Load module by class name
		 * 
		 * @param string $name
		 */
		public static function loadModuleByName( $name )
		{
			if ( !empty( $name ) )
			{
				// Do something...
			}
			return false;
		}
		
		public function debug()
		{
			
		}
		
		// End region
		
		// Region private functions
		
		
		
		// End region
		
		// Region protected methods
		
		protected function getModules()
		{
			
		}
		
		protected function getModuleNames()
		{
			$skip = array( '.', '..', 'ModController.php' );
			if ( $dh = opendir( MOD_DIR ) )
			{
				while ( false !== ( $file = readdir( $dh ) ) )
				{
					if ( in_array( $file, $skip ) ) continue;
					$mod_name = basename( $file, '.php' );
					$Module = new $mod_name();
					$module_names[] = $Module->name;
				}
				if ( !empty( $module_names ) ) return $module_names;
				else return false;
			}
			else throw new Exception( 'Could not open MOD_DIR. Check permissions of ' . MOD_DIR . '. ' );
		}
		
		// End region
	}
?>