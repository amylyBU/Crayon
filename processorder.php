<?php 
	if (!isset($_SESSION['custo'])) {
		session_start(); 
	}
?>

<?php 

include "dbconnect.php";

if (isset($_SESSION['id'])) {
	$user = $_SESSION['id'];
} else {
	$user = "Guest";
}

if ($user == "Guest") { // user is not logged in.
	echo ("nouser");
} else {
	try {
		$stmt = $db->prepare("SELECT * from shoppingcart where custoid='$user'");
		$stmt->execute();

		if ($stmt->rowCount() == 0) {
			echo "noitems";
		} 
		else {
			// if there are items in the cart, you want to make a transaction a the Paypal API or the users credit card. 
			// however, since none of that is implemented, for now we will just empty the shoppingcart table of the customers cart items.
			$delete = $db->prepare("DELETE FROM shoppingcart WHERE custoid='$user'"); 
			$delete->execute();
			echo "success";
		}
	}
	catch (PDOException $e) {
		echo $e->getMessage();
	}
}
?>