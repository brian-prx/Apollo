<html>
	<head>
		<title><?php echo $layout_title; ?></title>
		<link rel='stylesheet' type='text/css' href='<?php echo ROOT_DIR; ?>webroot/css/default.php' />
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
				<?php 
					$MainMenu = $this->modules['Menu']->getMenu( 'apollo_main' );
					
					if ( is_object( $MainMenu ) )
					{
						foreach ( $MainMenu->items as $item )
						{
							if ( $item['hidden'] ) continue;
							echo "<a class='button' href='" . ROOT_DIR . $item['path'] . "' on.click='this.blur();'><span>" . $item['link_text'] . "</span></a>";
						}
					}
				?>
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