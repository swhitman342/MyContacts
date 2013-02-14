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

function input($name, $placeholder, $value=null, $class='') {
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

