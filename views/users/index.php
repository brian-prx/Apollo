<h3>User Index</h3>
<?php if ( !empty( $results ) && !empty( $fields ) ) { ?>
<table>
	<thead>
		<tr class='thead'>
			<?php foreach ( $fields as $field ) { ?>
			<th><?php echo $field; ?></th>
			<?php } ?>
			<th>Actions</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ( $results as $result ) { ?>
		<tr>
			<?php foreach ( $result as $key => $value ) { ?>
			<td><?php echo $value; ?></td>
			<?php } ?>
			<td>
				<a href='<?php echo ROOT_DIR; ?>users/edit/<?php echo $result['id']; ?>'>edit</a>
				<a href='<?php echo ROOT_DIR; ?>users/del/<?php echo $result['id']; ?>'>del</a>
			</td>
		</tr>
		<?php } ?>
	</tbody>
</table>
<p class='centered'><?php echo 'Records: ' . $recs; ?></p>
<?php } ?>
<a href='<?php echo ROOT_DIR?>users/add' onclick='this.blur();'>new user</a>