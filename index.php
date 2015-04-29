<?php 
	if (!isset($_SESSION['custo'])) {
		session_start(); 
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="author" content="Amy Ly">

	<title>Crayon | Colour Your World</title>

	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
	<link href="http://fonts.googleapis.com/css?family=Raleway" rel="stylesheet" type="text/css">


	<script src="javascript/jquery-2.1.3.js"></script>
	<script src="http://code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
	<script src="javascript/script.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js"></script>
	<link rel="stylesheet" href="https://code.jquery.com/ui/1.11.4/themes/ui-lightness/jquery-ui.css">
</head>
<body>

	<div id="header">
		<a href="index.php" id='nav-home'>Crayon</a>
		<ul id="nav-list">
			<?php 
				if (isset($_SESSION['custo'])) {
					echo "<li><a href='logout.php'><button type='button' id='logout-button' class='pure-button'>Log Out</button></a></li>";
					echo "<li id='welcome-blurb'>Hello, ".$_SESSION['custo']."!</li>";
				} else {
					echo '<li><a href="signup.php"><button class="pure-button">Sign Up</button></a></li>';
					echo '<li><button id="cd-login-modal" class="pure-button">Login</button></li>';
				}
			?> 
		</ul>
	</div>

	<div class="clear"></div>

	<div id="landing-container">
		<div id="landing-blurb-container">
			<headline>Crayon.</headline>
			<slogan>"Keep calm and cray-on."</slogan>
			<a href="crayon.php"><button type="button" class="pure-button">Enter</button></a>
		</div>
		<div id="login-modal-dialog" title="Log in to Crayon">
			<ul>
				<form id='login-modal-form'>
				<li>Email: <input type="text" name="useremail" id="login-email"></li>
				<li>Password: <input type="password" name="userpassword" id="login-password"></li>
				</form>
			</ul>
			<p id="error-msg-space"></p>
		</div>
	</div>

	<div class="clear"></div>

	<footer>
		&copy; Amy Ly (amyly@bu.edu)<br>
		Boston University MET CS601
	</footer>
</body>
</html>
