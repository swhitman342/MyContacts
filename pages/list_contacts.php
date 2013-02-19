<h2>Contacts</h2>
<table class="table">
	<thead>
		<tr>
			<th>Name</th>
			<th>Email</th>
			<th>Phone</th>
		</tr>
	</thead>
<tbody>
	<?php 
	
	// connect to DB
	$conn = new mysqli('localhost','root','','mycontacts');
	//('DB_HOST','DB_USER','DB_PASS','DB_NAME');
	// Query DB
	$sql = 'SELECT * FROM contacts ORDER BY contact_lastname, contact_firstname';
	$results = $conn->query($sql);
	
	// Loop over result set, display contacts
	while(($contact = $results->fetch_assoc()) != null) {
		Extract($contact);
		?>
		<tr>
		
			<td><?php echo $contact_firstname?> <?php echo $contact_lastname ?> </td>
			<td><a href="mailto:$contact_email"><?php echo $contact_email ?></a></td>
			<td><?php echo format_phone($contact_phone)?></td>
			 <td><a href="<?php echo "./?p=form_edit_contact&id=$contact_id" ?>" class="btn btn-warning"><i class="icon-edit"></i></a> </td>
			  <td><a href="<?php echo "actions/delete_contact.php&id=$contact_id" ?>" class="btn btn-danger"><i class="icon-trash"></i></a> </td>
			
		</tr>
	<?php }
	// Close DB connection
	$conn->close();
	?>
</tbody>
</table>