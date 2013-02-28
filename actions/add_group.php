<?php  
session_start();
//require once(./config/db.php);
//include('pages/form_add_contact.php');
$required = array (
		'group_name' => 'i++'
		);

extract($_POST);
// validate form data
foreach($required as $r) {
	if(!isset($_POST[$r]) || $_POST[$r] == '') {
		// store message into session
		
		$_SESSION['message'] = array (
				'type' => 'danger',
				'text' => 'Please Provide A Group Name.'
			);
		
		// store form data into session data
		$_SESSION['POST'] = $_POST;
		
		//set location header
		Header('location:../?p=form_add_group');
		
		//kill script
		die();
	}else {
		
		$_SESSION['message'] = array(
				'type' => 'success',
				'text' => 'Contact Successfully Added'
				);
		
		header('location:../?p=list_groups');
	}
} 

// add  contact to DB

//Connect to DB
$conn = new mysqli('localhost','root','','mycontacts');
$sql = "INSERT INTO contacts (group_name) VALUES(group_name)";

// query DB
$conn->query($sql);

// Close connection
$conn->close();

// Set Location header
//header('location:../?p=list_contacts');