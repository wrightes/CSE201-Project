<?php 

	// connect to the data base
	$host = "localhost";
	$dbName = "CSE201Test";
	
	$conn = mysqli_connect($host, 'root', '', $dbName) or die("Connection failed: " . $conn->connect_error);
	
	$sql = "SELECT * FROM users";
	$result = $conn->query($sql);
	
	while ($row = $result->fetch_assoc()) {
		if ($_POST['uname'] == $row['UserName'] && $_POST['psw'] == $row['Password']) {
			session_start();
			$_SESSION["user"] = $_POST["uname"];
			$_SESSION["loggedin"] = true;
			header("location: ../index.php");
			exit;
		}
	}
	
	header("location: login.html");
?>