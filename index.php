<!DOCTYPE html>
<?php   
	session_start();
	
	if (isset($_GET['action'])) {
		if ($_GET['action']=="logout") {
			session_destroy();
			header("location: index.php");
			exit;
		}
	}
	
	require_once("index.php"); 
	require_once("database\SQLcredentials.php");
	
	$mysqli = mysqli_connect($databaseHost, $databaseUser, $databasePassword, $databaseName);
	if (mysqli_connect_errno($mysqli)) {     
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
		die;
	}
	
?>

<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	
	<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
	
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
	
	<!-- javascript -->
	<script src="src/js/script.js"></script>
	
    <title>AppSurf - Home</title>
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
					print "<a class=\"nav-link\" action=\"logout\">Logout</a>";
				} else {
					print"<a class=\"nav-link\" href=\"pages/login.php\">Login</a>";
				} 
				?>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="pages/register.php">Register</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="pages/about.php">About</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="../index.php">Home</a>
				</li>
			</ul>
			
		</div>
	</nav>
  
	<div class="container m-0">
		<div class="row">
			<div class="col-md-3 list-group bg-dark pl-2">
					<button class="list-group-item list-group-item-action" onclick="window.location.href = 'pages/login.php';">Login</button>
					<button class="list-group-item list-group-item-action" onclick="window.location.href = 'pages/register.php';">Register</button>
					<button class="list-group-item list-group-item-action" onclick="window.location.href = 'index.php';">Home</button>
					<button class="list-group-item list-group-item-action" onclick="window.location.href = 'pages/request.php';">Request page</button>
					<button class="list-group-item list-group-item-action" onclick="window.location.href = 'pages/admin.php';">Admin Portal</button>
			</div>
			
			<div class="col-md-8 m-3 ">
				<div class="dropdown">
					<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Filter
					</button>
				<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
					<a class="dropdown-item" href="#">Title</a>
					<a class="dropdown-item" href="#">Developer</a>
					<a class="dropdown-item" href="#">Price</a>
					</div>
				</div>
				<div class="container my-3">
			<table class="table table-hover" id="repo">
			<thead class="thead-dark">
				<tr>
					<th scope="col">Name</th>
					<th scope="col">Developer</th>
					<th scope="col">Platform</th>
					<th scope="col">Price</th>
					<th scope="col">Page</th>
				</tr>
			</thead>
			<?php
				$res1 = mysqli_query($mysqli, "SELECT name, dev, ps4, xbox1, switch, pc, price, link FROM apps");
				
				while($row = mysqli_fetch_assoc($res1)) {
						print "<tr>";
						print "<td>" . $row['name'] . "</td>";
						print "<td>" . $row['dev'] . "</td>";
						print "<td> temp </td>";
						print "<td>$" . $row['price'] . "</td>";
						print "<td><a class=\"btn btn-info\" href=\"" . $row['link'] . "\">Go</a></td>";
						print "</tr>";
					}
			?>
			</table>
			</div>
			</div>
		</div>
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