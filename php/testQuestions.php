<?php
    require 'connection.php';
    $quizno = 1;
    $qry="SELECT * FROM `question` WHERE `Quiz No`= '".$quizno."';";
    $myQuestions = array();

    $result = $mysqli->query($qry);
        
    while($row = $result->fetch_assoc()){
        $answer=rand(1,3);
        if ($answer==1){
            $answerletter="a";
        } else if ($answer==2){
            $answerletter="b";
        } else {
            $answerletter="c";
        } 

        if ($answerletter=="a") {
            array_push($myQuestions, array("question" => $row["Question Content"], "answers" => array(
                    "a" => $row["Answer"],
                    "b" => $row["Other Choice"],
                    "c" => $row["Another choice"]
                ),
                "correctAnswer" => "a"
                )
            ); 
        } else if ($answerletter=="b") {
                array_push($myQuestions, array("question" => $row["Question Content"], "answers" => array(
                    "a" => $row["Another choice"],
                    "b" => $row["Answer"],
                    "c" => $row["Other Choice"]
                ),
                "correctAnswer" => "b"
                )
            );
        } else {
                array_push($myQuestions, array("question" => $row["Question Content"], "answers" => array(
                    "a" => $row["Another choice"],
                    "b" => $row["Other Choice"],
                    "c" => $row["Answer"]
                ),
                "correctAnswer" => "c"
                )
            );
        }
    }

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        echo json_encode($myQuestions);
    }
    $mysqli->close();
?>
