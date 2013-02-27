<h2>Groups</h2>
<table class="list_groups">

<?php 

$conn = new mysqli('localhost','root','','mycontacts');


// store form data into session data
$_SESSION['POST'] = $_POST;

$sql = "SELECT groups.*, COUNT(contact_id) AS
num_contacts FROM groups LEFT JOIN contacts ON 
groups.group_id=contacts.group_id GROUP BY
groups.group_id ORDER BY num_contacts DESC, group_name";

$results = $conn->query($sql);
$conn->close();

?>


<thead>
	<tr>
		<th>Groups</th>
		<th>#</th>
		<th>Edit/Delete</th>
	</tr>
</thead>
<tbody>
		<tr><td><a href="./?p=group&id=1">Friends</a></td><td><span class="badge badge-inverse"><?php echo 'a' ?></span></td>
			<td><label><a href="<?php echo "./?p=form_edit_contact&id=$contact_id" ?>" class="btn btn-warning"><i class="icon-edit"></i></a> </label>
			<a href="<?php echo "actions/delete_contact.php" ?>" class="btn btn-danger"><i class="icon-trash"></i></a> </td></tr> 
		<tr><td><label><a href="./?p=group&id=2">CoWorkers</a></label></td><td><span class="badge badge-inverse"><?php echo 'a' ?></span></td>
			<td><a href="<?php echo "./?p=form_edit_contact&id=$contact_id" ?>" class="btn btn-warning"><i class="icon-edit"></i></a> 
			<a href="<?php echo "actions/delete_contact.php" ?>" class="btn btn-danger"><i class="icon-trash"></i></a> </td></tr>
		<tr><td><label><a href="./?p=group	&id=3">Stalkers</a></label></td><td><td><span class="badge badge-inverse"><?php echo 'a' ?></span></td>		 
			<td><a href="<?php echo "./?p=form_edit_contact&id=$contact_id" ?>" class="btn btn-warning"><i class="icon-edit"></i></a> 
			<a href="<?php echo "actions/delete_contact.php" ?>" class="btn btn-danger"><i class="icon-trash"></i></a> </td></tr>
</tbody>
		</table>
		
			<div class="form-actions">
		<button onclick="./?p=form_add_group" class="btn btn-primary">
			<i class="icon-plus-sign"></i> Add Group
		</button>
		<button onclick="window.history.go(-1)" type="button" class="btn">Cancel</button>
	</div>
	