
	<?php 
	
	
	if ($confirm = 'yes'){
	session_start();
	
	$conn = new mysqli('localhost','root','','mycontacts');
	
	
	// store form data into session data
	$_SESSION['POST'] = $_POST;
	
	//$sql = "DELETE FROM contacts WHERE contact_id = $_GET[id]";
	
	$conn->query($sql);
	$conn->close();
	
	
	$_SESSION['message'] = array(
			'type' => 'success',
			'text' => "Contact Successfully Deleted" );
	
	header('Location:../?p=list_contacts');
	}

 else {
	header('Location:../?p=list_contacts');
}





