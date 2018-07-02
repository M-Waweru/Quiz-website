<?php
session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Create a quiz</title>
		<meta charset="utf-8">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
		<link type="text/css" rel="stylesheet" href="css/styles.css">
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<link type="short-cut icon" src="images/chemistry.jpg">
	</head>
	<body>
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
							echo "<li><a href='postingquiz.php'>Create a quiz</a></li>";
							echo "<li><a href='#about'>About</a></li>";
							echo "<li><a href='#about'>$username</a></li>";
							echo "<li><a href='php/logout.php'>Logout</a></li>";
							} else {
							echo "<li><a href='postingquiz.php'>Create a quiz</a></li>";
							echo "<li><a href='#about'>About</a></li>";
							echo "<li><a href='loginpage.php'>Log In</a></li>";
							echo "<li><a href='signup.html'>Sign Up</a></li>";
							}
							?>
							<!-- <li><a href="#about">echo getEmail()</a></li> -->
						</ul>
					</div>
				</div>
			</nav>
		</div>
		<div class="container">
			<h2>Create a quiz</h2>
			
			<div class="row">
				<form class="col s12" name="quizform" method="post" action="php/postingquiz.php">
					<div class="row">
						<div class="input-field col s12">
							<input placeholder="Quiz title" id="title" type="text" class="validate">
							<label for="title">Quiz title</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s6">
							<select>
								<option value="" disabled selected>Choose category of the quiz</option>
								<option value="General">General Knowledge</option>
								<option value="Physics">Physics</option>
								<option value="Maths">Mathematics</option>
								<option value="Movies">Movies</option>
								<option value="Others">Others</option>
								<option value="Random">Random</option>
							</select>
							<label>Event type</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12">
							<textarea id="description" class="materialize-textarea" length="140"></textarea>
							<label for="description">What is the quiz about?</label>
						</div>
					</div>
					<div class="row">
						<button id="submitBtn" class="btn waves-effect waves-light" type="submit" name="action">Submit
						</button>
					</div>
				</form>
			</div>
		</div>
		<script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
		<script type="text/javascript" src="js/materialize.min.js"></script>
		<script type="text/javascript" src="js/form.js"></script>
	</body>
</html>