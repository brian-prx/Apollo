<html>
	<head>
		<title><?php echo $layout_title; ?></title>
		<link rel='stylesheet' type='text/css' href='<?php echo ROOT_DIR; ?>webroot/css/default.css' />
	</head>
	<body>
		<div id="wrapper">
			<div class="header panel shadow">
				<h2>Apollo</h2>
				<h4>Version: 1.0</h4>
				<hr />
				<p><?php echo 'Error generated at:' . date( 'Y-M-d H:i:s' ); ?></p>
			</div>
			<div class="error panel shadow">
				<h2>Application Error</h2>
				<p><?php echo $layout_error_msg; ?></p>
			</div>
			<?php if ( $Dispatcher->debug ) { ?>
			<div class="panel shadow">
				<h3>Debugger</h3>
				<hr />
				<?php $Dispatcher->debug(); ?>
			</div>
			<?php } ?>
		</div>
	</body>
</html>