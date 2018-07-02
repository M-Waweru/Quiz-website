<?php
    session_start();    
?>

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
        <!-- require_once 'foo.php'; -->
        <div class="navbar-fixed">
            <nav id="navigation" class="default_color z-depth-0" role="navigation">
                <div class="container">
                    <div class="nav-wrapper">
                        <a href="index.php" id="logo-container" class="brand-logo">Quiz Up</a>
                        <ul class="right hide-on-med-and-down">
                            <li><a href="#categories">Categories</a></li>
                            <?php 
                                if (isset($_SESSION["username"])){
                                    $username = $_SESSION["username"];
                                    echo "<li><a href='postingquiz.html'>Create a quiz</a></li>";
                                    echo "<li><a href='#about'>About</a></li>";
                                    echo "<li><a href='#about'>$username</a></li>";
                                    echo "<li><a href='php/logout.php'>Logout</a></li>";                                    
                                } else {
                                    echo "<li><a href='postingquiz.html'>Create a quiz</a></li>";
                                    echo "<li><a href='#about'>About</a></li>";
                                    echo "<li><a href='loginpage.php'>Log In</a></li>";
                                    echo "<li><a href='signup.php'>Sign Up</a></li>";                                
                                }
                            ?>
                            <!-- <li><a href="#about">echo getEmail()</a></li> -->
                        </ul>
                        <ul id="nav-mobile" class="side-nav">
                            <li><a href="#categories">Categories</a></li>
                            <?php 
                                if (isset($_SESSION["username"])){
                                    $username = $_SESSION["username"];
                                    echo "<li><a href='postingquiz.html'>Create a quiz</a></li>";
                                    echo "<li><a href='#about'>About</a></li>";
                                    echo "<li><a href='#about'>$username</a></li>"; 
                                    echo "<li><a href='php/logout.php'>Logout</a></li>";                                    
                                } else {
                                    echo "<li><a href='postingquiz.html'>Create a quiz</a></li>";
                                    echo "<li><a href='#about'>About</a></li>";
                                    echo "<li><a href='loginpage.php'>Log In</a></li>";
                                    echo "<li><a href='signup.php'>Sign Up</a></li>";                                
                                }
                            ?>                          
                        </ul>
                        <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="mdi-navigation-menu material-icons">reorder</i></a>
                    </div>
                </div>
            </nav>
        </div>
        <div class="section no-pad-bot white-text" id="index-banner">
            <div class="container">
                <div class="section cd-intro">
                    <h1 class="cd-headline letters type">
                    <span class="cd-words-wrapper waiting">
                        <b class="is-visible">Challenge your brain today</b>
                    </span>
                    </h1>
                </div>
            </div>
        </div>
        <div id="categories">
            
        </div>
        <div class="row">
            <div class="section scrollspy">
                <div class="container">
                    <h2 class="header text_b">Topics </h2>
                    <div class="row">
                        <div class="col s12 m4 l4">
                            <div class="card">
                                <div class="card-image waves-effect waves-block waves-light">
                                    <img class="activator" height="220px" width="500px" src="images/astronomy.jpg">
                                </div>
                                <div class="card-content">
                                    <span class="card-title activator grey-text text-darken-4">Physics<i class="mdi-navigation-more-vert right material-icons">more_vert</i></span>
                                    <p><a href="quiz-list.php?Category=Physics">Try it</a></p>
                                </div>
                                <div class="card-reveal">
                                    <span class="card-title grey-text text-darken-4">Physics<i class="mdi-navigation-close right material-icons">close</i></span>
                                    <p>Force, energy and time. Learn about the physical elements and how things work.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col s12 m4 l4">
                            <div class="card">
                                <div class="card-image waves-effect waves-block waves-light">
                                    <img class="activator" height="220px" width="500px" src="images/chemistry.jpg">
                                </div>
                                <div class="card-content">
                                    <span class="card-title activator grey-text text-darken-4">Chemistry<i class="mdi-navigation-more-vert right material-icons">more_vert</i></span>
                                    <p><a href="quiz-list.php?Category=Chemistry">Try it</a></p>
                                </div>
                                <div class="card-reveal">
                                    <span class="card-title grey-text text-darken-4">Chemistry<i class="mdi-navigation-close right material-icons">close</i></span>
                                    <p>the branch of science concerned with the substances of which matter is composed</p>
                                </div>
                            </div>
                        </div>
                        <div class="col s12 m4 l4">
                            <div class="card">
                                <div class="card-image waves-effect waves-block waves-light">
                                    <img class="activator" height="220px" width="500px" src="images/cities.jpg">
                                </div>
                                <div class="card-content">
                                    <span class="card-title activator grey-text text-darken-4">Cities<i class="mdi-navigation-more-vert right material-icons">more_vert</i></span>
                                    <p><a href="quiz-list.php?Category=Cities">Website Link</a></p>
                                </div>
                                <div class="card-reveal">
                                    <span class="card-title grey-text text-darken-4">Cities<i class="mdi-navigation-close right material-icons">close</i></span>
                                    <p>Cities</p>
                                </div>
                            </div>
                        </div>
                        <div class="col s12 m4 l4">
                            <div class="card">
                                <div class="card-image waves-effect waves-block waves-light">
                                    <img class="activator" height="220px" width="500px" src="images/gaming.jpg">
                                </div>
                                <div class="card-content">
                                    <span class="card-title activator grey-text text-darken-4">Gaming<i class="mdi-navigation-more-vert right material-icons">more_vert</i></span>
                                    <p><a href="quiz-list.php?Category=Gaming">Website Link</a></p>
                                </div>
                                <div class="card-reveal">
                                    <span class="card-title grey-text text-darken-4">Gaming<i class="mdi-navigation-close right material-icons">close</i></span>
                                    <p>Gaming</p>
                                </div>
                            </div>
                        </div>
                        <div class="col s12 m4 l4">
                            <div class="card">
                                <div class="card-image waves-effect waves-block waves-light">
                                    <img class="activator" height="250px" width="500px" src="images/geography.jpg">
                                </div>
                                <div class="card-content">
                                    <span class="card-title activator grey-text text-darken-4">Geography<i class="mdi-navigation-more-vert right material-icons">more_vert</i></span>
                                    <p><a href="quiz-list.php?Category=Geography">Website Link</a></p>
                                </div>
                                <div class="card-reveal">
                                    <span class="card-title grey-text text-darken-4">Geography<i class="mdi-navigation-close right material-icons">close</i></span>
                                    <p>Geography</p>
                                </div>
                            </div>
                        </div>
                        <div class="col s12 m4 l4">
                            <div class="card">
                                <div class="card-image waves-effect waves-block waves-light">
                                    <img class="activator" height="220px" width="500px" src="images/maths.jpg">
                                </div>
                                <div class="card-content">
                                    <span class="card-title activator grey-text text-darken-4">Mathematics<i class="mdi-navigation-more-vert right material-icons">more_vert</i></span>
                                    <p><a href="quiz-list.php?Category=Mathematics">Website Link</a></p>
                                </div>
                                <div class="card-reveal">
                                    <span class="card-title grey-text text-darken-4">Mathematics<i class="mdi-navigation-close right material-icons">close</i></span>
                                    <p>Mathematics</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
        <script type="text/javascript" src="js/materialize.min.js"></script>
    </body>
</html>