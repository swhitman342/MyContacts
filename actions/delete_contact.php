
<pre>POST: <?php print_r($_POST)?></pre>
<?php 
extract($_GET);
extract($_POST);

$conn = new mysqli('localhost','root','','mycontacts');

$sql = "DELETE FROM contacts WHERE contact_id = {$_GET['id']}";

$conn->query($sql);
$conn->close();

header("location:../?p=list_contacts");