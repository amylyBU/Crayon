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

	<title>Crayon | Shopping Cart</title>

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
			<li>
				<a href="crayon.php"><button class="pure-button">Back to Shop
				</button></a>
			</li>
		</ul>
	</div>

	<div class="clear"></div>

	<div id="shopping-cart-container">
		<table id="shopping-cart" class="pure-table pure-table-horizontal">
		    <thead>
		        <tr>
		            <th>Crayon</th>
		            <th>Quantity</th>
		            <th>Cost</th>
		            <th>Total Cost</th>
		        </tr>
		    </thead>

			<?php 
				include "dbconnect.php"; 

				try {    
					$user = $_SESSION['id'];
					$res = $db->prepare("SELECT crayname, quantity, price FROM shoppingcart WHERE custoid='$user'");
					$res->execute();
					$cartitems = $res->fetchAll();
					$totalprice = 0;

					echo "<tbody>";

					foreach($cartitems as $cartitem) {
						$quant = $cartitem['quantity'];
						$priceeach = $cartitem['price'];
						$quantxpriceeach = $quant * $priceeach;
						echo "<tr>";
						echo "<td>".$cartitem['crayname']."</td>";
						echo "<td>".$quant."</td>";
						echo "<td>$".$quantxpriceeach."</td>";
						echo "<td></td>";
						echo "</tr>";
						$totalprice = $totalprice + $quantxpriceeach;
					}

					echo "<tr> <td></td> <td></td> <td></td> <td>";
					echo "$".$totalprice."</td></tr>";
					echo "</tbody>";
					echo "Total Items: ".$res->rowCount();
				}
				catch(PDOException $e) {  
				    echo $e->getMessage();  
				}
			?>
		</table>
		<br>
		<button id="checkout-button" class="pure-button">Check out now</button>
	</div>

	<div class="clear"></div>

	<footer>
		&copy; Amy Ly (amyly@bu.edu)<br>
		Boston University MET CS601
	</footer>

</body>
</html>