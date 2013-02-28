
<h2>Add a Group</h2>
<form class="form-horizontal" action="actions/add_group.php" method="post">
<div class="control-group">
<label class="control-label" for="group_name">Group Name</label>
<div class="controls">
			<?php echo input("Group_name","Name")?>
		</div>
	</div>
	<div class="form-actions">
		<button type="submit" class="btn btn-success">
			<i class="icon-plus-sign"></i> Add
		</button>
		<button onclick="window.history.go(-1)" type="button" class="btn">Cancel</button>
	</div>
	</form>