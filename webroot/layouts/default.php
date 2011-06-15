<html>
	<head>
		<title><?php echo $layout_title; ?></title>
		<?php
			foreach ( $layout_css as $css )
				echo "<link rel='stylesheet' type='text/css' href='webroot/css/{$css}.css' />";
		?>
	</head>
	<body>
		<div id="wrapper">
			<div class="panel shadow">
				<h2>Apollo</h2>
				<h4>Version: 1.0</h4>
			</div>
			<div class="panel shadow">
				<h3>Modules</h3>
				<hr />
				<?php
					if ( false !== ($Modules = $this::getModules() ) )
					{
						foreach ( $Modules as $Module )
							echo $Module->name . '<br />';

						$this->setDebugVar( $Modules );
					}
				?>
			</div>
			<div id="content">
				<?php echo $layout_content; ?>
			</div>
			<?php if ( $this->debug ) { ?>
				<div class="panel shadow">
					<h3>Debugger</h3>
					<hr />
					<?php $this->debug(); ?>
				</div>
			<?php } ?>
	</body>
</html>