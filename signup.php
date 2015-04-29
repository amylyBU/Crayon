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

	<title>Crayon | Sign Up</title>

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
	</div>
	<div id="signup-form-container">
		<form class="pure-form pure-form-aligned">
			<fieldset>
				<div class="pure-control-group" id="signup-blurb">
					Sign up with Crayon!
				</div>
				<p class="form-category">About you</p>
				<div class="pure-control-group">
		            <label for="fname">First Name</label>
		            <input name="fname" type="text" placeholder="First Name">
		        </div>

		        <div class="pure-control-group">
		            <label for="lname">Last Name</label>
		            <input name="lname" type="text" placeholder="Last Name">
		        </div>
		        <div class="pure-control-group">
		            <label for="email">Email Address</label>
		            <input name="email" type="email" placeholder="Email Address">
		        </div>
		        <div class="pure-control-group">
		            <label for="password">Password</label>
		            <input name="password" type="password" placeholder="Password">
		        </div>
		        <p class="form-category">Your address</p>
		        <p class="form-category">* delivery within US only</p>
		        <div class="pure-control-group">
		            <label for="street">Street</label>
		            <input name="street" type="text" placeholder="Street">
		        </div>
		        <div class="pure-control-group">
		            <label for="zipcode">City</label>
		        	<input name="city" type="text" placeholder="City">
		        </div>
		        <div class="pure-control-group">
		            <label for="state">State</label>
		            <input name="state" type="text" placeholder="US State"><br>
		        </div>
		        <div class="pure-control-group">
		            <label for="zipcode">Zip Code</label>
		            <input name="zipcode" type="text" placeholder="5-Digit Zip Code">
		        </div>
		        <div class="pure-control-group">
		            <label for="phonenumber">Phone Number</label>
		            <input name="phonenumber" type="text" placeholder="10-Digit Phone Number">
		        </div>
		        <div class="pure-controls">
		            <button id="submit-signup-button" type="button" class="pure-button pure-button-primary">Submit</button>
		        </div>
	    	</fieldset>
		</form>
	</div>
	<footer>
		&copy; Amy Ly (amyly@bu.edu)<br>
		Boston University MET CS601
	</footer>
</body>
</html>