<h2>Groups</h2>
<table class="list_groups">



<thead>
	<tr>
		<th>Groups</th>
		<th>#</th>
		<th>Edit/Delete</th>
	</tr>
</thead>
<tbody>
<?php 

$conn = new mysqli('localhost','root','','mycontacts');


// store form data into session data
$_SESSION['POST'] = $_POST;

$sql = "SELECT groups.*, COUNT(contact_id) AS
num_contacts FROM groups LEFT JOIN contacts ON 
groups.group_id=contacts.group_id GROUP BY
groups.group_id ORDER BY num_contacts DESC, group_name";

$results = $conn->query($sql);


?>


	
	
	
	
		<tr><td><a href="./?p=group&id=1">Friends</a></td><td><span class="badge badge-inverse"><?php echo "$num_contacts" ?></span></td>
			<td><a href="<?php echo "./?p=form_edit_contact&id=$contact_id" ?>" class="btn btn-warning"><i class="icon-edit"></i></a> 
			<a href="<?php echo "actions/delete_contact.php" ?>" class="btn btn-danger"><i class="icon-trash"></i></a> </td></tr> 
		<tr><td><a href="./?p=group&id=2">CoWorkers</a></td><td><span class="badge badge-inverse"><?php echo "$num_contacts" ?></span></td>
			<td><a href="<?php echo "./?p=form_edit_contact&id=$contact_id" ?>" class="btn btn-warning"><i class="icon-edit"></i></a> 
			<a href="<?php echo "actions/delete_contact.php" ?>" class="btn btn-danger"><i class="icon-trash"></i></a> </td></tr>
		<tr><td><a href="./?p=group	&id=3">Stalkers</a></td><td><span class="badge badge-inverse"><?php echo '5' ?></span></td>		 
			<td><a href="<?php echo "./?p=form_edit_contact&id=$contact_id" ?>" class="btn btn-warning"><i class="icon-edit"></i></a> 
			<a href="<?php echo "actions/delete_contact.php" ?>" class="btn btn-danger"><i class="icon-trash"></i></a> </td></tr>
			<?php $conn->close();?>
</tbody>
		</table>
		
			<div class="form-actions">
		<a href="./?p=form_add_group"><button onclick="./?p=form_add_group" class="btn btn-primary">
			<i class="icon-plus-sign"></i> Add Group
		</button></a>
		<button onclick="window.history.go(-1)" type="button" class="btn">Cancel</button>
	</div>
