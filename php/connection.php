<?php

$mysqli = new mysqli("localhost", "root", "", "quiz-website");

if($mysqli === false){
	die("WARNING!!!! Could not connect. " . $mysqli->connect_error);
}
?>