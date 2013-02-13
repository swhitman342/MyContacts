<h2>Add a Contact</h2>

<form class="form-horizontal" action="./?p=add_contact" method="post">
	  <div class="control-group">
	  <label class="control-label" for="contact_firstname">Contact Name</label>
	  	<div class="controls">
	  		<?php echo input("contact_firstname","First Name")?>,
	  		<?php echo input("contact_lastname","Last Name")?>
	    </div>
	  </div>
	  <div class="control-group">
	  <label class="control-label" for="contact_email">Email</label>
	  	<div class="controls">
	  		<?php echo input("contact_email","youremail@email.com")?>,
	    </div>
	  </div>
	   <div class="control-group">
	  <label class="control-label" for="contact_phone">Phone #</label>
	  	<div class="controls">
	  		(<input type="text" name="phone_1" placeholder="333">)
	  		<input type="text" name="phone_2" placeholder="555">-
	  		<input type="text" name="phone_3" placeholder="8899">
	    </div>
	  </div>
	  </div>
	  <div class="form-actions">
	  	<button type="submit" class="btn btn-primary"><i class="icon-plus-sign"></i> Add</button>
	  	<button value="./?p=list_contacts" type="button" class="btn">Cancel</button>
	  </div>
  </form>

