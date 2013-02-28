<?php
/**
 * Generates an HTML input element with the given atribute values. ->
* The function also examines session data for previously entered values \/
* with the same name atribute.
* isset($someVar)
*/
function format_phone($phone){
	
	return	'<a href="tel:'.$phone.'">('.substr($phone,0,3).') '.substr($phone,3,3).'-'.substr($phone,-4);
} 
	
function add($contact){
	$contact_firstname = contact_firstname;
	$contact_lastname = contact_lastname;
	$contact_email = contact_email;
	$contact_phone = contact_phone;
}

function input($name, $placeholder, $value, $class='') {
	if($value == null && isset($_SESSION['POST'][$name])){
		$value = $_SESSION['POST'][$name];

		//remove from session data
		unset($_SESSION['POST'][$name]);

		if($value ==''){ // nothing was enterd as  hat value in the QS
			$class .= 'class="error"';
		} else {$class .='';
		}
	} elseif($value != null){
		$class .= '';
	}else {
		//error not present at initial loading of page \/
		$value = '';
	}

	$input = "<input class=\"$class\" type=\"text\" name=\"$name\" placeholder=\"$placeholder\"value=\"$value\"/>";
	return $input;
}


function dropdown($name, $options){
	/**
	 * Generates a HTML select element with the given name atribute and option elements
	 * This function also examines session data for a previously submitted value
	 *
	 * @param String $name name attribute
	 * @param Array $options Array of options in the form value=> text
	 * @return HTML select element
	 */
	$select = "<select name=\"$name\">";

	foreach($options as $value => $text) {
		// if there is session form data for $name, AND its value
		// is the same as the current array elemet, select it
		if(isset($_SESSION['POST'][$name]) && $_SESSION['POST'][$name] == $value){
			//unset ($_SESSION['POST'][$name]);
			$selected = 'selected="selected"';
		} else {
			$selected = '';
		}
		$select .= "<option $selected value=\"$value\">$text</option>";
	}

	$select .= "</select>";
	return $select;
}
/**
 * query the provided table for all rows, sorted by name, using the fields table_id and table name
 * @param unknown_type $table name of DB table
 * @param unknown_type $default_value value of the first option (1st key in array)
 * @param unknown_type $default_name name of the first option (1st valuein array)
 */
function get_options($table,$default_value='group_id',$default_name='group_name'){

	$options = array($default_value => $default_name);
		
	// field names
	$id_field = $table.'_id';
	$name_field = $table.'_name';
	
	//connect to DB
	$conn = new mysqli('localhost','root','','mycontacts');
	
	// Query table for id's & names
	$sql = "SELECT {$table}_id, {$table}_name FROM {$table}s ORDER BY {$table}_name";
	$results = $conn->query($sql);
	
	// Loop over result set, adding all rows to $options
	while(($row = $results->fetch_assoc()) != null) {
		$key = $row[$id_field];
		$value = $row[$name_field];
		$options[$key] = $value;
	}
	
	//closd DB connection
	$conn->close();
	
	// return options
	return $options;
}

function radio($name, $options) {
	$radio='';

	foreach($options as $value => $text) {
		// if there is session form data for $name, AND its value
		// is the same as the current array elemet, select it
		if(isset($_SESSION['POST'][$name]) && $_SESSION['POST'][$name] == $value){
			unset ($_SESSION['POST'][$name]);
			$checked = 'checked="checked"';
		} else {
			$checked = '';
		}
		$radio .= "<label><input type=\"radio\"value=\"$value\"$checked/>$text</input></label>";
		return $radio;
	}

}

