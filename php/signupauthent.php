<?php
require 'connection.php';

$username = $mysqli->real_escape_string($_REQUEST['username']);
$email = $mysqli->real_escape_string($_REQUEST['email']);
$pwd = $mysqli->real_escape_string($_REQUEST['pwd']);

//Hashing password
$hashedpwd = password_hash($pwd, PASSWORD_DEFAULT, ['cost' => 15]);

$qry="SELECT * FROM `Users` WHERE username= '$username';";

$result = $mysqli->query($qry);
if ($result===true || mysqli_num_rows($result)>0){
    echo "That username is taken";
    return false;
}

$qry="SELECT * FROM `Users` WHERE Email Address = '$email';";

$result = $mysqli->query($qry);

if ($result==true){
    echo "That email is in use";
    return false;
}

$signupsql = "INSERT INTO `Users`(`Username`, `Email address`, `Password`) VALUES ('$username','$email','$hashedpwd');"; 

if ($mysqli->query($signupsql)===true){
	echo "Your account has been registered";
	header("Location: ../index.php");
} else {
    echo "ERROR: Your account COULDN'T be registered" . $mysqli->error;
    header("Location: ../signup.php");
}
$mysqli->close();
?>
