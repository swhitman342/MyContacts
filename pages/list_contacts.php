<?php 
// check to see if use is searching for a contact
if(isset($_GET['q']) && $_GET['q'] != '' ){
	extract($_GET);
	$_SESSION['message'] = array(
			'type' => 'info',
			'text' => "Search Results for: <h5>$q</h5>" );
	$where = "WHERE contact_lastname LIKE '%$q%' OR contact_firstname LIKE '%$q%'";

	
	
	?>  <button onclick="window.history.go(-1)">Back To All Contacts</button>  <?php 
} else {
	$where = '';
}
?>

<h2>Contacts</h2>
<table class="table">
	<thead>
		<tr>
			<th>Name</th>
			<th>Email</th>
			<th>Phone</th>
			<th>Group</th>
			<th>Edit | Delete</th>
		</tr>
	</thead>
<tbody>
	<?php 
	
	// connect to DB
	$conn = new mysqli('localhost','root','','mycontacts');
	//('DB_HOST','DB_USER','DB_PASS','DB_NAME');
	// Query DB
	$sql = "SELECT *
		FROM contacts
		LEFT JOIN groups ON contacts.group_id = groups.group_id
		$where ORDER BY contact_lastname,contact_firstname";
	$results = $conn->query($sql);
	
	// Loop over result set, display contacts
	while(($contact = $results->fetch_assoc()) != null) {
		extract($contact);
		?>
		<tr>
		
			<td><?php echo $contact_firstname?> <?php echo $contact_lastname ?> </td>
			<td><a href="mailto:$contact_email"><?php echo $contact_email ?></a></td>
			<td><?php echo format_phone($contact_phone)?></td>
			<td><a href="<?php echo "./?p=group&id=$group_id"?>" ><span class="label label-info"><?php echo "$group_name"?></span></a></td>
			 <td><a href="<?php echo "./?p=form_edit_contact&id=$contact_id" ?>" class="btn btn-warning"><i class="icon-edit"></i></a> 
			  <a href="<?php echo "actions/delete_contact.php?id=$contact_id" ?>" class="btn btn-danger"><i class="icon-trash"></i></a> </td>
			<?php //&id=$contact_id ?>
		</tr>
	<?php }
	// Close DB connection
	$conn->close();
	?>
</tbody>
</table>