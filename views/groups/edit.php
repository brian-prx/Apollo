<h3>User Edit</h3>
<form action='' method='post'>
	<?php foreach ( $results as $key => $value ) { ?>
		<?php echo $key; ?>:<input type='text' name='<?php echo $key; ?>' value='<?php echo $value; ?>' />
	<?php } ?>
	<input type='submit' value='update' />
</form>
<?php
	
?>