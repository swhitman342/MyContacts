
<pre>POST: <?php print_r($_POST)?></pre>
<?php 


session_start();

$conn = new mysqli('localhost','root','','mycontacts');


// store form data into session data
$_SESSION['POST'] = $_POST;

$sql = "DELETE FROM contacts WHERE contact_id = $_GET[id]";

$conn->query($sql);
$conn->close();

Header("location:../?p=list_contacts");