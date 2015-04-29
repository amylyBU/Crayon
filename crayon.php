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
		<ul id="nav-list">
			<?php 
				if (isset($_SESSION['custo'])) {
					echo '<li><a href="shoppingcart.php"><button class="pure-button">Checkout</button></a></li>';
					echo "<li><a href='logout.php'><button type='button' id='logout-button' class='pure-button'>Log Out</button></a></li>";
					echo "<li id='welcome-blurb'>Hello, ".$_SESSION['custo']."!</li>";
				} else {
					echo '<li>Please <a href="index.php">log in</a> to shop.</li>';
				}
			?>
		</ul>
	</div>
	<div class="clear"></div>

	<div id="crayon-content">
		<?php 
			include "dbconnect.php"; 

			try {    
				$res = $db->prepare("SELECT name, color, price, inventory, description, imgurl FROM crayonitem");
				$res->execute();
				$crayonitems = $res->fetchAll();

				foreach($crayonitems as $crayon) {
					echo "<div class='crayon-item-div'>";
					echo $crayon['name']."<br>";
					echo "<img class='crayon-img' src='".$crayon['imgurl']."' style='height: 150px; width: 150px;'><br>";
					echo "$".$crayon['price']."<br>";
					echo "<input type='hidden' name='".$crayon['name']."' value='".$crayon['price']."'>";
					if ($crayon['inventory'] < 50) {
						echo "<span style='color:red'>Low Stock!</span>";
					}
					else {
						echo "<br>";
					}
					echo "<button class='pure-button' type='button' name=' ".$crayon['name']." '>Add To Cart</button>";
					echo "</div>";
				}
			}
			catch(PDOException $e) {  
			    echo $e->getMessage();  
			}
		?>
	</div>

	<footer>
		&copy; Amy Ly (amyly@bu.edu)<br>
		Boston University MET CS601
	</footer>

</body>
</html>