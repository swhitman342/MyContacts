<?php 
//	$conn = new mysqli('localhost','root','','mycontacts');

//$sql = "SELECT * FROM contacts WHERE contact_id={$_GET['id']}";
//$results = $conn->query($sql);

//$contact = $results->fetch_assoc();
//Extract($contact);
//extract($contact);

//$conn->close();

?>

<h3>Edit Contact: <?php echo '$contact_firstname'.'$contact__lastname' ?></h3>

 <form class="form-horizontal" action="./?p=add_contact" method="post">
	  <div class="control-group">
	  <label class="control-label" for="contact_firstname">Contact Name</label>
	  	<div class="controls">
	  	<input type="text" value="<?php "$contact_firstname"?>">,
	  	<input type="text" value="<?php "$contact_lastname"?>">,
	  	
	    </div>
	  </div>
	  <div class="control-group">
	  <label class="control-label" for="contact_email">Email</label>
	  	<div class="controls">
	  		<input type="text" value="<?php "$contact_email"?>">,
	    </div>
	  </div>
	   <div class="control-group">
	  <label class="control-label" for="contact_phone">Phone #</label>
	  	<div class="controls">
	<!--   (<input type="text" name="phone_1" value="$_POST['$phone_1']">)
	  		<input type="text" name="phone_2" placeholder="555">-
	  		<input type="text" name="phone_3" placeholder="8899">-->
	  		(<input type="text" value="<?php "$phone_1"?>">)
	  		<input type="text" value="<?php "$$phone_2"?>">-
	  		<input type="text" value="<?php "$$phone_3"?>">
	    </div>
	  </div>
	  </div>
	  <div class="form-actions">
	  	<button type="submit" class="btn btn-primary"><i class="icon-plus-sign"></i> Add</button>
	  	<button value="./?p=list_contacts" type="button" class="btn">Cancel</button>
	  </div>
  </form>

