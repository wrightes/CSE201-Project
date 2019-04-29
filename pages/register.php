<?php 
	$host = "localhost";
	$dbName = "CSE201Test";
	
	$conn = mysqli_connect($host, 'root', '', $dbName) or die("Connection failed: " . $conn->connect_error);
	if ($_POST['psw'] == $_POST['pswconfirm']) {
		$sql = "INSERT INTO users (UserName, Password) VALUES ('".$_POST['uname']."', '".$_POST['psw']."')";
		if (mysqli_query($conn, $sql)) {
			echo "New record created successfully";
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
	} else {
		echo "Passwords do not match";
	}
?>