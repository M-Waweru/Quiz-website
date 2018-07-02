<?php  
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">
	<link rel="stylesheet" type="text/css" href="css/form-styles.css">
	<script type="text/javascript">
		function validatelogin(){
			var user = document.loginform.username.value;
			var pwd = document.loginform.pwd.value;
			if (user==null || user==""){
				$(document).ready(function(){
					$("#useralert").show();
				});
				return false;
			} else {
				$(document).ready(function(){
					$("#useralert").hide();
				});
			}
			
			if (pwd==null || pwd==""){
				$(document).ready(function(){
					$("#pwdalert").show();
				});
				return false;
			} else {
				$(document).ready(function(){
					$("#pwdalert").hide();
				});
			}
		}
	</script>
</head>
<body>
	<div>
		<h1>Quiz Up</h1>
	</div>
	<form name="loginform" method="post" onsubmit="return validatelogin()" action="php/loginauthenticate.php">
		<div class="formcontainer">
			<div class="title">
				<h1>Log In</h1>
				<p>Please fill in this form to log in to your account.</p>
			</div><br>
			<div>
				<label for="username"><b>Username:</b></label><br>
				<input type="text" name="username" placeholder="Enter your username here">
				<br>
				<div class="alert" id="useralert">
					<p>Username cannot be blank</p>
				</div>

				<?php
					//if (isset($_SESSION["usernamecheck"])){
						$usernamecheck=$_SESSION["usernamecheck"];
						if ($usernamecheck==false){
							echo "<p style='color: red;'>Username does not exist or is wrong</p>";
						}
					//}
				?>

				<label for="pwd"><b>Password:</b></label><br>
				<input type="password" name="pwd" placeholder="Enter Password">
				<br>
				<div class="alert" id=pwdalert>
					<p>Password cannot be blank</p>
				</div>

				<?php
					//if (isset($_SESSION["passwordcheck"])){
						$passwordcheck=$_SESSION["passwordcheck"];
						if ($passwordcheck==false){
							echo "<p style='color: red;'>Your password is incorrect</p>";
						}
					//}
				?>

				<label>
					<input type="checkbox" name="remember">Remember me
				</label>
			</div><br>
			<div class="alert" id="usernamecheck">
				<p>Username does not exist or is wrong</p>
			</div>

			<p>Don't have an accounnt? <a href="signup.php">Sign Up</a></p>

			<div class="buttons-class">
				<button type="submit" class="btnsignup">Log In</button>
			</div>
		</div>
	</form>
	<footer>
		<p>Quiz site @2018</p>
	</footer>
	<script src="js/jquery-3.1.1.min.js"></script>
</body>
</html>
