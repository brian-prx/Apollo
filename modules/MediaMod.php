<?php
	class MediaMod implements IModule
	{
		private $default_player = null;
		private $mime_type = null;
		private $application_mime_types = array(
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
		);
		private $audio_mime_types = array(
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
		);
		private $image_mime_types = array(
			'image/gif',
			'image/jpeg',
			'image/pjpeg',
			'image/png',
			'image/svg+xml',
			'image/tiff',
			'image/vnd.microsoft.icon'
		);
		private $message_mime_types = array(
			'message/http',
			'message/imdn+xml',
			'message/partial',
			'message/rfc822'
		);
		private $model_mime_types = array(
			'model/example',
			'model/iges',
			'model/mesh',
			'model/vrml',
			'model/x3d+binary',
			'model/x3d+vrml',
			'model/x3d+xml'
		);
		private $multipart_mime_types = array(
			'multipart/mixed',
			'multipart/alternative',
			'multipart/related',
			'multipart/form-data',
			'multipart/signed',
			'multipart/encrypted'
		);
		private $text_mime_types = array(
			'text/cmd',
			'text/css',
			'text/csv',
			'text/html',
			'text/javascript',
			'text/plain',
			'text/xml'
		);
		private $video_mime_types = array(
			'video/mpeg',
			'video/mp4',
			'video/ogg',
			'video/quicktime',
			'video/webm',
			'video/x-ms-wmv'
		);
		private $vnd_mime_types = array(
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
		);
		private $x_mime_types = array(
			'application/x-www-form-urlencoded',
			'application/x-dvi',
			'application/x-latex',
			'application/x-font-ttf',
			'application/x-shockwave-flash',
			'application/x-stuffit',
			'application/x-rar-compressed',
			'application/x-tar',
			'text/x-jquery-tmpl',
			'application/x-javascript:'
		);
		private $x_pkcs_mime_types = array(
			'application/x-pkcs12',
			'application/x-pkcs12',
			'application/x-pkcs7-certificates',
			'application/x-pkcs7-certificates',
			'application/x-pkcs7-certreqresp',
			'application/x-pkcs7-mime',
			'application/x-pkcs7-mime',
			'application/x-pkcs7-signature'
		);
	
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
			try
			{
				
			}
			catch (Exception $e)
			{
				throw $e;
			}
		}
	}
?>