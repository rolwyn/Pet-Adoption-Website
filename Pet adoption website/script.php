<?php
###########################################################
/*
Subscription Form
Copyright (C) StivaSoft ltd. All rights Reserved.

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see http://www.gnu.org/licenses/gpl-3.0.html.

For further information visit:
http://www.phpjabbers.com/
info@phpjabbers.com

*/
###########################################################

# CONFIG
define('_DB_HOST', 'localhost');
define('_DB_NAME', 'DATABASE_NAME');
define('_DB_USER', 'DATABASE_USER');
define('_DB_PASS', 'DATABASE_PASSWORD');


$subscribe = (isset($_POST['action']) && $_POST['action'] == 'unsubscribe')?false:true;

if ($subscribe){
	$fields = array(
		array('name' => 'email', 'valid' => array('require', 'email')),
		array('name' => 'name', 'valid' => array('require')),
	);
}else{
	$fields = array(
		array('name' => 'unsubscribe_email', 'valid' => array('require', 'email')),
		array('name' => 'confirm', 'valid' => array('require'), 'err_message' => 'Please confirm'),
	);
}

// Connect to database
$connection = mysql_connect(_DB_HOST, _DB_USER, _DB_PASS) or die ('Unable to connect to MySQL server.<br ><br >Please make sure your MySQL login details are correct.');
$db = mysql_select_db(_DB_NAME, $connection) or die ('request "Unable to select database."');

$error_fields = array();
$get = array();
foreach ($fields AS $field){
	$value = isset($_POST[$field['name']])?$_POST[$field['name']]:'';
	if (is_array($value)){
		$value = implode('/ ', $value);
	}
	if (get_magic_quotes_gpc()){
		$value = stripslashes($value);
	}
	$get[$field['name']] = mysql_real_escape_string($value);
	$is_valid = true;
	$err_message = '';
	if (!empty($field['valid'])){
		foreach ($field['valid'] AS $valid) {
			switch ($valid) {
				case 'require':
					$is_valid = $is_valid && strlen($value) > 0;
					$err_message = 'Field required';
					break;
				case 'email':
					$is_valid = $is_valid && preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i", $value);
					$err_message = 'Email required';
					break;
				default:				
					break;
			}
		}
	}
	if (!$is_valid){
		if (!empty($field['err_message'])){
			$err_message = $field['err_message'];
		}
		$error_fields[] = array('name' => $field['name'], 'message' => $err_message);
	}
}

if (empty($error_fields)){
	if ($subscribe){
		$data = array(
			'email' => "'".$get['email']."'",
			'name' => "'".$get['name']."'",
			'date_subscribe' => 'NOW()',
			'status' => "'T'",
		);
		$sql = "REPLACE INTO subscription_form (`".implode("`, `", array_keys($data))."`) VALUES(".implode(", ", array_values($data)).")";
	}else{
		$sql = "UPDATE subscription_form SET date_unsubscribe = NOW(), status = 'F' WHERE email = '".$get['unsubscribe_email']."'";
	}
	if (!empty($sql)){
		$sql_result = mysql_query ($sql, $connection ) or die ('request "Could not execute SQL query" '.$sql);
	}
	echo (json_encode(array('code' => 'success')));
}else{
	echo json_encode(array('code' => 'failed', 'fields' => $error_fields));
}