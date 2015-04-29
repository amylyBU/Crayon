<?php 
	if (!isset($_SESSION['custo'])) {
		session_start(); 
	}
?>

<?php 

include "dbconnect.php";

// get parameters from the passed in serialized url
$crayon = $_GET['crayon'];
$price = $_GET['price'];

//get the current session's customerid
if (isset($_SESSION['id'])) {
	$user = $_SESSION['id'];
} else {
	$user = "Guest";
}

if ($user == "Guest") { // user is not logged in.
	echo ("nouser");
} else {
	try {
		// when trying to add to cart, first see if the customer already tried adding this color to cart.
		$stmt = $db->prepare("SELECT * from shoppingcart where custoid = '$user' AND crayname = '$crayon'");
		$stmt->execute();

		if ($stmt->rowCount() == 0) {
			// the user did not add this color yet, so add this color to the database.
			$add = $db->prepare("INSERT INTO shoppingcart(custoid, crayname, price, quantity) VALUES ('$user', '$crayon', '$price', 1)");
			$add->execute();
			echo "success";
		} 
		else {
			// row already exists, update the database (just increase the quantity of the color).
			$update = $db->prepare("UPDATE shoppingcart SET quantity= quantity+1 WHERE custoid='$user' AND crayname='$crayon'"); 
			$update->execute();
			echo "updated";
		}
	}
	catch (PDOException $e) {
		echo $e->getMessage();
	}
}

// inventory in the crayonitem table is only updated when the user checksout.
?>