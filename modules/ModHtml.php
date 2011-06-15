<?php
	class ModHtml extends ModController
	{
		public $name = 'Html';
		public $description = 'Html helper module';
	
		public function __constuct()
		{
		
		}
		
		public function link( $path = "/", $link_text = "" )
		{
			$html = "<a href='{$path}'>{$link_text}</a>";
			return $html;
		}
		
		public function getList( $items = array(), $type = "ul" )
		{
			try
			{
				$html = "<{$type}>";
				foreach ( $items as $item )
					$html .= "<li>{$item}</li>";
				$html .= "</{$type}>";
				return $html;
			}
			catch( Exception $e )
			{
				throw $e;
			}
		}
	}
?>