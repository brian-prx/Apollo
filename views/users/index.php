<h3>User Index</h3>
<?php if ( !empty( $results ) && !empty( $fields ) ) { ?>
<?php $i = 0; ?>
<table>
	<thead>
		<tr class='thead'>
			<?php foreach ( $fields as $field ) { ?>
			<th><?php echo $field['Field']; ?></th>
			<?php } ?>
		</tr>
	</thead>
	<tbody>
		<?php foreach ( $results as $result ) { ?>
		<?php $class = ( ++$i % 2 == 0 ) ? 'trow' : 'altrow'; ?>
		<tr class='<?php echo $class?>'>
			<?php foreach ( $result as $key => $value ) { ?>
			<td><?php echo $value; ?></td>
			<?php } ?>
		</tr>
		<?php } ?>
	</tbody>
</table>
<?php } ?>