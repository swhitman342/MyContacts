
 <!-- <pre>POST: <?php print_r($_POST)?></pre> -->
<?php 
session_start();
//require once(./config/db.php);
//include('pages/form_add_contact.php');
$required = array (
		'contact_firstname',
		'contact_lastname',
		'contact_email',
		'phone_1',
		'phone_2',
		'phone_3'
		);

extract($_POST);
// validate form data
foreach($required as $r) {
	if(!isset($_POST[$r]) || $_POST[$r] == '') {
		// store message into session
		
		$_SESSION['message'] = array (
				'type' => 'danger',
				'text' => 'Please Provide All Required Information.'
			);
		
		// store form data into session data
		$_SESSION['POST'] = $_POST;
		
		//set location header
		Header('location:../?p=form_add_contact');
		
		//kill script
		die();
	}else {
		
		$_SESSION['message'] = array(
				'type' => 'success',
				'text' => 'Contact Successfully Added'
				);
		
		header('location:../?p=list_contacts');
	}
} 

// construct phone number
$contact_phone = $phone_1.$phone_2.$phone_3;


$conn = new mysqli('localhost','root','','mycontacts');
// add  contact to DB
$sql = "INSERT INTO contacts (contact_firstname,contact_lastname,contact_email,contact_phone,group_id) VALUES('$contact_firstname','$contact_lastname','$contact_email','$contact_phone',$group_id)";

//Connect to DB


// query DB
$conn->query($sql);

// Close connection
$conn->close();

// Set Location header
//header('location:../?p=list_contacts');