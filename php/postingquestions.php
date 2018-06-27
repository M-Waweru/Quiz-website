<?php
	session_start();
	require 'connection.php'

	$questioncontent = $mysqli->real_escape_string($_REQUEST['questiondata']);
	$choice1 = $mysqli->real_escape_string($_REQUEST['choice1']);
	$choice2 = $mysqli->real_escape_string($_REQUEST['quizname']);
	$choice3 = $mysqli->real_escape_string($_REQUEST['choice3']);
	$answer = $mysqli->real_escape_string($_REQUEST['answer']);
	$quizno = $_SESSION["quizno"];

	do {
		//Random generation of the quiz number
		$questionno = rand(10,10000);
		//Checking if the randomly-generated quiz number is in the Quiz table
		$questionnoqry = "Select * from `question` where `Question No` = '$questionno';";
		$result = $mysqli->query($questionnoqry);
	}
	while ($result==false);

	//Creating sql statements based on the choice that the quizzer as the answer
	if ($answer=="first"){
		$questionqry="INSERT INTO `question`(`Question No`, `Question Content`, `Quiz No`, `Answer`, `Other Choice`, `Another choice`) VALUES ('$questionno','$questiondata','$quizno','$choice1','$choice2','$choice3');";
	} else if ($answer=="second"){
		$questionqry="INSERT INTO `question`(`Question No`, `Question Content`, `Quiz No`, `Answer`, `Other Choice`, `Another choice`) VALUES ('$questionno','$questiondata','$quizno','$choice2','$choice3','$choice1');";
	} else {
		$questionqry="INSERT INTO `question`(`Question No`, `Question Content`, `Quiz No`, `Answer`, `Other Choice`, `Another choice`) VALUES ('$questionno','$questiondata','$quizno','$choice3','$choice1','$choice2');";
	}

	//Passing the sql stmt to the db
	if ($mysqli->query($questionqry)==true){
		echo "Record inserted";
	} else {
		echo "Error".$mysqli->error;
	}
	header('Location: ../createquiz.html');
?>