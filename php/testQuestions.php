<?php
    require 'connection.php';
    $quizno = 1;
    $qry="SELECT * FROM `question` WHERE `Quiz No`= '".$quizno."';";
    $myQuestions = array();

    $result = $mysqli->query($qry);

    // for ($qno=1;$qno<mysqli_num_rows($result);$qno++){
        while($row = $result->fetch_assoc()){
            array_push($myQuestions, array("question" => $row["Question Content"], "answers" => array(
                        "a" => $row["Another choice"],
                        "b" => $row["Other Choice"],
                        "c" => $row["Answer"]
                    ),
                    "correctAnswer" => "c"
                )
            );
        }
    // }

    // $myQuestions = array(
    //     array("question" => "Who is the strongest?",
    //         "answers" => array(
    //             "a" => "Superman",
    //             "b" => "The Terminator",
    //             "c" => "Waluigi, obviously"
    //         ),
    //         "correctAnswer" => "c"
    //     ),
    //     array("question" => "What is the best desktop os ever created?",
    //         "answers" => array(
    //             "a" => "Windows",
    //             "b" => "Mac OS",
    //             "c" => "Linux"
    //         ),
    //         "correctAnswer" => "c"
    //     ),
    //      array("question" => "Where is Waldo really?",
    //         "answers" => array(
    //             "a" => "Antarctica",
    //             "b" => "Exploring the Pacific Ocean",
    //             "c" => "Sitting in a tree",
    //             "d" => "Minding his own business, so stop asking"
    //         ),
    //         "correctAnswer" => "d"
    //     ),
    // );

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        echo json_encode($myQuestions);
    }
?>
