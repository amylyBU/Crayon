<?php 
	if (!isset($_SESSION['custo'])) {
		session_start(); 
	}
?>

<?php 

include "dbconnect.php";

$email = $_GET['useremail'];
$password = $_GET['userpassword'];

try {

	$res = $db->prepare("SELECT * FROM customer WHERE email='$email'");
	$res->execute();

	if ($res->rowCount() == 0) {
		unset($_SESSION['custo']);
		echo "failure";
	} else {
		$statement = $db->prepare("SELECT customerid, firstname, lastname, password FROM customer WHERE email='$email'");
		$statement->execute();
		$record = $statement->fetch();

		$fname = $record['firstname'];
		$lname = $record['lastname'];
		$pw = $record['password'];

		if ($password == $pw) { // password is correct
			$_SESSION['custo'] = $fname." ".$lname; // set the session
			$_SESSION['id'] = $record['customerid'];
			echo $_SESSION['custo']; 
		} else {
			echo "failure";
		}
	}
}

catch(PDOException $e) {
	echo $e->getMessage();
}
?>