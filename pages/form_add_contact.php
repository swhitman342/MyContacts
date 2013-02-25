<h2>Add a Contact</h2>
<form class="form-horizontal" action="actions/add_contact.php" method="post">
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
	  
	  <label class="control-label" for="group">Group</label>
	  <div class="controls">
	  	<select name="group_id">
	  		  <option value="0">Select a group</option>
	  		 <option value="1">Friends</option>
	  		<option value="2">Coworkers</option>
	  		<option value="3">Stalkers</option> 
	  		  
	  		 <?php 
	  		extract($group);
	  		$conn = new mysqli('localhost','root','','mycontacts');	
	  		 
	  		 // query DB
	  		$conn->query($groups);
	  		// fetch_assoc();
	  		$options = array(
	  				
	  				'1' => 'Friends',
	  				'2' => 'CoWorkers',
	  				'3' => 'Stalkers'				
	  				);
	  		
	  		$options[0] = 'Select a Group';
	  		
	  	//	$group_name = array(
	  				
	  				
	  		//		)
			
			$options[$group_id]= $group_name;
	  		 
	  		echo dropdown('group_id',$options);
	  		 
	  		 ?>
	  		
	  			<!-- <option value="<?php echo $group_id?>"><?php echo "$group_id" ?></option> -->
	  		
	  		<?php 
	  		 $conn->close();?>
	  	</select>
	  </div>
	  </div>
	  <div class="form-actions">
	  	<button type="submit" class="btn btn-primary"><i class="icon-plus-sign"></i> Add</button>
	  	<button onclick="window.history.go(-1)" type="button" class="btn">Cancel</button>
	  </div>
  </form>

