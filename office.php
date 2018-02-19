
<?php
 ob_start();
 session_start();
 require_once 'dbconnect.php';
 // if session is not set this will redirect to login page
  if( !isset($_SESSION['user']) ) {
  header("Location: index.php");
  exit;
 }
 // select logged-in users detail

 $res=mysqli_query($conn, "SELECT * FROM users where user_id=".$_SESSION['user']);
 $userRow=mysqli_fetch_array($res, MYSQLI_ASSOC);
 ?>
<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Welcome- <?php echo $userRow['first_name']; ?></title>
    <link rel="stylesheet" type="text/css" href="style1.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Car Rental</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
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

  <main role="main">


      <section class="jumbotron text-center" style="margin-bottom: 0px; background-color: #ddd;">
        <div class="container">
          <h1 class="jumbotron-heading">Our Offices</h1>
          <p class="lead text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmodtempor incididunt ut labore et dolore magna aliqua. </p>
            <ul class="nav" id="myTab" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"><button type="button" class="btn btn-outline-secondary">VorgartebStraße</button></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false"><button type="button" class="btn btn-outline-secondary">Schwedenplatz</button></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false"><button type="button" class="btn btn-outline-secondary">Mariahilfestraße</button></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="contact-tab" data-toggle="tab" href="#4" role="tab" aria-controls="contact" aria-selected="false"><button type="button" class="btn btn-outline-secondary">Simmeringhauptstraße</button></a>
        </li>
        </div>
      </section>
      
      


      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
          <div class="row">
        <div class="column">
          <style>
       #map { margin-left: 350px;
        height: 400px;
        width: 100%;
       }
    </style>
            <div id="map"></div>
            <script>
              function initMap() {
                var uluru = {lat: 48.226612, lng: 16.398962};
                var map = new google.maps.Map(document.getElementById('map'), {
                  zoom: 4,
                  center: uluru
                });
                var marker = new google.maps.Marker({
                  position: uluru,
                  map: map
                });
              }
            </script>
            <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAcfK86HpVSTMSievvAHh4kkiWsgA1wJak&callback=initMap">
            </script>


        </div>
        
      </div>
          <div class="album py-5 bg-light">
        <div class="container">
          <div class="row">
                    <?php

            $sql1 = "SELECT * FROM cars WHERE fk_offices_id=1";
            $result1 = $conn->query($sql1);

            if ($result1->num_rows > 0) {
                while($row1 = $result1->fetch_assoc()) {
                  echo '
                <div class="col-md-4">
              <div class="card mb-4 border-primary box-shadow">
                <div style="background-image: url(https://static.vecteezy.com/system/resources/previews/000/140/529/non_2x/vector-grey-gradient-advertising-backgorund.jpg);">
                <img class="card-img-top" data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail" alt="Thumbnail [100%x225]" style="height: 225px; width: 100%; display: block;" src="'.$row1["image"].'" data-holder-rendered="true">
                </div>
                <div class="card-body">
                <p class="model">'.$row1["model"].'</p>
                <hr>
                  <p class="card-text">Engine: '.$row1["details"].'</p>
                  <hr>
                  <p class="card-text">Price/Day: €'.$row1["Price"].'</p>
                  <hr>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <a href="singlepage.php?id='.$row1["car_id"].'&details='.$row1["details"].'&name='.$row1["model"].'& price='.$row1["Price"].'&img='.$row1["image"].'" ><button type="button" class="btn btn-outline-secondary">More</button></a>
                    </div>
                  </div>
                </div>
              </div>
              </div>
    
                 
                        ';
                }
                 
             } else {
                echo "0 results";
            }

            ?>
            </div>
          </div>
        </div>
      </div>
        
        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            <div class="album py-5 bg-light">
        <div class="container">
          <div class="row">
                    <?php

            $sql1 = "SELECT * FROM cars WHERE fk_offices_id=2";
            $result1 = $conn->query($sql1);

            if ($result1->num_rows > 0) {
                while($row1 = $result1->fetch_assoc()) {
                  echo '
                <div class="col-md-4">
              <div class="card mb-4 border-primary box-shadow">
                <div style="background-image: url(https://static.vecteezy.com/system/resources/previews/000/140/529/non_2x/vector-grey-gradient-advertising-backgorund.jpg);">
                <img class="card-img-top" data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail" alt="Thumbnail [100%x225]" style="height: 225px; width: 100%; display: block;" src="'.$row1["image"].'" data-holder-rendered="true">
                </div>
                <div class="card-body">
                <p class="model">'.$row1["model"].'</p>
                <hr>
                  <p class="card-text">Engine: '.$row1["details"].'</p>
                  <hr>
                  <p class="card-text">Price/Day: €'.$row1["Price"].'</p>
                  <hr>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <a href="singlepage.php?id='.$row1["car_id"].'&details='.$row1["details"].'&name='.$row1["model"].'& price='.$row1["Price"].'&img='.$row1["image"].'" ><button type="button" class="btn btn-outline-secondary">More</button></a>
                    </div>
                  </div>
                </div>
              </div>
              </div>
    
                 
                        ';
                }
                 
             } else {
                echo "0 results";
            }

            ?>
            </div>
          </div>
        </div>
        </div>
        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
            <div class="album py-5 bg-light">
        <div class="container">
          <div class="row">
                    <?php

            $sql1 = "SELECT * FROM cars WHERE fk_offices_id=3";
            $result1 = $conn->query($sql1);

            if ($result1->num_rows > 0) {
                while($row1 = $result1->fetch_assoc()) {
                  echo '
                <div class="col-md-4">
              <div class="card mb-4 border-primary box-shadow">
                <div style="background-image: url(https://static.vecteezy.com/system/resources/previews/000/140/529/non_2x/vector-grey-gradient-advertising-backgorund.jpg);">
                <img class="card-img-top" data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail" alt="Thumbnail [100%x225]" style="height: 225px; width: 100%; display: block;" src="'.$row1["image"].'" data-holder-rendered="true">
                </div>
                <div class="card-body">
                <p class="model">'.$row1["model"].'</p>
                <hr>
                  <p class="card-text">Engine: '.$row1["details"].'</p>
                  <hr>
                  <p class="card-text">Price/Day: €'.$row1["Price"].'</p>
                  <hr>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <a href="singlepage.php?id='.$row1["car_id"].'&details='.$row1["details"].'&name='.$row1["model"].'& price='.$row1["Price"].'&img='.$row1["image"].'" ><button type="button" class="btn btn-outline-secondary">More</button></a>
                    </div>
                  </div>
                </div>
              </div>
              </div>
    
                 
                        ';
                }
                 
             } else {
                echo "0 results";
            }

            ?>
            </div>
          </div>
        </div>
        </div>
        <div class="tab-pane fade" id="4" role="tabpanel" aria-labelledby="contact-tab">
            <div class="album py-5 bg-light">
        <div class="container">
          <div class="row">
                    <?php

            $sql1 = "SELECT * FROM cars WHERE fk_offices_id=4";
            $result1 = $conn->query($sql1);

            if ($result1->num_rows > 0) {
                while($row1 = $result1->fetch_assoc()) {
                  echo '
                <div class="col-md-4">
              <div class="card mb-4 border-primary box-shadow">
                <div style="background-image: url(https://static.vecteezy.com/system/resources/previews/000/140/529/non_2x/vector-grey-gradient-advertising-backgorund.jpg);">
                <img class="card-img-top" data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail" alt="Thumbnail [100%x225]" style="height: 225px; width: 100%; display: block;" src="'.$row1["image"].'" data-holder-rendered="true">
                </div>
                <div class="card-body">
                <p class="model">'.$row1["model"].'</p>
                <hr>
                  <p class="card-text">Engine: '.$row1["details"].'</p>
                  <hr>
                  <p class="card-text">Price/Day: €'.$row1["Price"].'</p>
                  <hr>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <a href="singlepage.php?id='.$row1["car_id"].'&details='.$row1["details"].'&name='.$row1["model"].'& price='.$row1["Price"].'&img='.$row1["image"].'" ><button type="button" class="btn btn-outline-secondary">More</button></a>
                    </div>
                  </div>
                </div>
              </div>
              </div>
    
                 
                        ';
                }
                 
             } else {
                echo "0 results";
            }

            ?>
            </div>
          </div>
        </div>
        </div>
      </div>
         

    </main>

    







   <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
  </html>
<?php ob_end_flush(); ?>