<!DOCTYPE html>
<html>
    <head>
        <title>Quiz Up</title>
        <meta charset="utf-8">
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
        <link type="text/css" rel="stylesheet" href="css/styles.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <link type="short-cut icon" src="images/chemistry.jpg">
    </head>
    <body>
        <!-- Navbar -->
        <div class="navbar-fixed">
            <nav class="default_color z-depth-0" role="navigation">
                <div class="container">
                    <div class="nav-wrapper">
                        <a href="index.php" class="brand-logo">Quiz App</a>
                        <ul class="right hide-on-med-and-down">
                            <li><a href="sass.html">About</a></li>
                            <li><a href="badges.html">Categories</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        <div class="row">
            <?php  
                require "php/connection.php";
                $categoryname=$_GET["Category"];

                $categoryqry="SELECT * FROM `category` WHERE `Category Name`='$categoryname';";

                $result = $mysqli->query($categoryqry);

                if ($result==false){
                    echo $mysqli->error;
                }

                while ($row=$result->fetch_assoc()){
                    $categoryno=$row["Category No"];
                    $categorydesc=$row['Category Description'];

                    echo "<div class='col s3'>";
                    echo "<div class='container'>";
                    echo "<h2>$categoryname</h2>";
                    echo "<p>$categorydesc</p>";
                    echo "</div>";
                    echo "</div>";
                }

                $quizqry="SELECT * FROM `quiz` WHERE `Category No`='$categoryno'";

                $result = $mysqli->query($quizqry);

                echo "<div class='col s9'>";
                echo "<div class='container'>";
                echo "<div class='section'>";

                while ($row=$result->fetch_assoc()){
                    $quizno=$row["Quiz No"];
                    $quizname=$row["Quiz Name"];
                    $quizdec=$row["Quiz Description"];
                    $publisher=$row["Publisher"];

                    echo "<div class='card-panel'>";
                    echo "<span class=''>";
                    echo "<a href='displayquiz.php?quizno=$quizno'>$quizname</a>";
                    echo "<p>$quizdec</p>";
                    echo "</span>";
                    echo "</div>";
                }

                echo "</div>";
                echo "</div>";
                echo "</div>";
            ?>
        </body>
    </html>