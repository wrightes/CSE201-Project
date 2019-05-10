<!DOCTYPE html>

<?php 
	session_start();
	
	require_once("..\database\SQLcredentials.php");
	
	$mysqli = mysqli_connect($databaseHost, $databaseUser, $databasePassword, $databaseName);
	if (mysqli_connect_errno($mysqli)) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
		die;
	}
	
	if (isset($_GET['action'])) {
		if ($_GET['action']=="logout") {
			session_destroy();
			header("location: ..\index.php");
			exit;
		}
	}
	
	if(isset($_POST['uname']) && isset($_POST['psw'])) {
		$verified = false;
		$res = mysqli_query($mysqli, "SELECT * FROM users");
		
		while($row = mysqli_fetch_assoc($res)) {
			if($row['username'] == $_POST['uname'] && password_verify($_POST['psw'], $row['password'])) {
				$verified = true;
				$_SESSION['username'] = $row['username'];
				$_SESSION['modAuth'] = $row['mod'];
				$_SESSION['adminAuth'] = $row['admin'];
			}
		}
		
		
		if (!$verified) {        
			echo "invalid credentials";				
		}
	} 
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
		<?php 
				
				if(isset($_SESSION['username'])) {
					print "<a class=\"navbar-item\">Signed in as: " . $_SESSION['username'] . "</a>";
				}
			?>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		
		<div class="collapse navbar-collapse" id="navbarTogglerDemo02">
			<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
				<li class="nav-item">
				<?php 
				if(isset($_SESSION['username'])) {
					print "<a class=\"nav-link\" href=\"login.php?action=logout\">Logout</a>";
				} else {
					print"<a class=\"nav-link\" href=\"login.php\">Login</a>";
				} 
				?>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="about.php">About</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="../index.php">Home</a>
				</li>
			</ul>
		<form class="form-inline"  method="get" action="../index.php">
			<input class="form-control mr-sm-2" type="text" placeholder="Search" name="search">
			<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
		</form>
		</div>
	</nav>
  
	<div class="container my-3">
		<?php if(isset($_SESSION['username'])) {
			print "<h2>Thank you for logging in!</h2>";
		} else { ?>
		<h2>Login</h2>
		<form action="login.php" method="post">
			<div class="form-group">
				<label for="uname"><b>Username:</b></label><br>
				<input type="text" class="form-control" placeholder="Username" name="uname" required><br><br>
				
				<label for="psw"><b>Password:</b></label><br>
				<input type="password" class="form-control" placeholder="Password" name="psw" required><br><br>
				
				<button type="submit" class="btn btn-primary">Login</button>
			</div>
		</form>
		<?php } ?>
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