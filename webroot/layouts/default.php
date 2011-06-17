<html>
	<head>
		<title><?php echo $layout_title; ?></title>
		<link rel='stylesheet' type='text/css' href='<?php echo ROOT_DIR; ?>webroot/css/default.css' />
	</head>
	<body>
		<div id="wrapper">
			<div class="header panel shadow">
				<h2><a href='<?php echo ROOT_DIR; ?>'>Apollo</a></h2>
				<h4>Version: 1.0</h4>
				<hr />
				<p><?php echo date( 'Y-M-d H:i:s' ); ?></p>
			</div>
			<div class="panel shadow">
				<h3>Menu</h3>
				<hr />
				<?php echo $this->modules['Html']->link( 'views/auth/logout.php', 'logout' ); ?>
			</div>
			<div class="content panel shadow">
				<?php echo $layout_content; ?>
			</div>
			<div class="footer panel shadow">
				<?php echo 'Default footer'; ?>
			</div>
			<?php if ( $this->debug ) { ?>
			<div class="debugger panel shadow">
				<h3>Debugger</h3>
				<hr />
				<?php $this->debug(); ?>
			</div>
			<?php } ?>
		</div>
	</body>
</html>