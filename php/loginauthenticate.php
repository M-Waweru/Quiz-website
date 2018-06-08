<?php
$mysqli = new mysqli("localhost", "root", "", "quiz-website");

if($mysqli === false){
    die("WARNING!!!! Could not connect. " . $mysqli->connect_error);
}

$username = $mysqli->real_escape_string($_REQUEST['username']);
$pwd = $mysqli->real_escape_string($_REQUEST['password']);

$qry="SELECT * FROM `Users` WHERE username= '".$username."' and password='".$pwd."';";

$result = $mysqli->query($qry);

if ($result===false || mysqli_num_rows($result) <= 0){
    echo "Your username does not exist. Sign Up for an account";
    return false;
}

public function getUsername()
{
    $row = $result->fetch_assoc();
    return $row["Username"];
}

echo "You are logged in";
header('Location: ../index.html');
$mysqli->close();
?>
