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
					print "<a class=\"nav-link\" href=\"register.php?action=logout\">Logout</a>";
				} else {
					print"<a class=\"nav-link\" href=\"login.php\">Login</a>";
				} 
				?>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">About</a>
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
		<h2>Request a Page</h2>
		<form method="post">
			<div class="form-group">
				<label for="name"><b>Name of Game</b></label><br>
				<input type="text" class="form-control" placeholder="Name of Game" name="name" required><br>
				
				<label for="dev"><b>Developer</b></label><br>
				<input type="text" class="form-control" placeholder="Developer" name="dev" required><br>
				
				<input type="hidden" value="0" name="ps4">
				<input type="checkbox" class="form-check-input" value="1" name="ps4">
				<label class="form-check-label" for="ps4">Available on Playstation 4</label><br>
				
				<input type="hidden" value="0" name="xbox1">
				<input type="checkbox" class="form-check-input" value="1" name="xbox1">
				<label class="form-check-label" for="xbox1">Available on Xbox 1</label><br>
				
				<input type="hidden" value="0" name="switch">
				<input type="checkbox" class="form-check-input" value="1" name="switch">
				<label class="form-check-label" for="switch">Available on Nintendo Switch</label><br>
				
				<input type="hidden" value="0" name="pc">
				<input type="checkbox" class="form-check-input" value="1" name="pc">
				<label class="form-check-label" for="pc">Available on PC</label><br>
				
				<label for="price"><b>Price</b></label><br>
				<input type="number" class="form-control" min="0" step=".01" name="price" required><br>
				
				<label for="link"><b>Link to store page</b></label><br>
				<input type="text" class="form-control" placeholder="Link to store page" name="link" required><br>
				
				<label for="desc"><b>Description of game</b></label><br>
				<textarea class="form-control" placeholder="Description of Game" name="desc" rows="3" required></textarea><br>
				
				
				<button type="submit" method="post" class="btn btn-primary">Submit</button>
			</div>
			
			<div class="container">
				<?php 
					if(isset($_POST['name'])) {
						$sql = "INSERT INTO `request` (`name`, `dev`, `ps4`, `xbox1`, `switch`, `pc`, `price`, `link`, `desc`) VALUES ('" . $_POST['name'] . "', '" . $_POST['dev'] . "', '" . $_POST['ps4'] . "', '" . $_POST['xbox1'] . "', '" . $_POST['switch'] . "', '" . $_POST['pc'] . "', '" . $_POST['price'] . "', '" . $_POST['link'] . "', '" . $_POST['desc'] . "')";
						if (mysqli_query($mysqli, $sql)) {
						echo "Request submitted.";
						} else {
							echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
						}
					}
				?>
			</div>
		</form>
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