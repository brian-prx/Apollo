<h3>Group Index</h3>
<?php if ( !empty( $results ) && !empty( $fields ) ) { ?>
<?php $i = 0; ?>
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
		<?php $class = ( ++$i % 2 == 0 ) ? 'trow' : 'altrow'; ?>
		<tr class='<?php echo $class?>'>
			<?php foreach ( $result as $key => $value ) { ?>
			<td><?php echo $value; ?></td>
			<?php } ?>
			<td>
				<a href='<?php echo ROOT_DIR; ?>groups/edit/<?php echo $result['id']; ?>'>edit</a>
				<a href='<?php echo ROOT_DIR; ?>groups/del/<?php echo $result['id']; ?>'>del</a>
			</td>
		</tr>
		<?php } ?>
	</tbody>
</table>
<?php } ?>