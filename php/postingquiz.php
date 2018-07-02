<?php
	require 'connection.php';
	
	session_start();
	//Escape variables
	$quizname = $mysqli->real_escape_string($_REQUEST['quizname']);
	$quizdescription = $mysqli->real_escape_string($_REQUEST['quizdesc']);
	$quizcategory = $mysqli->real_escape_string($_REQUEST['quizcategory']);
	//$username = $_SESSION["username";
	$username = "Mathenge";

	//Getting the Category Number
	$categoryqry = "Select * from `category` where `Category Name` = '$quizcategory';";
	$result = $mysqli->query($categoryqry);

	if ($result->num_rows>0){
		while ($row = $result->fetch_assoc()){
			$categoryno=$row["Category No"];
		}
	} else {
		echo "Category doesn't exist";
	}

	do {
		//Random generation of the quiz number
		$quizno = rand(10,10000);
		//Checking if the randomly-generated quiz number is in the Quiz table
		$quiznoqry = "Select * from `quiz` where `Quiz No` = '".$quizno."';";
		$result = $mysqli->query($quiznoqry);
	}
	while ($result==false);
	echo $quizno;
	//Saving quiz number to session
	$_SESSION["quizno"]=$quizno;
	//Inserting the question and its details to the database
	$insertsql = "INSERT INTO `quiz`(`Quiz No`, `Quiz Name`, `Quiz Description`, `Category No`, `Publisher`) VALUES ('$quizno','$quizname','$quizdescription','$categoryno','$username')";

	if ($mysqli->query($insertsql)==true){
		echo "Record inserted";
		header('Location: ../createquiz.html');
	}
	else {
		echo "Error".$mysqli->error;
	}
?>