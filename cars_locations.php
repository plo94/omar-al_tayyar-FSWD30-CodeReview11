





<?php 
	session_start();
	if(!isset($_SESSION['user'])){   // if not logged in go to home page
    header('location: index.php');
	}	
 ?>
<!DOCTYPE html>
		<html>
			<head>
				<title>Car list</title>
				<meta charset="utf-8">
     			<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">	
				<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
				<link rel="stylesheet" type="text/css" href="cars_locationStyle.css">
				<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
				
			</head>
			<body>
			<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Car Rental</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="office.php">Office <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="cars_locations.php">Car Locations <span class="sr-only">(current)</span></a>
      </li>
    </ul>
    <form class="form-inline">
      <a href="logout.php?logout"><button type="button" class="btn btn-dark" >Log Out</button></a>
    </form>
  </div>
</nav>

				</header>

			<table class="table table-bordered">
		
					<tr>
						<th>Car Model</th>
						<th>Car Location</th>
						<th >Car image</th>
						<th>price dayle</th>
					</tr>
		
<?php
		$conn = mysqli_connect('localhost' , 'root' , '' , 'cr11_omar_altayyar_php_car_rental'); 
		$sql = "select * from cars";
		$result = mysqli_query($conn, $sql) or die("failed to query databases");
		while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
?>


	
					<tr>
						<td><?= $row['model']; ?></td>
						<td><?= $row['fk_address']; ?></td>
						<td><img src="<?php echo $row ['image']; ?>" alt="media image" style="max-height:45px; max-width:45px;"></td>
						<td><?= $row['Price']; ?></td>
					</tr>										
	
			
	

<?php 
	}
	mysqli_close($conn);
?>
	</table>
			

				<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
		  		<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
		  		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
			
	</body>
</html>
