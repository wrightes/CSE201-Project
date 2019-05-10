<!DOCTYPE html>

<?php 
/*
	$host = "localhost";
	$dbName = "CSE201Test";
	
	$conn = mysqli_connect($host, 'root', '', $dbName) or die("Connection failed: " . $conn->connect_error);
	
	$sql = "SELECT * FROM users";
	$result = $conn->query($sql);
	
	while ($row = $result->fetch_assoc()) {
		if ($_POST['uname'] == $row['UserName'] && $_POST['psw'] == $row['Password']) {
			echo "User Found";
		}
	} */
?>

<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
	<!-- css stylesheet -->
	<!--<link rel="stylesheet" href="css/stylesheet.css">-->
	
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	
	<!-- javascript -->
	<!--<script src="js/script.js"></script>-->
	<link rel="stylesheet" href="../css/stylesheet.css">
	
    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
	
	<!-- javascript -->
	<script src="../js/script.js"></script>

	<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	
    <title>AppSurf - Login</title>
  </head>
  
  <body style="font-family: Verdana;">
	<nav class="navbar navbar-dark bg-dark text-light">
		<a class="navbar-brand">AppSurf</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		
		<div class="collapse navbar-collapse" id="navbarTogglerDemo02">
			<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
				<li class="nav-item">
					<a class="nav-link" href="../pages/login.php">Login</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">About</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="../index.php">Home</a>
				</li>
			</ul>
		<form class="form-inline" method="get" action="../index.php">
			<input class="form-control mr-sm-2" type="text" placeholder="Search" name="search">
			<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
		</form>
		</div>
	</nav>
  
	<div class="container my-3">
		<h2>About Appsurf</h2>
		<p>This is a website dedicated to helping you on your quest to find a game thats perfect for you</p>
		<h4>Logging in</h4>
		<p>First of all, click on the "login: tab to redirect to our login portal where you can use your ID and password to login.</p>
		<h4>Searching and sorting</h4>
		<p>You may type into the searchbar to search a game by name, developer, platform or price. <br> </p>
			You can also click on each of the column headers to sort by that category<br>
		<h4>Game pages</h4>	
		<p>Once you select a game, pressing the "go" button will bring you to that games page, which lists detailed information about it.<br>
			If you are logged in, you can leave comments and like and dislike other user's comments</p>
		<h4>Request a page</h4>
		<p>If you have a game that you would like to see added to our site, click on the request tab and fill out the request form<br>
			Site admins will review it and either approve it or deny it, if approved, it will be added to the website</p>
		<h4>Thank you for visiting AppSurf</h4>
		<p>In the end, we hope you enjoy our website and that it helps you search for the game thats perfect for you.</p>
	</div>
	
	<footer class="page-footer small bg-dark text-light pt-4"> 
		<div class="container-fluid text-center text-md-left">
			<div class="row">
			
			<div class="col-md-6 mb-md-0 mb-3">
				<h4>APPerture Software</h4>
				<p>CSE 201 Software Development Project.<br>
					Group A-5: <br>
					Andrew Nieto, Evan Wright, Jacob Szulewski, <br>
					Qinze Wu, Michael Gallagher, Qilin Yang </p>
				</div>
		</div>
		
		<div class="footer-copyright text-center py-3"> @2019 Copyright: Nonexistent </div>
	</footer>
	</body>
</html>