<!DOCTYPE html>

<?php
	class user {
		private $username;
		private $password;
		public $modAuth;
		public $adminAuth;
		
		public __construct() {
			$username = "user";
			$password = "password";
		}
		
		public __construct(string $u, string $p) {
			$username = $u;
			$password = $p;
			public $modAuth = false;
			public $adminAuth = false;
		}
		
		public function getUsername {
			return $username;
		}
		
		public function verifyPwd(string $p) {
			if(password_verify($p, $password)
				return true;
			else
				return false;
		}
	}

	class moderator extends user {
		public __construct() {
			parent::__construct();
			public $modAuth = true;
		}
		
		public __construct(string $u, string $p) {
			parent::__construct($u, $p);
			public $modAuth = true;
		}
	}

	class admin extends user {
		public __construct(string $u, string $p) {
			parent::__construct($u, $p);
			public $adminAuth = true;
		}
	}
?>

<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
	<!-- css stylesheet -->
	<!--<link rel="stylesheet" href="../css/stylesheet.css">-->
	
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
	<script src="js/script.js"></script>
	
    <title>AppSurf - Home</title>
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
					<a class="nav-link" href="pages/login.html">Login</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">About</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="../index.html">Home</a>
				</li>
			</ul>
			
		</div>
	</nav>
  
	<div class="container m-0">
		<div class="row">
			<div class="col-md-3 list-group bg-dark pl-2">
					<button class="list-group-item list-group-item-action">Login</button>
					<button class="list-group-item list-group-item-action">Home</button>
					<button class="list-group-item list-group-item-action">Request page</button>
					<button class="list-group-item list-group-item-action">Admin Portal</button>
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
			<tr>
				<td>Mass Effect</td>
				<td>Bioware</td>
				<td>PS3, Xbox 360, PC</td>
				<td>$59.99</td>
				<td><a class="btn btn-info" href="apppages/masseffect.html">Go</a></td>
			</tr>
			
			<tr>
				<td>Sekiro</td>
				<td>FromSoftware</td>
				<td>PS4, Xbox One, PC</td>
				<td>$59.99</td>
				<td><a class="btn btn-info" href="apppages/sekiro.html">Go</a></td>
			</tr>
			
			<tr>
				<td>Cities: Skyline</td>
				<td>Paradox Interactive</td>
				<td>PS4, Xbox One, PC</td>
				<td>$39.99</td>
				<td><a class="btn btn-info" href="#">Go</a></td>
			</tr>
			
			<tr>
				<td>God Of War</td>
				<td>Santa Monica Studios</td>
				<td>PS4, Xbox One, PC</td>
				<td>$59.99</td>
				<td><a class="btn btn-info" href="#">Go</a></td>
			</tr>
			
			<tr>
				<td>The Witcher 3</td>
				<td>CD Project Red</td>
				<td>PS4, Xbox One, PC</td>
				<td>$59.99</td>
				<td><a class="btn btn-info" href="#">Go</a></td>
			</tr>
			
			<tr>
				<td>Hollow Knight</td>
				<td>Team Cherry</td>
				<td>PS4, Xbox One, Nintendo Switch, PC</td>
				<td>$14.99</td>
				<td><a class="btn btn-info" href="#">Go</a></td>
			</tr>
			
			<tr>
				<td>Red Dead Redemption II</td>
				<td>Rockstar</td>
				<td>PS4, Xbox One, PC</td>
				<td>$59.99</td>
				<td><a class="btn btn-info" href="#">Go</a></td>
			</tr>
			
			<tr>
				<td>Apex Legends</td>
				<td>Respawn Entertainment</td>
				<td>PS4, Xbox One, PC</td>
				<td>Free</td>
				<td><a class="btn btn-info" href="#">Go</a></td>
			</tr>
			
			<tr>
				<td>Bloodbourne</td>
				<td>FromSoftware</td>
				<td>PS4</td>
				<td>$59.99</td>
				<td><a class="btn btn-info" href="#">Go</a></td>
			</tr>
			
			<tr>
				<td>Overwatch</td>
				<td>Blizzard Entertainment</td>
				<td>PS4, Xbox One, PC</td>
				<td>$29.99</td>
				<td><a class="btn btn-info" href="apppages/overwatch.html">Go</a></td>
			</tr>
			</table>
			</div>
			</div>
		</div>
	</div>
	
	<footer class="page-footer small bg-dark text-light pt-4"> 
		<div class="container-fluid text-center text-md-left">
			<div class="row">
			<!--
			<div class="col-md-2 mt-md-0 mt-3">
				<image src="../images/AppLogo.jpg" alt="logo" class="img-fluid">
			</div>-->
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
