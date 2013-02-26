




<?php 


if(isset($_SESSION['message'])){
	 echo "<div class=\"alert alert-{$_SESSION['message']['type']}\">{$_SESSION['message']['text']}</div>";
	 
	 
	 //remove message from session
	 unset($_SESSION['message']);
	
}
		


// store the p variable from the QS into a variable
if(isset($_GET['p'])) {
$p = $_GET['p'];
} else {
	$p = DEFAULT_PAGE;
}

include("pages/$p.php");

