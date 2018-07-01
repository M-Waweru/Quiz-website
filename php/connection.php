<?php
require 'my_custom_connection.php';

if($mysqli === false){
	die("WARNING!!!! Could not connect. " . $mysqli->connect_error);
}
?>