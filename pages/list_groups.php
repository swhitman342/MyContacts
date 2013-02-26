<h2>Groups</h2>
<table class="list_groups">
<thead>
	<tr>
		<th>Groups</th>
		<th>Edit/Delete</th>
	</tr>
</thead>
<tbody>
		<tr><td><a href="./?p=group&id=1">Friends</a></td>
			<td><label><a href="<?php echo "./?p=form_edit_contact&id=$contact_id" ?>" class="btn btn-warning"><i class="icon-edit"></i></a> </label>
			<a href="<?php echo "actions/delete_contact.php" ?>" class="btn btn-danger"><i class="icon-trash"></i></a> </td></tr> 
		<tr><td><label><a href="./?p=group&id=2">CoWorkers</a></label></td>
			<td><a href="<?php echo "./?p=form_edit_contact&id=$contact_id" ?>" class="btn btn-warning"><i class="icon-edit"></i></a> 
			<a href="<?php echo "actions/delete_contact.php" ?>" class="btn btn-danger"><i class="icon-trash"></i></a> </td></tr>
		<tr><td><label><a href="./?p=group	&id=3">Stalkers</a></label></td><td>			 
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