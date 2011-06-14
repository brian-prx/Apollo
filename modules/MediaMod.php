<?php
	class MediaMod implements IModule
	{
		private $default_player = null;
		public $mime_type = null;
	
		public function __construct( $filepath )
		{
			try
			{
				$finfo = new finfo(FILEINFO_MIME);
				if ( !$finfo ) throw new Exception('Could not determine file information.');
				else
				{
					$this->mime_type = $finfo->file( $filepath );
					$this->convertMimeType();
				}
			}
			catch (Exception $e)
			{
				throw $e;
			}
		}
		
		private function convertMimeType()
		{
			
		}
	}
?>