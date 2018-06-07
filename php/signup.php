<?php

$mysqli = new mysqli("localhost", "root", "", "quiz-website");

if($mysqli === false){
	die("WARNING!!!! Could not connect. " . $mysqli->connect_error);
}

echo "Successful connection. Host information: " . $mysqli->host_info;

$username = $mysqli->real_escape_string($_REQUEST['username']);
$email = $mysqli->real_escape_string($_REQUEST['email']);
$pwd = $mysqli->real_escape_string($_REQUEST['pwd']);

$signupsql = "INSERT INTO `Users`(`Username`, `Email address`, `Password`) VALUES ('$username','$email','$pwd');"; 

if ($mysqli->query($signupsql)===true){
	echo "Records inserted succesfully";
} else {
	echo "ERROR: Could not execute $signupsql. " . $mysqli->error;
}

$mysqli->close();
?>