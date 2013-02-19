
<?php 

extract($_POST);

$conn = new mysqli('localhost','root','','mycontacts');

$sql = "UPDATE contacts 
		SET contact_firstname='$contact_firstname', contact_lastname='$contact_lastname', contact_email='$contact_email', contact_phone='$contact_phone'
		WHERE contact_id = $_POST[contact_id]";

$conn->query($sql);
$conn->close();

header("location:../?p=list_contacts");