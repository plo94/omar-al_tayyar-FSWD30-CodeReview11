<?php
 ob_start();
 session_start(); // start a new session or continues the previous

 include_once 'dbconnect.php';
 $error = false;
 if ( isset($_POST['btn-signup']) ) {

  // sanitize user input to prevent sql injection
  $first_name = trim($_POST['first_name']);
  $first_name = strip_tags($first_name);
  $first_name = htmlspecialchars($first_name);

  $last_name = trim($_POST['last_name']);
  $last_name = strip_tags($last_name);
  $last_name = htmlspecialchars($last_name);

  $email = trim($_POST['email']);
  $email = strip_tags($email);
  $email = htmlspecialchars($email);

  $pass = trim($_POST['pass']);
  $pass = strip_tags($pass);
  $pass = htmlspecialchars($pass);

  // basic name validation
  if (empty($first_name)) {
   $error = true;
   $first_nameError = "Please enter your first name.";
  } else if (strlen($first_name) < 3) {
   $error = true;
   $first_nameError = "Name must have atleat 3 characters.";
  } else if (!preg_match("/^[a-zA-Z ]+$/",$first_name)) {
   $error = true;
   $first_nameError = "Name must contain alphabets and space.";
  }

   // basic name validation
  if (empty($last_name)) {
   $error = true;
   $lasr_nameError = "Please enter your last name.";
  } else if (strlen($last_name) < 3) {
   $error = true;
   $last_nameError = "Name must have atleat 3 characters.";
  } else if (!preg_match("/^[a-zA-Z ]+$/",$last_name)) {
   $error = true;
   $last_nameError = "Name must contain alphabets and space.";
  }

  //basic email validation
  if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
   $error = true;
   $emailError = "Please enter valid email address.";
  } else {
   // check whether the email exist or not
   $query = "SELECT user_email FROM users WHERE user_email='$email'";
   $result = mysqli_query($conn, $query);
   $count = mysqli_num_rows($result);
   if($count!=0){
    $error = true;
    $emailError = "Provided Email is already in use.";
   }
  }
  // password validation
  if (empty($pass)){
   $error = true;
   $passError = "Please enter password.";
  } else if(strlen($pass) < 6) {
   $error = true;
   $passError = "Password must have atleast 6 characters.";
  }

  // password encrypt using SHA256();
  $password = $pass;

  // if there's no error, continue to signup
  if( !$error ) {

   $query = "INSERT INTO users(first_name,last_name,user_email,user_pass) VALUES('$first_name','$last_name','$email','$password')";
   $res = mysqli_query($conn, $query);

   if ($res) {
    $errTyp = "success";
    $errMSG = "Successfully registered, you may login now";
    unset($first_name);
    unset($last_name);
    unset($email);
    unset($pass);
   } else {
    $errTyp = "danger";
    $errMSG = "Something went wrong, try again later...";
   }

  }


 }
 ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css"> 
    <style>
    	body{
    		position: fixed;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    background-size: cover;
    background-position: 50% 50%;
    background-image: url('http://ezrentacars.com/img/info-img2.jpg');
    background-repeat:repeat;
  }
    	}
    </style>
    <title>Hello</title>
  </head>
  <body class="text-center">


    <form class="form-signin" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
      
      <h1 class="h3 mb-3 font-weight-normal"> Sign Up</h1>
      <label for="inputEmail" class="sr-only">First Name</label>
      <input type="text" name="first_name" class="form-control" placeholder="Enter Your First Name" maxlength="50" value="<?php echo $first_name ?>" />
      <span class="text-danger"><?php echo $first_nameError; ?></span>
      <label for="inputEmail" class="sr-only">Last Name</label>
      <input type="text" name="last_name" class="form-control" placeholder="Enter Your Last Name" maxlength="50" value="<?php echo $last_name ?>" />
      <span class="text-danger"><?php echo $last_nameError; ?></span>
      <label for="inputEmail" class="sr-only">Email address</label>
      <input type="email" name="email" class="form-control" placeholder="Enter Your Email" maxlength="40" value="<?php echo $email ?>" />
      <span class="text-danger"><?php echo $emailError; ?></span>
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" name="pass" class="form-control" placeholder="Enter Password" maxlength="15" value="<?php echo $pass ?>" />
      <span class="text-danger"><?php echo $passError; ?></span>
      <button type="submit" class="btn btn-block btn-primary" name="btn-signup">Sign Up</button>
      <div class="">
      <p class="mt-5 mb-3 text-muted">Library</p>
      </div>
      <div class="alert">
              <?php echo $errMSG; ?>
              <button type="button" class="btn btn-success"><a href="index.php">Sign in Here...</a></button>
             </div>
    </form>

   
<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '{your-app-id}',
      cookie     : true,
      xfbml      : true,
      version    : '{latest-api-version}'
    });
      
    FB.AppEvents.logPageView();   
      
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "https://connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>

    <?php
        if ( isset($errMSG) ) {
    ?>

   <?php
   }
   ?>

   <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
  </html>
<?php ob_end_flush(); ?>