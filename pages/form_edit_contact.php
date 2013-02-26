<?php 
	$conn = new mysqli('localhost','root','','mycontacts');

$sql = "SELECT * FROM contacts WHERE contact_id={$_GET['id']}";
$results = $conn->query($sql);

$contact = $results->fetch_assoc();

extract($contact);

$conn->close();
 
$contact_id = $_GET['id'];
?>


<h3><b> Edit Contact: </b><a><?php echo "$contact_firstname".' ',"$contact_lastname"?></a> </h3> <br/>

 
 <form class="form-horizontal" action="actions/edit_contact.php" method="post">

<input type="hidden" value="<?php echo $contact_id ?>" name="contact_id">
	  <div class="control-group">
	  <label class="control-label" for="contact_firstname">Contact Name</label>
	  	<div class="controls">
	  		<?php echo input('contact_firstname','first name',$contact_firstname) ?>
	  		<?php echo input('contact_lastname','last name',$contact_lastname) ?>
	    </div>
	  </div>
	  <div class="control-group">
	  <label class="control-label" for="contact_email">Email</label>
	  	<div class="controls">
	  		<?php echo input('contact_email','Email',$contact_email) ?>
	    </div>
	  </div>
	   <div class="control-group">
	  <label class="control-label" for="contact_phone">Phone #</label>
	  	<div class="controls">
	<!--   (<input type="text" name="phone_1" value="$_POST['$phone_1']">)
	  		<input type="text" name="phone_2" placeholder="555">-
	  		<input type="text" name="phone_3" placeholder="8899">-->
	  		<?php echo input('contact_phone','xxxxxxxxxx',$contact_phone) ?>
	    </div>
	  </div>
	   	<div class="control-group">
		<label class="control-label" for="group">Group</label>
		<div class="controls">
		
			<?php 
			$options = get_options('group','0','Select a Group');
			echo dropdown('group_id',$options);
			?>
			
		</div>
	</div>
	  <div class="form-actions">
	  	<button onclick="<?php echo "./?p=edit_contact&id=$contact_id" ?>" type="submit" class="btn btn-warning"><i class="icon-edit"></i> Update</button>
	    <button onclick="window.history.go(-1)" type="button" class="btn">Cancel</button>
	  </div>
  </form>

