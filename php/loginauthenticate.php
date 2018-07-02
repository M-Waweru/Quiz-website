<?php
require 'connection.php';
session_start();

$username = $mysqli->real_escape_string($_REQUEST['username']);
$pwd = $mysqli->real_escape_string($_REQUEST['pwd']);

$qry="SELECT * FROM `Users` WHERE username= '$username'";

$result = $mysqli->query($qry);

if ($result===true || mysqli_num_rows($result) > 0){
	while ($row=$result->fetch_assoc()){
		$hashed=password_hash($pwd, PASSWORD_DEFAULT);

		echo $row["Password"]."<br>";
		echo $hashed;
		if (password_verify($pwd, $row["Password"])){
			$_SESSION["passwordcheck"]=true;
			$_SESSION["username"]=$username;
			$_SESSION["usernamecheck"]=true;

			echo "You are logged in";
			header('Location: ../index.php');
		} else {
			$_SESSION["passwordcheck"]=false;
			echo "<br>Wrong password";
			//header('Location: ../loginpage.php');
		}
	}
} else {
	$_SESSION["usernamecheck"]=false;
	echo "Account doesn't exist";
	//header("Location: ../loginpage.php");
	return false;
}
$mysqli->close();
?>
