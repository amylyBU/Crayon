<?php 
	if (!isset($_SESSION['custo'])) {
		session_start(); 
	}
?>

<?php 

include "dbconnect.php";

// get params from the passed in serialized url
$fname = $_GET['fname'];
$lname = $_GET['lname'];
$email = $_GET['email'];
$password = $_GET['password'];
$street = $_GET['street'];
$city = $_GET['city'];
$zipcode = $_GET['zipcode'];
$state = $_GET['state'];
$phonenumber = $_GET['phonenumber'];

try {
	$res = $db->prepare("SELECT * FROM customer WHERE email='$email'");
	$res->execute();

	if ($res->rowCount() != 0) { // email is taken
		unset($_SESSION['custo']);
		echo "failure";

	} else { // email is free, user can be registered
		$statement = $db->prepare("INSERT INTO customer(email) VALUES (?)");
		$statement->execute(array($email));

		$query = $db->prepare("UPDATE customer SET firstname='$fname', lastname='$lname', password='$password', street='$street', city='$city', zipcode='$zipcode', state='$state', phonenumber='$phonenumber' WHERE email='$email'");
		$query->execute();

		$_SESSION['custo'] = $fname." ".$lname; // set the session

		$stmt = $db->prepare("SELECT customerid FROM customer WHERE email='$email'");
		$stmt->execute();
		$row = $stmt->fetch();

		$_SESSION['id'] = $row['customerid']; // store the user's id also

		echo "success"; 
	}

}
catch(PDOException $e) {
	echo $e->getMessage();
}
?>