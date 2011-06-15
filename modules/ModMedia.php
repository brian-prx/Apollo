<?php
	class ModMedia extends ModController
	{
		private $types = array();
		
		private $mime_types = array(
			'MediaApplication' => array(
				'application/atom+xml',
				'application/EDI-X12',
				'application/EDIFACT',
				'application/json',
				'application/javascript',
				'application/octet-stream',
				'application/ogg',
				'application/pdf',
				'application/postscript',
				'application/soap+xml',
				'application/x-woff',
				'application/xhtml+xml',
				'application/xml-dtd',
				'application/xop+xml',
				'application/zip',
				'application/x-gzip'
			),
			'MediaAudio' => array(
				'audio/basic',
				'audio/L24',
				'audio/mp4',
				'audio/mpeg',
				'audio/ogg',
				'audio/vorbis',
				'audio/x-ms-wma',
				'audio/x-ms-wax',
				'audio/vnd.rn-realaudio',
				'audio/vnd.wave',
				'audio/webm'
			),
			'MediaImage' => array(
				'image/gif',
				'image/jpeg',
				'image/pjpeg',
				'image/png',
				'image/svg+xml',
				'image/tiff',
				'image/vnd.microsoft.icon'
			),
			'MediaMessage' => array(
				'message/http',
				'message/imdn+xml',
				'message/partial',
				'message/rfc822'
			),
			'MediaModel' => array(
				'model/example',
				'model/iges',
				'model/mesh',
				'model/vrml',
				'model/x3d+binary',
				'model/x3d+vrml',
				'model/x3d+xml'
			),
			'MediaMultipart' => array(
				'multipart/mixed',
				'multipart/alternative',
				'multipart/related',
				'multipart/form-data',
				'multipart/signed',
				'multipart/encrypted'
			),
			'MediaMext' => array(
				'text/cmd',
				'text/css',
				'text/csv',
				'text/html',
				'text/javascript',
				'text/plain',
				'text/xml'
			),
			'MediaVideo' => array(
				'video/mpeg',
				'video/mp4',
				'video/ogg',
				'video/quicktime',
				'video/webm',
				'video/x-ms-wmv'
			),
			'MediaVnd' => array(
				'application/vnd.oasis.opendocument.text',
				'application/vnd.oasis.opendocument.spreadsheet',
				'application/vnd.oasis.opendocument.presentation',
				'application/vnd.oasis.opendocument.graphics',
				'application/vnd.ms-excel',
				'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
				'application/vnd.ms-powerpoint',
				'application/vnd.openxmlformats-officedocument.presentationml.presentation',
				'application/msword',
				'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
				'application/vnd.mozilla.xul+xml',
				'application/vnd.google-earth.kml+xml'
			),
			'MediaX' => array(
				'application/x-www-form-urlencoded',
				'application/x-dvi',
				'application/x-latex',
				'application/x-font-ttf',
				'application/x-shockwave-flash',
				'application/x-stuffit',
				'application/x-rar-compressed',
				'application/x-tar',
				'text/x-jquery-tmpl',
				'application/x-javascript'
			),
			'MediaX-pkcs' => array(
				'application/x-pkcs12',
				'application/x-pkcs12',
				'application/x-pkcs7-certificates',
				'application/x-pkcs7-certificates',
				'application/x-pkcs7-certreqresp',
				'application/x-pkcs7-mime',
				'application/x-pkcs7-mime',
				'application/x-pkcs7-signature'
			)
		);

		public function __construct()
		{
			// Do somthing...
		}
		
		public function convertMimeTypes( $filepaths = array() )
		{
			try
			{
				$finfo = new finfo( FILEINFO_MIME_TYPE );
				if ( !$finfo ) throw new Exception('Could not determine file information. Check that php_fileinfo extension is enabled.');
				else
				{
					foreach ( $filepaths as $filepath )
					{
						$mime_types[] = $finfo->file( $filepath );
					}
				}
				
				foreach ( $this->mime_types as $key => $types )
				{
					foreach ( $mime_types as $mime_type )
					{
						if ( in_array ( $mime_type, $types ) )
							$this->media_objects[] = new $key();
					}
				}
			}
			catch (Exception $e)
			{
				throw $e;
			}
		}
	}
?>