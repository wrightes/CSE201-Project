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
					print "<a class=\"nav-link\" href=\"index.php?action=logout\">Logout</a>";
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
					<a class="nav-link" href="index.php">Home</a>
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
				<div class="container">
				<?php if(isset($_GET['game'])) {
				$res = mysqli_query($mysqli, "SELECT * FROM apps WHERE name='" . $_GET['game'] . "'");
				$row1 = mysqli_fetch_assoc($res);
				
				print "<h1>" . $row1['name'] . "</h1>";
				print "<h5><strong>Developer:</strong> " . $row1['dev'] . "</h5>";
				print "<h5><strong>Platforms:</strong></h5> <ul class=\"list-group\">";
				if($row1['ps4'])
					print "<li class=\"list-group-item\">Playstation 4</li>";
				if($row1['xbox1'])
					print "<li class=\"list-group-item\">Xbox 1</li>";
				if($row1['switch'])
					print "<li class=\"list-group-item\">Nintendo Switch</li>";
				if($row1['pc'])
					print "<li class=\"list-group-item\">PC</li>";
				print "</ul>";
				print "<h5><strong>Price:</strong> " . $row1['price'] . "</h5>";
				print "<h5><strong>Link to store:</strong> <a href=\"" . $row1['link'] . "\">" . $row1['link'] . "</a></h5>";
				print "<h5><strong>Description:</strong> " . $row1['desc'] . "</h5>";
				
				?>
				
				</div class="container">
				<div class="form-group">
				<form action="index.php?game=<?php echo $row1['name'] ?>" method="post">
					<label for="comment">Leave a comment: </label>
					<textarea class="form-control" name="comment" placeholder="Leave a comment here" rows="3"></textarea><br>
					<button type="submit" class="btn btn-primary">Post</button>
				</form>
				</div class="container my-3>
				
			<?php 
				
				if(isset($_POST['comment'], $_SESSION['username'])) {
					$sql = "INSERT INTO comments (name, comment, user, timestamp, likes, dislikes) VALUES ('" . $row1['name'] . "', '" . $_POST['comment'] . "', '" . $_SESSION['username'] . "', CURRENT_TIMESTAMP, '0', '0')";
					if (mysqli_query($mysqli, $sql)) {
						echo "comment successfully added!";
					} else {
						echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
					}
				} else if(!isset($_SESSION['username'])) {
					echo "You must be signed in to leave a comment!";
				}
				
				if(isset($_POST['like'])) {
					$sql = "UPDATE comments SET likes=likes+1 WHERE timestamp='" . $_POST['like'] . "'";
					if (mysqli_query($mysqli, $sql)) {
						echo "Comment Liked";
					} else {
						echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
					}
				} else if(isset($_POST['dislike'])) {
					$sql = "UPDATE comments SET dislikes=dislikes+1 WHERE timestamp='" . $_POST['dislike'] . "'";
					if (mysqli_query($mysqli, $sql)) {
						echo "Comment Disliked";
					} else {
						echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
					}
				}
				
				if(isset($_POST['delete'])) {
					$sql2 = "DELETE FROM comments WHERE timestamp='" . $_POST['delete'] . "'";
					if (mysqli_query($mysqli, $sql2)) {
						echo "Comment Deleted";
					} else {
						echo "Error: " . $sql2 . "<br>" . mysqli_error($mysqli);
					}
				}
			
				$res2 = mysqli_query($mysqli, "SELECT * FROM comments WHERE name='" . $_GET['game'] . "'");
				
				print "<ul class=\"list-group\">";
				while($row2 = mysqli_fetch_assoc($res2)) {
					print "<li class=\"list-group-item bg-light\"><h5>" . $row2['user'] . "</h5>";
					print "<div class=\"form-row\">";
					if(isset($_SESSION['username'])) {
						print "<div class=\"col\"><form method=\"post\">
							<input type=\"hidden\" value=\"" . $row2['timestamp'] . "\" name=\"like\">
							<button type=\"submit\" class=\"btn btn-outline-primary btn-sm\">Like - " . $row2['likes'] . "</button>
							</form></div>";
							
						print "<div class=\"col\"><form class=\"inline\" method=\"post\">
							<input type=\"hidden\" value=\"" . $row2['timestamp'] . "\" name=\"dislike\">
							<button type=\"submit\" class=\"btn btn-outline-secondary btn-sm\">Dislike - " . $row2['dislikes'] . "</button>
							</form></div>";
							
						if($_SESSION['modAuth']) {
							print "<div class=\"col\"><form  method=\"post\">
							<input type=\"hidden\" value=\"" . $row2['timestamp'] . "\" name=\"delete\">
							<button type=\"submit\" class=\"btn btn-info btn-sm\">Delete</button>
							</form></div>";
						}
					}
					print "</div>";
					print "<p>" . $row2['comment'] . "</p></li>";
				}
				print "</ul>";
			} else { ?>
			
				<div class="dropdown">
					<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Filter
					</button>
				<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
				<form class="form-group px-5">
				<input type="hidden" value="0" name="ps4">
				<input type="checkbox" class="form-check-input" value="1" name="ps4">
				<label class="form-check-label" for="ps4">Playstation 4</label><br>
				
				<input type="hidden" value="0" name="xbox1">
				<input type="checkbox" class="form-check-input" value="1" name="xbox1">
				<label class="form-check-label" for="xbox1">Xbox 1</label><br>
				
				<input type="hidden" value="0" name="switch">
				<input type="checkbox" class="form-check-input" value="1" name="switch">
				<label class="form-check-label" for="switch">Nintendo Switch</label><br>
				
				<input type="hidden" value="0" name="pc">
				<input type="checkbox" class="form-check-input" value="1" name="pc">
				<label class="form-check-label" for="pc">PC</label><br>
				<button type="submit" method="get" class="btn btn-primary">Filter</button>
				</form>
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
			if(isset($_GET['search'])) {
				$res = mysqli_query($mysqli, "SELECT name, dev, ps4, xbox1, switch, pc, price FROM apps WHERE name='" . $_GET['search'] . "'");
				
				while($row = mysqli_fetch_assoc($res)) {
						print "<tr>";
						print "<td>" . $row['name'] . "</td>";
						print "<td>" . $row['dev'] . "</td>";
						print "<td>";
						if($row['ps4'])
							print "Playstation 4<br>";
						if($row['xbox1'])
							print "Xbox 1<br>";
						if($row['switch'])
							print "Nintendo Switch<br>";
						if($row['pc'])
							print "PC<br>";
				
						print "</td>";
						print "<td>$" . $row['price'] . "</td>";
						print "<td><a class=\"btn btn-info\" href=\"index.php?game=" . $row['name'] . "\">Go</a></td>";
						print "</tr>";
					}
				
			} else if(isset($_GET['ps4'])) {	
				$res1 = mysqli_query($mysqli, "SELECT name, dev, ps4, xbox1, switch, pc, price FROM apps WHERE ps4='" . $_GET['ps4'] . "' AND xbox1='" . $_GET['xbox1'] . "' AND switch='" . $_GET['switch'] . "' AND pc='" . $_GET['pc'] . "'");
				
				while($row = mysqli_fetch_assoc($res1)) {
						print "<tr>";
						print "<td>" . $row['name'] . "</td>";
						print "<td>" . $row['dev'] . "</td>";
						print "<td>";
						if($row['ps4'])
							print "Playstation 4<br>";
						if($row['xbox1'])
							print "Xbox 1<br>";
						if($row['switch'])
							print "Nintendo Switch<br>";
						if($row['pc'])
							print "PC<br>";
				
						print "</td>";
						print "<td>$" . $row['price'] . "</td>";
						print "<td><a class=\"btn btn-info\" href=\"index.php?game=" . $row['name'] . "\">Go</a></td>";
						print "</tr>";
					}
			} else {
				$res1 = mysqli_query($mysqli, "SELECT name, dev, ps4, xbox1, switch, pc, price FROM apps");
				
				while($row = mysqli_fetch_assoc($res1)) {
						print "<tr>";
						print "<td>" . $row['name'] . "</td>";
						print "<td>" . $row['dev'] . "</td>";
						print "<td>";
						if($row['ps4'])
							print "Playstation 4<br>";
						if($row['xbox1'])
							print "Xbox 1<br>";
						if($row['switch'])
							print "Nintendo Switch<br>";
						if($row['pc'])
							print "PC<br>";
				
						print "</td>";
						print "<td>$" . $row['price'] . "</td>";
						print "<td><a class=\"btn btn-info\" href=\"index.php?game=" . $row['name'] . "\">Go</a></td>";
						print "</tr>";
					}
			}
			?>
			</table>
			</div>
			
			<?php } ?>
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
		</div>
	</footer>
  </body>
</html>