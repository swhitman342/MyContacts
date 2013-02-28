
<?php 

session_start();
//require once(./config/db.php);
//include('pages/form_add_contact.php');
$required = array (
		'contact_firstname',
		'contact_lastname',
		'contact_email',
		'contact_phone'
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
			$contact_id=$_POST['id'];
		// store form data into session data
		$_SESSION['POST'] = $_POST;

		//set location header
		Header("location:../?p=form_edit_contact&id=$contact_id");

		//kill script
		die();
	}else {

		$_SESSION['message'] = array(
				'type' => 'warning',
				'text' => 'Contact Successfully Updated'
		);

		header('location:../?p=list_contacts');
	}
}


extract($_POST);

$conn = new mysqli('localhost','root','','mycontacts');

$sql = "UPDATE contacts 
		SET contact_firstname='$contact_firstname', contact_lastname='$contact_lastname', contact_email='$contact_email', contact_phone='$contact_phone',group_id='$group_id'
		WHERE contact_id = $_POST[contact_id]";

$conn->query($sql);
$conn->close();

header("location:../?p=list_contacts");