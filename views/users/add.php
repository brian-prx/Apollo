<h3>User Add</h3>
<?php if (!empty( $results ) ) { ?>
	<form action='' method='post'>
	<fieldset>
	<legend>Personal Information</legend>
	<?php foreach ( $results as $field ) { ?>
		<div class='form_field'>
		<label for='<?php echo $field['name']; ?>' class='<?php echo ( $field['required'] ) ? 'required' : ''; ?>'><?php echo $field['name']; ?></label>
		<input type='text' name='<?php echo $field['name']; ?>' id='<?php echo $field['name']; ?>' />
		</div>
	<?php } ?>
	</fieldset>
	
	<fieldset>
		<legend>Permissions</legend>
	</fieldset>
	<input type='submit' value='add user' />
	</form>
<?php } ?>