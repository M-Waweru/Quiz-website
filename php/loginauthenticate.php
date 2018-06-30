<?php
require 'connection.php';
session_start();

$username = $mysqli->real_escape_string($_REQUEST['username']);
$pwd = $mysqli->real_escape_string($_REQUEST['password']);

$qry="SELECT * FROM `Users` WHERE username= '$username'";

$result = $mysqli->query($qry);

if ($result===true || mysqli_num_rows($result) > 0){
	while ($row=$result->fetch_assoc()){
		$hash=password_verify($pwd, $row["Password"]);
		if ($hash==false){
			echo "Wrong password";
			header('Location: ../loginpage.html');
		}
	}
	$_SESSION["username"]=$username;

	echo "You are logged in";
	header('Location: ../index.php');
} else {
	echo "Account doesn't exist";
	return false;
}
$mysqli->close();
?>
