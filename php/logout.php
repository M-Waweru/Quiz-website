<?php  
	session_start();

	unset($_SESSION["username"]);
	unset($_SESSION["loginpass"]);
	unset($_SESSION["usernamecheck"]);
	unset($_SESSION["passwordcheck"]);
	header('Location: ../index.php');
?>