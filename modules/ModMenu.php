<?php
	class ModMenu extends ModController
	{
		// Region variables
		
		public $name = 'Menu';
		
		public $description = 'Menu Module';
		
		private $menus = array();
		
		// End region
		
		// Region public functions
		
		public function init()
		{		
			if ( empty( $this->menus ) )
			{
				$result = array();
				
				$sql = 'SELECT * FROM apollo_menu_items WHERE menu=1';
				
				$db_result = ModDb::rawQuery( $sql );
				
				if ( !$db_result ) throw new Exception( 'Could not load apollo_main menu.' );
				
				while ( $row = mysql_fetch_assoc( $db_result ) )
					$result[] = $row;
				
				$Menu = new Menu( 'apollo_main' );
				
				foreach ( $result as $menu_item )
					$Menu->addItem( 'apollo_main_' . $menu_item['id'], $menu_item );
					
				$this->menus[] = $Menu;
			}
			else throw new Exception( 'ModMenu already initialized.' );
		}
		
		/**
		 * 
		 * Create a new menu
		 * 
		 * @param string $name
		 * @throws Exception
		 */
		public function addMenu( $name )
		{
			foreach ( $this->menus as $Menu )
				if ( $name === $Menu->name ) throw new Exception( 'ModMenu threw the following exception: Could not add menu - ' . $name . '. Duplicate name exists.');
			$this->menus[$name] = new Menu( $name ); 
		}
		
		/**
		 * 
		 * Get a menu by name
		 * 
		 * @param string $name
		 */
		public function getMenu( $name )
		{
			foreach ( $this->menus as $Menu )
				if ( $name === $Menu->name) return $Menu;
			throw new Exception( 'Could not load menu: ' . $name);
		}
		
		public function getMenuItems( $name )
		{
			return $this->menus[$name]->items;
		}
		
		// End Region
		
	}
	
	class Menu
	{
		public $name = null;
		
		public $items = array();
		
		public function __construct( $name )
		{
			$this->name = $name;
		}
		
		public function addItem( $name, $item )
		{
			$this->items[$name] = $item;
		}
		
		public function removeItem( $name )
		{
			
		}
		
		public function getAllItems()
		{
			return $this->items;
		}
	}
?>