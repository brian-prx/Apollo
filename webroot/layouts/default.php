<html>
	<head>
		<title><?php echo $layout_title; ?></title>
		<link rel='stylesheet' type='text/css' href='<?php echo ROOT_DIR; ?>webroot/css/default.css' />
	</head>
	<body>
		<div id="wrapper">
			<div class="panel shadow">
				<h2>Apollo</h2>
				<h4>Version: 1.0</h4>
			</div>
			<div class="panel shadow">
				<h3>Menu</h3>
				<hr />
				<?php echo $this->modules['Html']->link( 'views/auth/logout.php', 'logout' ); ?>
			</div>
			<div class="panel shadow">
				<h3>Modules</h3>
				<hr />
				<?php if ( $this->modules ) echo $this->modules['Html']->getList( $this->modules['Auth']->getModuleNames() ); ?>
			</div>
			<div class="panel shadow">
				<?php echo $layout_content; ?>
			</div>
			<?php if ( $this->debug ) { ?>
			<div class="panel shadow">
				<h3>Debugger</h3>
				<hr />
				<?php $this->debug(); ?>
			</div>
			<?php } ?>
		</div>
	</body>
</html>