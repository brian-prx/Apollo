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
			<div class="menu panel shadow">
				<a class="button" href="<?php echo ROOT_DIR; ?>" onclick="this.blur();"><span>home</span></a>
				<a class="button" href="<?php echo ROOT_DIR; ?>users" onclick="this.blur();"><span>users</span></a>
				<a class="button" href="<?php echo ROOT_DIR; ?>groups" onclick="this.blur();"><span>groups</span></a>
				<a class="button" href="<?php echo ROOT_DIR; ?>pages" onclick="this.blur();"><span>pages</span></a>
				<a class="button" href="<?php echo ROOT_DIR; ?>logout" onclick="this.blur();"><span>logout</span></a>
			</div>
			<div class="content panel shadow">
				<?php echo $layout_content; ?>
			</div>
			<div class="footer panel shadow">
				<p>Apollo Project &copy; | <?php echo date('Y'); ?></p>
			</div>
			<?php if ( $this->debug ) { ?>
			<div class="debugger panel shadow">
				<h3>Debugger</h3>
				<hr />
				<span><?php $this->debug(); ?></span>
			</div>
			<?php } ?>
		</div>
	</body>
</html>